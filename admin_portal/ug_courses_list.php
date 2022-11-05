	<?php //accesing the setted cookie value in javascript in admission page
$collage_id=strval($_COOKIE['collage_id']);
//echo($collage_id);
if($collage_id==NULL||$collage_id=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='home_page1.php'</script>"; 
}


$cs=$_POST['cs'];
	$me=$_POST['me'];
	$ce=$_POST['ce'];
	$eee=$_POST['eee'];
	$ec=$_POST['ec'];
	$tx=$_POST['tx'];
	$au=$_POST['au'];
	$mt=$_POST['mt'];
	$rb=$_POST['rb'];
	$ise=$_POST['ise'];


$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");



		$sql1="update ug_course_list set cs='$cs',me='$me',ce='$ce',eee='$eee',ec='$ec',tx='$tx',au='$au',mt='$mt',rb='$rb',ise='$ise' where collage_id='$collage_id'";
		$result1=mysqli_query($con,$sql1);
		if(!$result1)
		{
			echo "not updated";
			//echo"<script>confirm('not updated retry');window.location.href='courses_offered.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('Updated');window.location.href='courses_offered.php'</script>";
		}

		mysqli_close($con);
	?>