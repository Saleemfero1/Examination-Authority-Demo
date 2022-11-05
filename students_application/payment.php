<?php
session_start();

$application_id=$_SESSION['application_id'];
//echo($_SESSION['application_id']);
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
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="SELECT * FROM admissions where course='$selected_admission'";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			$row=mysqli_fetch_assoc($result);
			$status=$row['edit_option'];
			if($row['status']=='closed')
			{
				if($row['edit_option']=='closed'||$row['edit_option']==NULL)
				{
					echo"<script>confirm('Applications are already closed');</script>";
				}
			}
			$sql="SELECT * FROM $table where application_id='$application_id'";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			$row=mysqli_fetch_assoc($result);
			$final_submit=strval($row['final_submit']);
			//if ($row['final_submit']=='done') {
			//	echo"<script>confirm('final subit already done');window.location.href='student_login.php'</script>";
			//}
			if ($row['final_submit']!='done') {
				echo"<script>confirm('without final submission payment cannot be made');window.location.href='final_submit.php'</script>";
			}
			if ($row['application_payment']=='done') {
				echo"<script>confirm('payment already made');</script>";
				mysqli_close($con);
			}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title><?php  echo($selected_admission); ?> Applications</title>
	<link rel="stylesheet" type="text/css" href="css/payment.css">


</head>
		
<body>
<script type="text/javascript">
	function logout(){
		$_SESSION['selected_admission']='NULL';
		sessionStorage.clear();
	}
	</script>
	<div class="Examination_Authority">
		<div class="img1">
			<img src="images/log.png">
		</div>
		<div class="text">
			<h1>Examination Authority Demo Project</h1>
			<h2><?php echo($selected_admission); ?></h2>
		</div>
		<div class="img2">
			<img src="images/logo 1.png">
		</div>
	</div>

	<div id="selection_tab">
		<a href="application_form.php">Personal Details</a>
		<a href="		<?php 
		$search_string=strtolower($to_string);
		$kcet='kcet';
		$dcet='dcet';
		if(strpos($search_string,$dcet)!==false)
			{
				echo "study_details.php";
			}
		
		if(strpos($search_string,$kcet)!==false)
			{
				echo "kcet.php";
			}
		 ?>">Study Details</a>

		<a href="image_upload.php">Image Upload</a>
		<a href="final_submit.php">Final Submit</a>
		<a href="#">Payment</a>
		<a href="print_application.php">Print Application</a>
		<button onclick='location.href="http://localhost/EAD%20project/students_application/student_login.php"'>Log-out</button>

	</div>


	<div id="application_id" >
		<h1>Application Id : <?php echo($row['application_id']); ?></h1>
	</div>


	<div id="basic_details_form">
		<center><h1>Online Card Payment</h1></center>
	</div>
	<div id="application_form" 
	 <?php 
	 if ($row['final_submit']!='done')
	 	echo "display:none";
	
	 ?>
	 >
		<form method="post" action="payment_validate.php">
			<h1><center>E.A.D Application form Payment</center></h1>
			<center><h4>Total Amount =<span> 
				<?php
					if ($row['caste']=='SC') {
					 	echo "Rs. 500";
					 }
					 else {
					  	echo "Rs. 600";
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
		<form method="post" action="payment_validate.php">
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
			if ($row['application_payment']=='done')
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