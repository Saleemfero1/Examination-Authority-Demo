	<?php //accesing the setted cookie value in javascript in admission page
$collage_id=strval($_COOKIE['collage_id']);
//echo($collage_id);
if($collage_id==NULL||$collage_id=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='home_page1.php'</script>"; 
}

$mca=$_POST['mca'];
//echo($mba);


$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="update pg_mca_course_list set mca=$mca where collage_id='$collage_id'";
	$result=mysqli_query($con,$sql);
	if(!$result){
		echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='collage_portal.php'</script>";
}
	else
	{
		echo"<script>confirm('updated'); window.location.href='courses_offered.php'</script>";
	}
	mysqli_close($con);
?>