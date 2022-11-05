<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
//echo($selected_admission);
if($selected_admission==NULL||$selected_admission=='NULL')
	echo"<script>confirm('page navigates to another page due to internal error');window.location.href='http://localhost/EAD%20project/admission.php'</script>";


$to_string=strval($selected_admission);
	$to_string=strval($selected_admission);
	$tolower=strtolower($to_string);
	$table=str_replace(" ", "_",$tolower);
	//echo($table);
//$search_string1=strtolower($to_string);
//$table1=str_replace(" ", "_",$tolower);
//echo($table1);
//$kcet='kcet';
//$dcet='dcet';

//captacha session retrival
session_start();
$captacha_check=$_SESSION["captacha"];
//echo($captacha_check);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}

//getting values from the form

$application_id=$_POST['application_id'];
$int_phone=$_POST['phone'];
$phone=strval($int_phone);
//echo($phone);
$password=$_POST['password'];
$re_password=$_POST['re_password'];
$captacha=$_POST['captacha'];

if ($captacha!=$captacha_check) {
	echo"<script>confirm('incorrect captacha please retry with proper captacha');window.location.href='forgot_password.php'</script>";
}

if($password!=$re_password)
	echo"<script>confirm('password and confirm password are not same please check and retry');window.location.href='forgot_password.php'</script>";

//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql= "SELECT application_id,phone FROM $table where application_id='$application_id'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo"<script>confirm('no application on particular id please create an account and retry or may be an internal error try later');window.location.href='forgot_password.php'</script>";

	}
	else
	{
			$row=mysqli_fetch_assoc($result);

			$retrived_phone=strval($row['phone']);
			//echo($retrived_phone);
			$retrived_application_id=$row['application_id'];
			if ($row['application_id']!=NULL) 
			{
				//echo "application";
				if($row['application_id']=='NULL')
					{
						//echo "nodata null ";
						echo"<script>confirm('no application avaliable on that particular application id');window.location.href='student_login.php'</script>";
						mysql_close($con);
					}

				if($row['application_id']==NULL)
					{		//echo "null data";
						echo"<script>confirm('no application avaliable on that particular application id');window.location.href='student_login.php'</script>";
						mysql_close($con);
					}
				
				if ($retrived_phone!=$phone) {
					//echo"phone number incorrect";
					echo"<script>confirm('Incorrect Phone Number');window.location.href='forgot_password.php'</script>";
					mysql_close($con);
				}
				if($retrived_phone==$phone){
					//echo "correct phone";
					$sql= "update $table set password='$re_password' where application_id='$application_id'";
						$result=mysqli_query($con,$sql);
						if(!$result)
						{
							echo"<script>confirm('due to internal error it cannot be processed please retry');window.location.href='forgot_password.php'</script>";
							mysql_close($con);
						}
						else
						{
							echo"<script>confirm('password updated for application id $application_id for $table');window.location.href='student_login.php'</script>";
						}
				}
			}
			else
			{
				//echo"no application";
				echo"<script>confirm('no application on particular id please create an account and retry');window.location.href='student_login.php'</script>";
			}
	}
	mysqli_close($con);
?>