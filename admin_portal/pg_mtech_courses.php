	<?php //accesing the setted cookie value in javascript in admission page
$collage_id=$_COOKIE['collage_id'];
//echo($collage_id);
if($collage_id==NULL||$collage_id=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='home_page1.php'</script>"; 
}

$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="INSERT INTO pg_mtech_course_list (collage_id) values('$collage_id')";
	$result=mysqli_query($con,$sql);
	if(!$result){
		echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='collage_portal.php'</script>";
}
	else
	{
		echo"<script>confirm('Created'); window.location.href='courses_offered.php'</script>";
	}
	mysqli_close($con);
?>