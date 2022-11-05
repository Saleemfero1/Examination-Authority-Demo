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
$int_phone=$_POST['phone'];
$phone=$int_phone;
//echo($phone);
$captacha=$_POST['captacha'];

if ($captacha!=$captacha_check) {
	echo"<script>confirm('incorrect captacha please retry with proper captacha');window.location.href='know_your_application_id.php'</script>";
}
//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql= "SELECT application_id,phone FROM $table where phone='$phone'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo"<script>confirm('no application on particular phone number please create an account and retry or may be an internal error try later');window.location.href='forgot_password.php'</script>";

	}
	else
	{
			$row=mysqli_fetch_assoc($result);
			$application_id=$row['application_id'];
			//echo($application_id);
			$retrived_phone=$row['phone'];
			//echo($retrived_phone);
			if ($row['phone']!=NULL) 
			{
				//echo "application";
				if($row['phone']=='NULL')
					{
						//echo "nodata null ";
						echo"<script>confirm('no application avaliable on that particular phone number');window.location.href='student_login.php'</script>";
						mysql_close($con);
					}

				if($row['phone']==NULL)
					{		//echo "null data";
						echo"<script>confirm('no application avaliable on that particular phone number');window.location.href='student_login.php'</script>";
						mysql_close($con);
					}
				
				
				else{
					//echo "correct phone";
					echo"<script>confirm('your application id is $application_id');window.location.href='student_login.php'</script>";
				}
			}
			else
			{
				//echo"no application";
				echo"<script>confirm('no application on particular phone number please create an account and retry');window.location.href='student_login.php'</script>";
			}
	}
	mysqli_close($con);
?>