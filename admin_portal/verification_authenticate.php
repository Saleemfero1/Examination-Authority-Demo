<?php 
$id=strval($_POST['user_id']);
$password=$_POST['password'];
$pass=strval($password);
//echo($id);
//echo " ";


//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admin_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql= "SELECT password FROM verification_officer where id='$id'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	if(!$result)
	{
		//echo "no";
		echo"<script>confirm('invalid user');window.location.href='http://localhost/EAD%20project/admin_portal/verification.php'</script>";

	}
	else
	{
		//echo "yes";
		//echo($row['password']);
		$check=strval($row['password']);
		if($check==$pass){
			//echo "yes pass";
			echo"<script>window.location.href='http://localhost/EAD%20project/admin_portal/verification.php'</script>";
		}
		else
				echo"<script>confirm('password mismatch');window.location.href='http://localhost/EAD%20project/admin_portal/verification.php'</script>";
	}
?>

