	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);
$table=strtolower(str_replace(" ","_",$admissions));
//echo "$table";
//echo($selected_admission);
?>
<?php 
$news=$_COOKIE['news'];
//echo "$news";
 $username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="delete from $table where announcement='$news'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo "<script>confirm('Error '); window.location.href='admission_updates.php'</script>"; 
	}
	else
	{
		echo "<script> window.location.href='admission_updates.php'</script>"; 
	}
	mysqli_close($con);
 ?>