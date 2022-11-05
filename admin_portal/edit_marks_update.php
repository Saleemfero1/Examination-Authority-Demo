	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);
$admission_selected=strval(str_replace(" ","_",strtolower($admissions)));
//echo($selected_admission);
?>

<?php


$application_id=$_POST['application_id'];
	$diploma_3year_total_marks=$_POST['diploma_3year_total_marks'];
	$diploma_year_3_marks=$_POST['diploma_year_3_marks'];
	$ead_total_marks=$_POST['ead_total_marks'];
	$ead_obtained_marks=$_POST['ead_obtained_marks'];


	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="update $admission_selected set diploma_3year_total_marks='$diploma_3year_total_marks',diploma_year_3_marks='$diploma_year_3_marks',ead_total_marks='$ead_total_marks',ead_obtained_marks='$ead_obtained_marks' where application_id='$application_id'";
	$result1=mysqli_query($con,$sql);
		if(!$result1)
		{
			//echo "not updated";
			echo"<script>confirm('not updated retry');window.location.href='edit_marks.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('Updated');window.location.href='edit_marks.php'</script>";
		}

		mysqli_close($con);
	?>