<?php 
$news=$_COOKIE['news'];
//echo "$news";
 $username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="delete from recent_circulars where circulars='$news'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo "<script>confirm('Error '); window.location.href='display_settings.php'</script>"; 
	}
	else
	{
		echo "<script> window.location.href='display_settings.php'</script>"; 
	}
	mysqli_close($con);
 ?>