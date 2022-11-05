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


$name=$_POST['name'];
$card_no=$_POST['number'];
$month=$_POST['month'];
$security_code=$_POST['security_code'];
//echo ($name);
//echo ($card_no);
//echo ($month);
//echo ($security_code);



	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");


//here we will check wheather the entered phone number has any application
	$sql= "SELECT * FROM $table where application_id='$application_id'";
			$result=mysqli_query($con,$sql);
			if(!$result)
	{
		echo"<script>confirm(' internal error try later');window.location.href='application_form.php'</script>";

	}
	else{
				$row=mysqli_fetch_assoc($result);
				if ($row['application_payment']=='done'){
				echo"<script>confirm('payment already made');window.location.href='application_form.php'</script>";
				mysqli_close($con);
			}
			if ($row['caste']=='SC') {
					 	$amount=500;
					 }
					 else {
					  	$amount=650;
					  } 

			$sql1= "SELECT * FROM card";
			$result1=mysqli_query($con,$sql1);
			if(!$result1)
			{
				echo"<script>confirm(' internal error try later');window.location.href='application_form.php'</script>";
			}
			else{
				$row1=mysqli_fetch_assoc($result1);
				//echo($row1['name']);
				//echo($row1['card_number']);
				//echo($row1['date']);
				//echo($row1['security_code']);

				if (strval($name)!=$row1['name']) {
					//echo"same";
					echo"<script>confirm(' incorrect credentials');window.location.href='payment.php'</script>";
					mysqli_close($con);
				}


				if (strval($card_no)!=$row1['card_number']) {
					echo"<script>confirm(' incorrect credentials');window.location.href='payment.php'</script>";
					mysqli_close($con);
				}
				if (strval($month)!=$row1['date']) {
					echo"<script>confirm(' incorrect credentials');window.location.href='payment.php'</script>";
					mysqli_close($con);
				}
				if (strval($security_code)!=$row1['security_code']) {
					echo"<script>confirm(' incorrect credentials');window.location.href='payment.php'</script>";
					mysqli_close($con);
				}
			}
}

$sql1="update $table set application_payment='done',application_fee='$amount' where application_id='$application_id'";
		$result1=mysqli_query($con,$sql1);
		if(!$result1)
		{
			//echo"not updated";
			echo"<script>confirm('payment unsuccessful');window.location.href='payment.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('payment successful');window.location.href='payment.php'</script>";
		}

		mysqli_close($con);
?>