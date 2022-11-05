<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
//echo($selected_admission);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}
?>
<!-------------checking if we can create account or not----------------->
<?php
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
			else
			{
					if($row=mysqli_fetch_assoc($result))
						{
							if($row['status']!='open') 
								{
									echo "<script>confirm('$selected_admission applications are closed so you cannot create account'); window.location.href='http://localhost/EAD%20project/admission.php'</script>";
								}
						}
			}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title><?php  echo($selected_admission); ?> Account Creation</title>
	<link rel="stylesheet" type="text/css" href="css/create_account.css">
	<script type="text/javascript">
	function validate_password() {
		var pass=document.getElementById("password").value;
		var repass=document.getElementById("re_password").value;
		if(pass!=repass) {
			document.getElementById("re_password").style.color="red";	
		}
		else
		{
			document.getElementById("re_password").style.color="black";
		}
	}
</script>
</head>

<body>
<!----password and re password checking---->




<!--------------------------------------------header ------------------------------------------>

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

<!------------------------------------------heading Account creation------------------------------------------>
<div id="account_creation_heading">
	<h1><?php echo($selected_admission); ?> Account Creation</h1>
</div>

<!------------------------------back button--------------------------------->
	<div id="back_button">
		<input type="button" value="Go Back!" onclick="history.back()">
	</div>

<!------------------------------account creation body--------------------------------->

<div id="create_account">
	<form method="post" action="create_account_validate.php">
	<table>
	<tr><td><span>Name </span></td>
	<td><input type="text" name="name" value="" placeholder="eg. Ram" required></td></tr>
	<tr><td><span>Phone Number </span></td>
	<td><input type="tel" name="phone" value="" placeholder="eg. 1234567890  (exclude +91)" pattern="[0-9]{10}" title="show contain valid 10 digits phone number only (exclude +91)" required></td></tr>
	<tr><td><span>Email Id </span></td>
	<td><input type="email" name="email"  placeholder="eg. abc@gmail.com" value="" required></td></tr>
	<tr><td><span>Password </span></td>
	<td><input type="password" name="password" id="password" placeholder="eg. 123dfsaj" minlength="8" value="" required></td></tr>
	<tr><td><span>Confirm Password </span></td>
	<td><input type="text" name="re_password" id="re_password" placeholder="eg. 123dfsaj" value="" minlength="8" onmouseout="validate_password()" required></td></tr>
	<tr><td><span>Captacha </span></td>
	<td><input type="text" name="captacha" placeholder="see below and type the captacha" value="" required></td></tr>
	<?php 
			//captacha for random numbers and characters
			$n=5;
			$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$random_string=substr(str_shuffle($characters),0,$n);
			//echo ($random_string);
		?>
	</table>
	<div id="captacha">
		<label><?php
		session_start();
		$_SESSION["captacha"]=$random_string;
		echo ($random_string);?></label><i class="fas fa-sync-alt" onclick="location.reload();"></i>
	</div><br>
	<input type="checkbox" name="" required=""><label id="checkbox" >i agree to all the condition imposed by EAD for the admission processes</label><br>
	<input type="submit" id="submit" name="submit" value="Submit">
	<input type="Reset" name="Reset" value="Reset">
	</form>
</div>

</body>
</html>