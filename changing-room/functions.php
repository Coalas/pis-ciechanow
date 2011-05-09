<?php
$themename = "Changing Room";
$shortname = "cr";
$options = array (											

				array(	"name" => "General Settings",
						"type" => "heading"),
						
						
				array(	"name" => "Choose a colour",
						"desc" => "The Changing Room colour.",
			    		"id" => $shortname."_style",
			    		"std" => "red",
			    		"type" => "select",
			    		"options" => array("red","blue")),
			    		
				array(	"name" => "Text Settings",
						"type" => "heading"),

				array(	"name" => "Heading text",
						"desc" => "Type the text to be used in the page header.",
			    		"id" => $shortname."_tagline",
			    		"std" => "Please excuse us while we change",
			    		"type" => "text"),

				array(	"name" => "Body text",
						"desc" => "The call to action text for the body area.",
			    		"id" => $shortname."_action",
			    		"std" => "While you're waiting, why not subscribe for free updates?",
			    		"type" => "text"),		    		
			    		
			    array(	"name" => "Feed Settings",
						"type" => "heading"),		
			    		
				array(	"name" => "FeedBurner URL",
						"desc" => "Your FeedBurner URL",
			    		"id" => $shortname."_fb",
			    		"std" => "",
			    		"type" => "text"),
			    		
				array(	"name" => "FeedBurner Email URL",
						"desc" => "Your FeedBurner Email URL",
			    		"id" => $shortname."_fbemail",
			    		"std" => "",
			    		"type" => "text")			    					    											 		
																			
		  );
add_action('admin_menu', 'mytheme_add_admin');

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", $themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;


    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options reset.</strong></p></div>';
    
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> Options</h2>
<p>Need help? Browse the <a href="http://wordprezzie.com/changing-room/">Changing Room online guide.</a>
<hr style="color: #DADADA; background-color: #DADADA; height: 1px; border:0;"/>
<form method="post">

<table class="optiontable">
<?php foreach ($options as $value) { ?>

<?php if ($value['type'] == "heading") { ?>

	<tr><th><h3 style="color:;font-family:Georgia,Times,serif; color:#666;font-weight:normal;font-size:21px;text-align:left;"><?php echo $value['name']; ?></h3></th></tr>

<?php } elseif ($value['type'] == "text") { ?>
        
<tr> 
    <th scope="row" style="text-align:right;"><?php echo $value['name']; ?>:</th>
    <td>
        <input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
    </td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr> 
        <th scope="row" style="text-align:right;"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
<?php 
} 
}
?>

</table>

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<?php
}?>
<?php
if ( function_exists('register_sidebar') ){
register_sidebar(Array("name" => "Footer Left"));
register_sidebar(Array("name" => "Footer Center"));
register_sidebar(Array("name" => "Footer Right"));
register_sidebar(Array("name" => "Sidebar"));
}
?>