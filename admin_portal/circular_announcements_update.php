<?php 
$news=$_POST['news'];
if($link=$_POST['link']=='NULL'||$link=$_POST['link']==NULL)
{
	$link="#";
}
else{
	$link=$_POST['link'];
}
if ($news!='NULL'&&$news!=NULL) {
	//echo "<script>confirm('Empty Values'); window.location.href='display_settings.php'</script>"; 
//echo "$news";
 $username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="insert into recent_circulars values('$news','$link')";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo "<script>confirm('Error data already exists '); window.location.href='display_settings.php'</script>"; 
	}
	else
	{
		echo "<script>window.location.href='display_settings.php'</script>"; 
	}
	mysqli_close($con);
}
else{
	echo "<script>confirm('Empty Values'); window.location.href='display_settings.php'</script>";
}
 ?>

