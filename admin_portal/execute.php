<?php
//accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strval(strtoupper($_COOKIE['admissions']));
//	echo($admissions);
$seat_matrix=str_replace(" ", "_", strtolower($_COOKIE['admissions']))."_seat_matrix";
//echo($seat_matrix);
//echo($selected_admission);

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");

	$course='closed';
	$status='closed';
	$edit_option='closed';
	$display='previous';
	$seat_matrix_edit='closed';
	$option_entry='closed';
	$ongoing_option_round=0;


//$course=$_POST['admissions'];
if(isset($_POST['admissions'])){
$course='open';
}
else{

//echo "off";
}

if(isset($_POST['status'])){
$status='open';
}
//else{
//	$status='closed';
//echo "off";
//}

//$edit_option=$_POST['edit_option'];
if(isset($_POST['edit_option'])){
$edit_option='open';
}
//echo($edit_option);
//else{
//	$edit_option='closed';
//echo "off";
//}

//$display=$_POST['display'];

if(isset($_POST['display'])){
$display='present';
}

//echo($display);


//$seat_matrix_edit=$_POST['seat_matrix_edit'];
if(isset($_POST['seat_matrix_edit'])){
$seat_matrix_edit='open';
}


if($seat_matrix_edit=='open')
{
	$sql3="select * from admissions where course='$admissions'";
	$result2=mysqli_query($con,$sql3);
	$row=mysqli_fetch_array($result2);
	//echo($row['seat_matrix']);
	if(strval($row['seat_matrix'])!='created')
		echo "<script>confirm('seat_matrix not yet created'); window.location.href='admission_updates.php'</script>"; 
}


if(isset($_POST['option_entry'])){
$option_entry='open';
}

$ongoing_option_round=$_POST['ongoing_option_round'];
if($ongoing_option_round>=4)
{
	$ongoing_option_round=3;
	echo "<script>confirm('the database is created has a capacity for only 3 rounds only please update the database'); window.location.href='admission_updates.php'</script>"; 
}

//echo($seat_matrix_edit);
//else{
//	$seat_matrix_edit='closed';
//echo "off";
//}


//echo($course);
//echo($status);
//echo($edit_option);
//echo($display);
//echo($seat_matrix_edit);
$sql2="update admissions set display='$display',status='$status',edit_option='$edit_option',seat_matrix_edit='$seat_matrix_edit',admissions='$course',option_entry='$option_entry',ongoing_option_entry='$ongoing_option_round' where course='$admissions'";
	$result2=mysqli_query($con,$sql2);
	if (!$result2) {
		# code...
		//echo "no";
		echo "<script>confirm('database not Updated due to technical error'); window.location.href='admission_updates.php'</script>"; 
	}
	else{
		//echo "yes";
		echo "<script>confirm('Database Updated'); window.location.href='admission_updates.php'</script>"; 
	}


?>