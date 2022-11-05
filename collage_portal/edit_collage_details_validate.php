<?php 
	session_start();
	$collage_id=$_SESSION['collage_id'];
$database="collage_portal";
 $con=mysqli_connect("localhost","root","") or die("unable to connect host");
 $sql=mysqli_select_db($con,$database)or die("unable to connect to database");
$sql="SELECT image FROM collage_list where collage_id='$collage_id'" ;
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	$new_count=$array['image'];
	if(!$new_count)
		$new_count=$collage_id;
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['phone_number'];
	$email=$_POST['email'];
	$collage_type=$_POST['collage_type'];//value 1 for government and 2 for private
	$chariman=$_POST['chair_name'];
	$password=$_POST['Password'];
	$re_password=$_POST['re_password'];
	$file_name=$_FILES["image"]["name"];
	$tmp_name=$_FILES["image"]["tmp_name"];
	$folder="C:/xampp/htdocs/EAD project/admin_portal/collage_images/".$new_count.".png";
	if($password!=$re_password)
	{
		  echo "<script>confirm('Password and Confirm Password Mismatch'); window.location.href='settings.php'</script>"; 
  		mysqli_close($con);
 	   	exit;
	}

	if($collage_type==1)
	{
		$collage_type="government";
		echo $collage_type;
	}
	else
	{
		$collage_type="private";
	}
	$sql="update collage_list set collage_name='$name',address='$address',phone='$contact',email='$email',collage_type='$collage_type',chair_person='$chariman',password='$password' where collage_id='$collage_id'";
	if(mysqli_query($con,$sql))
   echo "<script>confirm('updation done your collage id $collage_id'); window.location.href='settings.php'</script>";
else
{
   echo "<script>confirm('internal error retry'); window.location.href='settings.php'</script>";
    
}
mysqli_close($con);

if ($file_name!=NULL) {
		if(move_uploaded_file($tmp_name,$folder)){
	}
	else
	{
		echo "<script>confirm('due to interal error the processing takes place from first or image size will be greater upload with less KB image'); window.location.href='settings.php'</script>"; 
  		mysqli_close($con);
	}
}
 ?>