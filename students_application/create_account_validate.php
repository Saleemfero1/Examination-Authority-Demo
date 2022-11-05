



<?php //accesing the setted cookie value in javascript in admission page
	$selected_admission=$_COOKIE['display_content'];
	$to_string=strval($selected_admission);
	$tolower=strtolower($to_string);
	$table=str_replace(" ", "_",$tolower);
	//echo($table);
	$application_id_purpose=str_replace(" ", "",$tolower);
	//echo($application_id_purpose);
//echo($selected_admission);
session_start();
//echo($_SESSION["captacha"]);
$captacha_check=($_SESSION["captacha"]);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}


//getting all the vales entered in the account creation form
$name=$_POST['name'];//getting the name id entered in form
$phone=$_POST['phone'];
$email=$_POST['email'];
$captacha=$_POST['captacha'];
$password=$_POST['password'];
$re_password=$_POST['re_password'];

if($password!=$re_password)
	echo"<script>confirm('password and confirm password are not same please check and retry');window.location.href='http://localhost/EAD%20project/students_application/create_account.php'</script>";
if($captacha!=$captacha_check)
	echo"<script>confirm('please enter proper captacha and retry');window.location.href='http://localhost/EAD%20project/students_application/create_account.php'</script>";





	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");


//here we will check wheather the entered phone number has any application
	$sql= "SELECT application_id FROM $table where phone='$phone'";
			$result=mysqli_query($con,$sql);
			if($result){
				$row=mysqli_fetch_assoc($result);
					$retrieved_application_id=$row['application_id'];
					if($retrieved_application_id!=NULL){
					echo"<script>confirm('account already exists with this phone number application id is $retrieved_application_id');window.location.href='student_login.php'</script>";
					mysqli_close($con);
				}
					else{
						if ($retrieved_application_id=='NULL') {
							echo"<script>confirm('internal error please retry');window.location.href='student_login.php'</script>";
						}
					}

				}


	//first we will create a application for the user for the fetch it from database
	$fetch_id=$table.'_count';
	$sql="SELECT * FROM $fetch_id";
	$result=mysqli_query($con,$sql);
	if(!$result)
		echo "The collage details are not avaliable";
		


	$array=mysqli_fetch_array($result);
	$count=$array['count'];
	$new_count=1;
	$new_count+=$array['count'];

		$sql="update $fetch_id set count=$new_count where count='$count'";
	$result=mysqli_query($con,$sql);
	if(!$result)
		echo"<script>confirm('internal error please retry later or application has not yet started');window.location.href='http://localhost/EAD%20project/students_application/create_account.php'</script>";
	
	$application_id=$application_id_purpose.'00'.$new_count;
	//echo($application_id);


	$sql="insert into $table (application_id,name,phone,email)values('$application_id','$name','$phone','$email')";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		//echo"error";
		echo"<script>confirm('internal error please retry');window.location.href='http://localhost/EAD%20project/students_application/create_account.php'</script>";
	}
	else
	{
		$sql1="update $table set password='$re_password' where application_id='$application_id'";
		$result1=mysqli_query($con,$sql1);
		echo"<script>confirm('Account Created Please Login and apply with user id is $application_id ');window.location.href='student_login.php'</script>";
	}


mysqli_close($con);

?>