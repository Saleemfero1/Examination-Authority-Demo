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

$dob=$_POST['dob'];//getting the dob id entered in form
//echo($dob);
$gender=$_POST['gender'];
$email=$_POST['email'];
$adhaar=$_POST['adhaar'];
$nationality=$_POST['nationality'];
$mother_tongue=$_POST['mother_tongue'];
$religion=$_POST['religion'];
$caste=$_POST['caste'];
$subcaste=$_POST['subcaste'];
$address=$_POST['address'];
$states=$_POST['states'];
$district=$_POST['district'];
$pincode=$_POST['district1'];
//echo ($pincode);
if($gender==1)
	$gender='male';
if($gender==2)
	$gender='female';
if($gender==3)
	$gender='transgender';
	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");



		$sql1="update $table set dob='$dob',gender='$gender',adhaar='$adhaar',nationality='$nationality',mother_tongue='$mother_tongue',religion='$religion',caste='$caste',sub_caste='$subcaste',address='$address',state='$states',district='$district',pincode='$pincode' where application_id='$application_id'";
		$result1=mysqli_query($con,$sql1);
		if(!$result1)
		{
			//echo"not updated";
			echo"<script>confirm('not updated retry');window.location.href='student_login.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('application saved');window.location.href='application_form.php'</script>";
		}

		mysqli_close($con);
?>