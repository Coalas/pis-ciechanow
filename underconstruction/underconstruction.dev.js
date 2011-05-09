document.observe("dom:loaded", function()
{
    Event.observe('displayOption0', 'click', displayOption0Checked);
    Event.observe('displayOption1', 'click', displayOption1Checked);
    Event.observe('displayOption2', 'click', displayOption2Checked);
});
function displayOption0Checked()
{
    document.getElementById('customText').style.display = 'none';
    document.getElementById('customHTML').style.display = 'none';
}

function displayOption1Checked()
{
    document.getElementById('customText').style.display = 'block';
    document.getElementById('customHTML').style.display = 'none';
}

function displayOption2Checked()
{
    document.getElementById('customText').style.display = 'none';
    document.getElementById('customHTML').style.display = 'block';
}
