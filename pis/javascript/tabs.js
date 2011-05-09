
	
function ShowTab(K,T) {
	i = 0;
	while(document.getElementById("tab" + K + i) != null)
	{
		document.getElementById("div" + K + i).style.display = "none";
		document.getElementById("tab" + K + i).className = "";
		i++;
	}
	document.getElementById("div" + K + T).style.display = "block";
	document.getElementById("tab" + K + T).className = "active";
}