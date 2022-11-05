<?php
//accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
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
//$seat_matrix_edit=$_POST['seat_matrix_edit'];
if(isset($_POST['seat_matrix_edit'])){
$seat_matrix_edit='open';
}

echo($_POST['seat_matrix_edit']);
echo($seat_matrix_edit);