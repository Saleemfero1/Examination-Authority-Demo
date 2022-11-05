<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
//echo($selected_admission);
if($selected_admission==NULL||$selected_admission=='NULL')
	echo"<script>confirm('page navigates to another page for proper login');window.location.href='http://localhost/EAD%20project/admission.php'</script>";


$to_string=strval($selected_admission);
	$to_string=strval($selected_admission);
	$tolower=strtolower($to_string);
	$table=str_replace(" ", "_",$tolower);
//$search_string1=strtolower($to_string);
//$table1=str_replace(" ", "_",$tolower);
//echo($table1);
//$kcet='kcet';
//$dcet='dcet';

//captacha session retrival
session_start();
$captacha_check=$_SESSION["captacha"];
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}

//getting values from the form

$application_id=$_POST['application_id'];
$captacha=$_POST['captacha'];
$password=$_POST['password'];
$password_str=strval($password);
//echo('password_str ='.$password_str);


if ($captacha!=$captacha_check) {
	echo"<script>confirm('incorrect captacha please retry with proper captacha');window.location.href='student_login.php'</script>";
}

	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql= "SELECT application_id,password,final_submit FROM $table where application_id='$application_id'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo"<script>confirm('no application on particular id please create an account and retry or may be an internal error try later');window.location.href='student_login.php'</script>";

	}
	else
	{
			$row=mysqli_fetch_assoc($result);
			//echo($row['password']);
			$password_fetched=strval($row['password']);
			if ($row['application_id']) 
			{
				if($password_fetched=='NULL')
					echo"<script>confirm('please reset u your password and login');window.location.href='student_login.php'</script>";

				if($password_fetched==NULL)
					echo"<script>confirm('please reset u your password and login');window.location.href='student_login.php'</script>";

				if ($password_str!=$password_fetched) {
					echo"<script>confirm('Incorrect Password');window.location.href='student_login.php'</script>";
				}
					if($password_str==$password_fetched){
						$_SESSION["admission_type"]=$selected_admission;
						$_SESSION["application_id"]=$row['application_id'];
							echo"<script>window.location.href='application_form.php'</script>";
				}
			}
			else
			{
				echo"<script>confirm('no application on particular id please create an account and retry');window.location.href='student_login.php'</script>";
			}
	}

//connecting to mysql




//if(strpos($search_string,$dcet)!==false)
	//{
	//	echo "<script>window.location.href='dcet.php'</script>";
	//}

//if(strpos($search_string,$kcet)!==false)
//	{
	//	echo "<script>window.location.href='kcet.php'</script>";
//	}

//


				mysqli_close($con);
?>