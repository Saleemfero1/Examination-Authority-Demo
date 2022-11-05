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
					echo"<script>confirm('Applications are already closed');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
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
			if ($row['final_submit']!='done'||$row['application_payment']!='done') {
				echo"<script>confirm('Applications are not submitted properly either do payment or final submit it');window.location.href='application_form.php'</script>";
			}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title><?php  echo($selected_admission); ?> Applications</title>
	<link rel="stylesheet" type="text/css" href="css/print_application.css">


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

		<button onclick='location.href="http://localhost/EAD%20project/students_application/option_entry.php"'>GO - BACK</button>

	</div>


	<div id="application_id">
		<h1>Application Id : <?php echo($row['application_id']); ?></h1>
	</div>


	<div id="basic_details_form">
		<center><h1>Print Admission Order</h1></center>
	</div>
	<div id="application_form" onclick='window.print()'>
	<table>
		<tr>
			<td><span>Candidate Photo :</span></td>
			<td><label><img src="candidates_photo/<?php echo($row['application_id']);  ?>"></label></td>
		</tr>
		<tr>
			<td><span>Application Id :</span></td>
			<td><label><?php echo($row['application_id']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Name :</span></td>
			<td><label><?php echo($row['name']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Ranking :</span></td>
			<td><label><?php echo($row['ranking']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Allocated Collage / Course </span></td>
			<td><label><?php echo($row['selected_collage']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Payment Status :</span></td>
			<td><label><?php echo($row['payment_status']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Date Of Birth :</span></td>
			<td><label><?php echo($row['dob']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Gender :</span></td>
			<td><label><?php echo($row['gender']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Contact Number :</span></td>
			<td><label><?php echo($row['phone']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Email Id :</span></td>
			<td><label><?php echo($row['email']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Adhaar Number :</span></td>
			<td><label><?php echo($row['adhaar']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Nationality :</span></td>
			<td><label><?php echo($row['nationality']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Mother Tongue :</span></td>
			<td><label><?php echo($row['mother_tongue']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Religion :</span></td>
			<td><label><?php echo($row['religion']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Caste :</span></td>
			<td><label><?php echo($row['caste']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Sub Caste :</span></td>
			<td><label><?php echo($row['sub_caste']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Address :</span></td>
			<td><label><?php echo($row['address']);  ?></label></td>
		</tr>
		<tr>
			<td><span>State :</span></td>
			<td><label><?php echo($row['state']);  ?></label></td>
		</tr>
		<tr>
			<td><span>District :</span></td>
			<td><label><?php echo($row['district']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Pincode :</span></td>
			<td><label><?php echo($row['pincode']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Final Submit :</span></td>
			<td><label><?php echo($row['final_submit']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Admission  Fee :</span></td>
			<td><label><?php echo($row['admission_amount']);  ?></label></td>
		</tr>
		<tr>
			<td><span>Payment Status :</span></td>
			<td><label><?php echo($row['payment_status']);  ?></label></td>
		</tr>

	</table>
	<center><button >Print</button></center>
	</div>
</body>
</html>