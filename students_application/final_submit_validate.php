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

	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql1="update $table set final_submit='done' where application_id='$application_id'";
	$result1=mysqli_query($con,$sql1);
		if(!$result1)
		{
			//echo"not updated";
			echo"<script>confirm('not updated retry');window.location.href='final_submit.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('final submission over please make payment');window.location.href='final_submit.php'</script>";
		}

		mysqli_close($con);
	?>