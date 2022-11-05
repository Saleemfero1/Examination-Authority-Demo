<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strval(strtoupper($_COOKIE['admissions']));
echo($admissions);
$seat_matrix=str_replace(" ", "_", strtolower($_COOKIE['admissions']))."_seat_matrix";
//echo($seat_matrix);
//echo($selected_admission);
?>

<?php

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="drop table $seat_matrix";
				$result=mysqli_query($con,$sql);
				if (!$result)
				 {
					//echo "no";
					echo"<script>confirm('technical error or no database');window.location.href='admission_updates.php'</script>";
					
				}
				else
				{
					$sql="update admissions set seat_matrix=' ',seat_matrix_edit=' ' where course='$admissions'";
				$result=mysqli_query($con,$sql);
				if (!$result) {
					# code...
					//echo "no";
					echo"<script>confirm('technical error or no database');window.location.href='admission_updates.php'</script>";
				}
				else
				{
					//echo "yes";
					echo"<script>confirm('dropped seat matrix');window.location.href='admission_updates.php'</script>";
				}
					echo"<script>confirm('dropped seat matrix');window.location.href='admission_updates.php'</script>";
				}