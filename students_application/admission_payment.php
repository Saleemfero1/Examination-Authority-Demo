	<?php //accesing the setted cookie value in javascript in admission page
session_start();
$application_id=$_SESSION["application_id"];
$ranking=$_SESSION["ranking"];
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


?>
<?php
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");

			$sqla="select * from admissions where course='$selected_admission'";
			$resulta=mysqli_query($con,$sqla);
			if(! $resulta){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$arraya=mysqli_fetch_array($resulta);
				$option_entry_status=$arraya['option_entry'];
				//echo($arraya['option_entry']);
				//echo ($arraya['ongoing_option_entry']);
				$option_round=$arraya['ongoing_option_entry'];
				$result_status=$arraya['Result'];
				
				//echo($result_status);
			}



			//$application_id='dcet2021001';
			$application_id=strval($application_id);
			if($application_id==NULL)
			{
				echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
			}

			$sqla="select * from $table where application_id='$application_id'";
			$resulta=mysqli_query($con,$sqla);
			if(! $resulta){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$arraya=mysqli_fetch_array($resulta);
				$course=strval(strtolower($arraya['diploma_course']));
				$option_entry_value=$arraya['option_entry'];
				$selection='option_entry_'.$option_round.'_selected';
				$selection=$arraya[$selection];
				$caste=$arraya['caste'];
				$option_entry_round_1=$arraya['option_entry_1_result'];
				$option_entry_round_2=$arraya['option_entry_2_result'];
				$option_entry_round_3=$arraya['option_entry_3_result'];
				$payment_status=$arraya['payment_status'];
				//$option_entry_round_2=$arraya['option_entry_2'];
				//echo($option_entry_round_1);
				//echo($selection);

				//echo ($arraya['diploma_course']);
				//echo ($course);
				//if($arraya['application_id']==NULL)
					//echo "null";
				//else
					//echo($arraya['application_id']);
			}
			$collage_select=$_POST['collage_select'];
			$_SESSION['collage_select']=$collage_select;

			if($payment_status!=NULL)
			{
				$sql1="update $table set selected_collage='$collage_select' where application_id='$application_id'";
		$result1=mysqli_query($con,$sql1);
		if(!$result1)
		{
			//echo"not updated";
			echo"<script>confirm('internal error');window.location.href='option_entry.php'</script>";
		}
		else
		{
			//echo "updated";
			echo"<script>confirm('Opted Collage');window.location.href='option_entry.php'</script>";
		}

		mysqli_close($con);
			}
			//echo($collage_select);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admission_payment.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Option Entry</title>
</head>
<body>
	<div class="Examination_Authority">
	<div class="img1">
		<img src="images/log.png">
	</div>
	<div class="text">
		<h1>Examination Authority Demo Project</h1>
		<h2>Round : <?php echo ($option_round); ?></h2>
	</div>
	<div class="img2">
		<img src="images/logo 1.png">
	</div>
</div>
<div id="student_id">
	<p>Student id : <span><?php echo($arraya['application_id']); ?></span> <label>Rank :</label> <span><?php echo($arraya['ranking']); ?></span> </p>
</div>
<div id="go_back">
	<button onclick="window.location.href='http://localhost/EAD%20project/students_application/option_entry.php'"><i class="fad fa-sign-out-alt"></i> Go-back </button>
</div>



	<div id="basic_details_form">
		<center><h1>Online Card Payment</h1></center>
	</div>
	<div id="application_form" >
		<form method="post" action="option_entry_payment.php">
			<h1><center>E.A.D Admission Fee Payment</center></h1>
			<center><h4>Total Amount =<span> 
				<?php
					if ($caste=='SC' || $caste=='ST') {
					 	echo "Rs. 500";
					 }
					 else {
					  	echo "Rs. 19090";
					  } 
			 	?>		
			 	</span></h4></center>

			<table>
				 <tr>
			 	<td><label>Payment</label></td>
			 	<td>
			 		<img src="images/Rupay.png" id="rupay"><img src="images/payments.png" alt="images of payment"></td>
			 </tr>
			</table>

		</form>
		<form method="post" action="option_entry_payment.php">
			<table>
				<tr>
			 		<td><input type="text" name="name" placeholder="Name on Card *" required=></td>
			 	</tr>
			 	<tr>
			 		<td><input type="text" name="number" placeholder="Card Number 16 digit eg. 1234-1234-1234-1234 *"  pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}"></td>
			 	</tr>
			 	<tr>
			 		<td><input type="month" min="<?php
							$max=date('Y-m'); 
							echo ($max);

			 		?>" name="month" placeholder="Expiry Month and year *" required></td>
			 		<td><input type="number" id="security_code" maxlength="3" pattern="[0-9]{3}" name="security_code" placeholder="Security code *" required></td>
			 	</tr>
			</table>
			<?php
			if ($payment_status=='done')
				echo "<p><center>payment already made</center></p>";
			else
				echo "<input type='submit' name='submit' value='Pay'>";
		?>
		</form>
		<center>
			<img src="images/safe.png" alt="safe image">
		<img src="images/secure1.png" alt="secure image">
		<img src="images/secure2.png" alt="secure image">
		</center>
	</div>
</body>
</html>
