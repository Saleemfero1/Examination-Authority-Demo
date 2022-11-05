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

$priority=$_POST['priority'];
$news=$_POST['announcement'];
$link=$_POST['link'];
//echo "$news";
if($link=="NULL"||$link==NULL)
{
	$link="#";
}
if ($news!='NULL'&&$news!=NULL) {
	//echo "<script>confirm('Empty Values'); window.location.href='admission_updates.php'</script>"; 
//echo "$news";
 $username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="insert into $table values('$priority','$news','$link')";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo "<script>confirm('Error data already exists '); window.location.href='admission_updates.php'</script>"; 
	}
	else
	{
		echo "<script>window.location.href='admission_updates.php'</script>"; 
	}
	mysqli_close($con);
}
else{
	//echo "<script>confirm('Empty Values'); window.location.href='admission_updates.php'</script>";
}
 ?>

