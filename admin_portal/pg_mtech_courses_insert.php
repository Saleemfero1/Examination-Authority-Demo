	<?php //accesing the setted cookie value in javascript in admission page
$collage_id=strval($_COOKIE['collage_id']);
//echo($collage_id);
if($collage_id==NULL||$collage_id=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='home_page1.php'</script>"; 
}

$cse=$_POST['cse'];
	$tt=$_POST['tt'];
	$cvl=$_POST['cvl'];
	$it=$_POST['it'];
	$ec=$_POST['ec'];
	$wt=$_POST['wt'];
	$md=$_POST['md'];
	$gt=$_POST['gt'];
	$cn=$_POST['cn'];
	$nt=$_POST['nt'];



$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="update pg_mtech_course_list set cse=$cse,tt=$tt,cvl=$cvl,it=$it,ec=$ec,wt=$wt,md=$md,gt=$gt,cn=$cn,nt=$nt where collage_id='$collage_id'";
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