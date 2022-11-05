<?php //accesing the setted cookie value in javascript in admission page
session_start();
$application_id=$_SESSION["application_id"];
$ranking=$_SESSION["ranking"];
$collage_select=$_SESSION['collage_select'];
//echo($ranking);
//echo($application_id);

$selected_admission=$_COOKIE['display_content'];
$table=str_replace(" ","_",strtolower($_COOKIE['display_content']));
$seat_matrix=str_replace(" ","_",strtolower($_COOKIE['display_content']))."_seat_matrix";
//echo($selected_admission);
//echo ($seat_matrix);
$to_string=strval($selected_admission);
$tolower=strtolower($to_string);
$table=str_replace(" ", "_",$tolower);
//echo($table);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}




$name=$_POST['name'];
$card_no=$_POST['number'];
$month=$_POST['month'];
$security_code=$_POST['security_code'];


	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");


$sql= "SELECT * FROM $table where application_id='$application_id'";
			$result=mysqli_query($con,$sql);
			if(!$result)
	{
		echo"<script>confirm(' internal error try later');window.location.href='application_form.php'</script>";

	}
	else{
				$row=mysqli_fetch_assoc($result);
				if ($row['payment_status']=='done'){
				echo"<script>confirm('payment already made');window.location.href='application_form.php'</script>";
				mysqli_close($con);
			}
			if ($row['caste']=='SC') {
					 	$amount=500;
					 }
					 else {
					  	$amount=19090;
					  } 
}


			$sql1= "SELECT * FROM card";
			$result1=mysqli_query($con,$sql1);
			if(!$result1)
			{
				echo"<script>confirm(' internal error try later');window.location.href='option_entry.php'</script>";
			}
			else{
				$row1=mysqli_fetch_assoc($result1);
				//echo($row1['name']);
				//echo($row1['card_number']);
				//echo($row1['date']);
				//echo($row1['security_code']);

				if (strval($name)!=$row1['name']) {
					//echo"same";
					echo"<script>confirm(' incorrect credentials');window.location.href='option_entry.php'</script>";
					mysqli_close($con);
				}


				if (strval($card_no)!=$row1['card_number']) {
					echo"<script>confirm(' incorrect credentials');window.location.href='option_entry.php'</script>";
					mysqli_close($con);
				}
				if (strval($month)!=$row1['date']) {
					echo"<script>confirm(' incorrect credentials');window.location.href='option_entry.php'</script>";
					mysqli_close($con);
				}
				if (strval($security_code)!=$row1['security_code']) {
					echo"<script>confirm(' incorrect credentials');window.location.href='option_entry.php'</script>";
					mysqli_close($con);
				}
			}


			$sql1="update $table set payment_status='done',admission_amount='$amount',selected_collage='$collage_select' where application_id='$application_id'";
		$result1=mysqli_query($con,$sql1);
		if(!$result1)
		{
			//echo"not updated";
			echo"<script>confirm('payment unsuccessful');window.location.href='option_entry.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('payment successful');window.location.href='option_entry.php'</script>";
		}

		mysqli_close($con);

?>