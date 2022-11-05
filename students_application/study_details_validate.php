<?php
session_start();
//echo($_SESSION['application_id']);
$application_id=$_SESSION['application_id'];
//echo($_SESSION['admission_type']);
?>
<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
$to_string=strval($selected_admission);
$tolower=strtolower($to_string);
$table=str_replace(" ", "_",$tolower);
	//echo($table);
//echo($selected_admission);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}

//$dob=$_POST['dob'];//getting the dob id entered in form
//echo($dob);
$tenth_studied_state=$_POST['10th_studied_state'];
$tenth_passed_year=$_POST['10th_passed_year'];
$tenth_roll_number=$_POST['10th_roll_number'];
$tenth_type=$_POST['10th_type'];
$tenth_obtained_marks=$_POST['10th_obtained_marks'];
$tenth_total_marks=$_POST['10th_total_marks'];
$diploma_course=$_POST['diploma_course'];
$diploma_roll_number=$_POST['diploma_roll_number'];
$diploma_year_1_marks=$_POST['diploma_year_1_marks'];
$diploma_1year_total_marks=$_POST['diploma_1year_total_marks'];
$diploma_year_1_status=$_POST['diploma_year_1_status'];
$diploma_year_2_marks=$_POST['diploma_year_2_marks'];
$diploma_2year_total_marks=$_POST['diploma_2year_total_marks'];
$diploma_year_2_status=$_POST['diploma_year_2_status'];
$diploma_year_3_marks=$_POST['diploma_year_3_marks'];
$diploma_3year_total_marks=$_POST['diploma_3year_total_marks'];
$diploma_year_3_status=$_POST['diploma_year_3_status'];

	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");



		$sql1="update $table set 10_studied_state='$tenth_studied_state',10_passed_year='$tenth_passed_year',10_roll_number='$tenth_roll_number',10_type='$tenth_type',10_marks='$tenth_obtained_marks',10_total_marks='$tenth_total_marks',diploma_roll_number='$diploma_roll_number',diploma_course='$diploma_course',diploma_year_1_marks='$diploma_year_1_marks',diploma_1year_total_marks='$diploma_1year_total_marks',diploma_year_1_status='$diploma_year_1_status',diploma_year_2_marks='$diploma_year_2_marks',diploma_2year_total_marks='$diploma_2year_total_marks',diploma_year_2_status='$diploma_year_2_status',diploma_year_3_marks='$diploma_year_3_marks',diploma_3year_total_marks='$diploma_3year_total_marks',diploma_year_3_status='$diploma_year_3_status' where application_id='$application_id'";
		$result1=mysqli_query($con,$sql1);
		if(!$result1)
		{
			//echo"not updated";
			echo"<script>confirm('not updated retry');window.location.href='study_details.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('application saved');window.location.href='study_details.php'</script>";
		}

		mysqli_close($con);
?>