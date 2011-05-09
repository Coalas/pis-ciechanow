<?php
/* 
Plugin Name: Drop Caps
Plugin URI: http://instantsolve.net/blog/plugins/
Version: 2.1
Author: Thomas Milburn
Author URI: http://instantsolve.net
Description: My first plugin used to generate the code for drop caps.
 
Copyright 2008  Thomas Milburn

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
if (!class_exists("DropCaps")) {
	class DropCaps {
		var $options_name = "DropCapsAdminOptions";
		function DropCaps() { //constructor
			// This backslash replacement for Win32 will be unnecessary. See http://trac.wordpress.org/ticket/3002
			add_action('activate_' . strtr(plugin_basename(__FILE__), '\\', '/'), array(&$this, 'set_initial'));
			add_action('admin_menu', array(&$this, 'add_pages'));
			add_action('wp_head', array(&$this, 'wp_head'));
			add_filter('the_content', array(&$this, 'the_content_filter'), 90);
			add_filter('the_excerpt', array(&$this, 'the_excerpt_filter'), 90);
			add_filter('comment_text', array(&$this, 'the_comment_filter'), 90);
		}
		function set_initial() {
			$this->get_options();
		}
		function add_pages() {
			add_options_page('Drop Caps', 'Drop Caps', 9, basename(__FILE__), array(&$this, 'print_admin'));
		}
		//Returns an array of admin options
		function get_options() {
			$set_options = array(
				'plugin_css' => true, 
				'home' => true,
				'single' => true,
				'page' => true,
				'archive' => true,
				'search' => true,
				'feed' => true,
				'attachment' => true,
				'tag' => true,
				'category' => true,
				'date' => true,
				'author' => true,
				'the_content' => true,
				'the_excerpt' => true,
				'the_comment' => false,
				'excluded_cats' => array(),
				'excluded_ids' => array()
				);
			$options = get_option($this->options_name);
			if (!empty($options)) {
				foreach ($options as $key => $option)
					$set_options[$key] = $option;
			}else{
				update_option($this->options_name, $set_options);
			}
			return $set_options;
		}
		
		function wp_head() {
			$options = $this->get_options();
			if ($options['plugin_css'] == false) return;
			?>
<link rel="stylesheet" href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__))?>/dropcaps.css" type="text/css" media="screen" />
			<?php
		}
		
		function is_excluded($options){
			global $post;
			$excluded_cats=$options['excluded_cats'];
			$excluded_ids=$options['excluded_ids'];
			$id=$post->ID;
			$title=$post->post_title;
			$name=$post->post_name;
			if(in_array($id,$excluded_ids)) return true;
			if(in_array($title,$excluded_ids)) return true;
			if(in_array($name,$excluded_ids)) return true;
			$categories=get_the_category();
			foreach($categories as $category){
				$cat_id=$category->term_id;
				$cat_slug=$category->slug;
				$cat_name=$category->name;
				if (in_array($cat_id,$excluded_cats)) return true;
				if (in_array($cat_slug,$excluded_cats)) return true;
				if (in_array($cat_name,$excluded_cats)) return true;
			}
			return false;
		}
		
		function is_enabled($options){
			if (
				(is_home() && $options['home'])
				||(is_single() && $options['single'])
				||(is_page() && $options['page'])
				||(is_archive() && $options['archive'])
				||(is_search() && $options['search'])
				||(is_feed() && $options['feed'])
				||(is_attachment() && $options['attachment'])
				||(is_tag() && $options['tag'])
				||(is_category() && $options['category'])
				||(is_date() && $options['date'])
				||(is_author() && $options['author'])
			)return true;
			return false;
		}
		
		function the_content_filter($content = '') {
			$options = $this->get_options();
			if ($options['the_content'] && $this->is_enabled($options) && !$this->is_excluded($options)){
				//We're look for the first paragraph tag followed by a capital letter
				$pattern = '/<p( .*)?( class="(.*)")??( .*)?>((<[^>]*>|\s)*)((&quot;|&#8220;|&#8216;|&lsquo;|&ldquo;|\')?[A-Z])/U';
				$replacement = '<p$1 class="first-child $3"$4>$5<span title="$7" class="cap"><span>$7</span></span>';
				$content = preg_replace($pattern, $replacement, $content, 1 );
			}
			return $content;
		}
		function the_comment_filter($comment = '') {
			$options = $this->get_options();
			if ($options['the_comment'] && $this->is_enabled($options)){
				//We're look for the first paragraph tag followed by a capital letter
				$pattern = '/<p( .*)?( class="(.*)")??( .*)?>((<[^>]*>|\s)*)((&quot;|&#8220;|&#8216;|&lsquo;|&ldquo;|\')?[A-Z])/U';
				$replacement = '<p$1 class="first-child $3"$4>$5<span title="$7" class="cap"><span>$7</span></span>';
				$comment = preg_replace($pattern, $replacement, $comment, 1 );
			}
			return $comment;
		}
		function the_excerpt_filter($excerpt = '') {
			$options = $this->get_options();
			if ($options['the_excerpt'] && $this->is_enabled($options) && !$this->is_excluded($options)){
				//We're look for the first paragraph tag followed by a capital letter
				$pattern = '/<p>((&quot;|&#8220;|&#8216;|&lsquo;|&ldquo;|\')?[A-Z])/';
				$replacement = '<p class="first-child"><span title="$1" class="cap"><span>$1</span></span>';
				$excerpt = preg_replace($pattern, $replacement, $excerpt, 1 );
			}
			return $excerpt;
		}
		//Prints out the admin page
		function print_admin() {
					$options = $this->get_options();				
					if (isset($_POST['update_dropcaps'])) { 
						$options['plugin_css'] = (isset($_POST['dropcaps_css']))?true:false;
						$options['the_content'] = (isset($_POST['dropcaps_content']))?true:false;
						$options['the_excerpt'] = (isset($_POST['dropcaps_excerpt']))?true:false;
						$options['the_comment'] = (isset($_POST['dropcaps_comment']))?true:false;
						$options['home'] = (isset($_POST['dropcaps_home']))?true:false;
						$options['single'] = (isset($_POST['dropcaps_single']))?true:false;
						$options['page'] = (isset($_POST['dropcaps_page']))?true:false;
						$options['archive'] = (isset($_POST['dropcaps_archive']))?true:false;
						$options['search'] = (isset($_POST['dropcaps_search']))?true:false;
						$options['feed'] = (isset($_POST['dropcaps_feed']))?true:false;
						$options['attachment'] = (isset($_POST['dropcaps_attachment']))?true:false;
						$options['tag'] = (isset($_POST['dropcaps_tag']))?true:false;
						$options['category'] = (isset($_POST['dropcaps_category']))?true:false;
						$options['date'] = (isset($_POST['dropcaps_date']))?true:false;
						$options['author'] = (isset($_POST['dropcaps_author']))?true:false;
						$options['excluded_ids']=(isset($_POST['dropcaps_excluded_ids']))? explode(',',$_POST['dropcaps_excluded_ids']):array();
						$options['excluded_cats']=(isset($_POST['dropcaps_excluded_cats']))? explode(',',$_POST['dropcaps_excluded_cats']):array();
						update_option($this->options_name, $options);
						?>
<div class="updated"><p><strong><?php _e("Settings Updated.", "dropcaps");?></strong></p></div>
					<?php
					} ?>
<div class="wrap">
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<h2>Drop Caps Plugin</h2>
<h3>Options</h3>
<p>Select the options which suit your blog. You can choose whether drop caps will appear in the content, the excerpt or in comments. You can also choose which pages drop caps will appear on.</p>
<p>The plugin comes with a default stylesheet which is applied to the drop caps. This can be disabled if you wish to use your own styling.</p>
<table class="form-table"><tbody>
	<tr valign="top">
		<th scope="row">Enable drop caps in</th>
		<td>
		<label for="dropcaps_content"><input type="checkbox" id="dropcaps_content" name="dropcaps_content" <?php if ($options['the_content'])echo 'checked="checked"';?> /> <code>the_content()</code></label><br />
		<label for="dropcaps_excerpt"><input type="checkbox" id="dropcaps_excerpt" name="dropcaps_excerpt" <?php if ($options['the_excerpt'])echo 'checked="checked"';?> /> <code>the_excerpt()</code></label><br />
		<label for="dropcaps_comment"><input type="checkbox" id="dropcaps_comment" name="dropcaps_comment" <?php if ($options['the_comment'])echo 'checked="checked"';?> /> <code>comment_text()</code></label>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Enable drop caps on</th>
		<td>
		<label for="dropcaps_home"><input type="checkbox" id="dropcaps_home" name="dropcaps_home" <?php if ($options['home'])echo 'checked="checked"';?> /> the main blog page</label><br />
		<label for="dropcaps_single"><input type="checkbox" id="dropcaps_single" name="dropcaps_single" <?php if ($options['single'])echo 'checked="checked"';?> /> single post pages</label><br />
		<label for="dropcaps_page"><input type="checkbox" id="dropcaps_page" name="dropcaps_page" <?php if ($options['page'])echo 'checked="checked"';?> /> PAGE pages</label><br />
		<label for="dropcaps_search"><input type="checkbox" id="dropcaps_search" name="dropcaps_search" <?php if ($options['search'])echo 'checked="checked"';?> /> search results</label><br />
		<label for="dropcaps_feed"><input type="checkbox" id="dropcaps_feed" name="dropcaps_feed" <?php if ($options['feed'])echo 'checked="checked"';?> /> feeds</label><br />
		<label for="dropcaps_attachment"><input type="checkbox" id="dropcaps_attachment" name="dropcaps_attachment" <?php if ($options['attachment'])echo 'checked="checked"';?> /> attachments</label><br />
		<label for="dropcaps_archive"><input type="checkbox" id="dropcaps_archive" name="dropcaps_archive" <?php if ($options['archive'])echo 'checked="checked"';?> onchange="if(this.checked){document.getElementById('dropcaps_tag').checked = true;document.getElementById('dropcaps_category').checked = true;document.getElementById('dropcaps_date').checked = true;document.getElementById('dropcaps_author').checked = true;}" /> all archives</label><br />
		<div style="margin-left:2em;"><label for="dropcaps_tag"><input type="checkbox" id="dropcaps_tag" name="dropcaps_tag" <?php if ($options['tag'])echo 'checked="checked"';?> onchange="if(!this.checked){document.getElementById('dropcaps_archive').checked = false}" /> tag archives</label><br />
		<label for="dropcaps_category"><input type="checkbox" id="dropcaps_category" name="dropcaps_category" <?php if ($options['category'])echo 'checked="checked"';?> onchange="if(!this.checked){document.getElementById('dropcaps_archive').checked = false}" /> category archives</label><br />
		<label for="dropcaps_date"><input type="checkbox" id="dropcaps_date" name="dropcaps_date" <?php if ($options['date'])echo 'checked="checked"';?> onchange="if(!this.checked){document.getElementById('dropcaps_archive').checked = false}" /> date archives</label><br />
		<label for="dropcaps_author"><input type="checkbox" id="dropcaps_author" name="dropcaps_author" <?php if ($options['author'])echo 'checked="checked"';?> onchange="if(!this.checked){document.getElementById('dropcaps_archive').checked = false}" /> author archives</label></div>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">CSS Styling</th>
		<td><label for="dropcaps_css"><input type="checkbox" id="dropcaps_css" name="dropcaps_css" <?php if ($options['plugin_css'])echo 'checked="checked"';?>/> Style the drop caps using the plugin styling. (Leave unchecked to write your own CSS in your stylesheet)</label></td>
	</tr>
</tbody></table>
		<h3>Exclude</h3>
<p>Type the comma seperated names, slugs or IDs of the categories or posts that you want to exclude from having drop caps.</p>
<p>If you have drop caps enabled on comments, these will show up wether or not the post is excluded.</p>
<table class="form-table"><tbody>
	<tr>
		<th>Excluded posts</th>
		<td><input type="text" id="dropcaps_excluded_ids" name="dropcaps_excluded_ids" value="<?php if ($options['excluded_ids'])echo implode(',',$options['excluded_ids']);?>" style="width:98%" /></td>
	</tr>
	<tr>
		<th>Excluded categorys</th>
		<td><input type="text" id="dropcaps_excluded_cats" name="dropcaps_excluded_cats" value="<?php if ($options['excluded_cats'])echo implode(',',$options['excluded_cats']);?>" style="width:98%" /></td>
	</tr>
</tbody></table>
<div class="submit">
<input type="submit" name="update_dropcaps" value="<?php _e('Update Settings', 'dropcaps') ?>" /></div>
</form>
 </div>
					<?php
				}//End function printAdminPage()
	}
} //End Class DevloungePluginSeries

if (class_exists("DropCaps")) {
	$drop_caps_plugin = new DropCaps();
}
?>