<?php 
$database="collage_portal";
 $con=mysqli_connect("localhost","root","") or die("unable to connect host");
 $sql=mysqli_select_db($con,$database)or die("unable to connect to database");
$sql="SELECT * FROM collage_count";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	$count=$array['count'];
	$new_count=$count+1;
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
	$folder="collage_images/".$new_count.".png";
	if($password!=$re_password)
	{
		  echo "<script>confirm('Password and Confirm Password Mismatch'); window.location.href='new_collage_form.php'</script>"; 
  		mysqli_close($con);
 	   	exit;
	}

	$sql="update collage_count set count=$new_count where count=$count";
	if(mysqli_query($con,$sql))
	{
	}

	if($collage_type==1)
	{
		$collage_type="government";
	}
	else
	{
		$collage_type="private";
	}
	$collage_id="E0".$new_count;
	$sql="INSERT INTO collage_list values('$collage_id','$name','$address','$contact','$email','$collage_type','$chariman','$password',$new_count)";
	if(mysqli_query($con,$sql)){

   echo "<script>confirm('Collage Allocatement done your collage id $collage_id'); window.location.href='collage_portal.php'</script>";
   		//$sql="INSERT INTO diploma_courses (collage_id) values('$collage_id')";
		//mysqli_query($con,$sql);
		//$sql="INSERT INTO pg_mba_course_list (collage_id) values('$collage_id')";
		//mysqli_query($con,$sql);
		//$sql="INSERT INTO pg_mca_course_list (collage_id) values('$collage_id')";
		//mysqli_query($con,$sql);
		//$sql="INSERT INTO pg_mtech_course_list (collage_id) values('$collage_id')";
		//mysqli_query($con,$sql);
}
else
{
   echo "<script>confirm('internal error retry'); window.location.href='new_collage_form.php'</script>";
    
}
mysqli_close($con);

	if(move_uploaded_file($tmp_name,$folder)){


	}
	else
	{
		echo "<script>confirm('due to interal error the processing takes place from first or image size will be greater upload with less KB image'); window.location.href='new_collage_form.php'</script>"; 
  		mysqli_close($con);
	}
 ?>