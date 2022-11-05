function toggleMenu()
{
	var navigation_pane=document.getElementById('site-menu');
	document.write(navigation_pane.id);
	var navigation_pane2=document.getElementById('site-menu2').style;
	if (navigation_pane.display=='none')
	{
		navigation_pane.display='block';
		navigation_pane2.display='none';
	}
	else{
		navigation_pane.display='none';
		navigation_pane2.display='block';
	}
}

function execute() {
	var navi= document.getElementById('navigation_bar').style;
	navi.display='none';
}



