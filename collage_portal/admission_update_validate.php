<?php 
	session_start();
	$collage_id=strval($_SESSION['collage_id']);
	if(!isset($_SESSION['collage_id'])){
		header("location: //localhost/EAD%20project/collage_portal.php");	
	}
	//echo ($collage_id);
	$admission=$_POST['admission'];
	$application_id=$_POST['application_id'];
	$dob=$_POST['dob'];
	$rank=$_POST['rank'];
	$course=$_POST['course'];

	$check_collage_allocated=explode("_",$course);
	$check=strval($check_collage_allocated[1]);
	//echo "$check";
	//echo "$collage_id";
	//echo($check_collage_allocated[1]);
	if($check!=$collage_id)
	{
	 echo "<script>confirm('The student has not allocated this particular collage'); window.location.href='admission_update.php'</script>"; 
	}


	//echo "$application_id";
	$table=strtolower(str_replace(" ","_",$admission));
	//echo "$table";
	$database="ead_admission";
 $con=mysqli_connect("localhost","root","") or die("unable to connect host");
 $sql=mysqli_select_db($con,$database)or die("unable to connect to database");
$sql="SELECT * FROM $table where application_id='$application_id'" ;
$result=mysqli_query($con,$sql);
if(!$result)
{
	//echo "no";
	echo "<script>confirm('internal error!...  retry'); window.location.href='admission_update.php'</script>"; 
	mysqli_close($con);
}
else{
	//echo "yes";
	$array=mysqli_fetch_array($result);
	if($array['collage_admitted_status']=='admitted')
	{
		echo "<script>confirm('The student admission status is already processed'); window.location.href='admission_update.php'</script>"; 
		mysqli_close($con);
	}

	if($array['dob']==$dob && $array['ranking']==$rank && $array['dob']==$dob && $array['selected_collage']==$course)
	{
		//echo "yes";

				$sql3="update $table set collage_admitted_status='admitted' where application_id='$application_id'";
				//echo "$sql3";
				$result3=mysqli_query($con,$sql3);
				if (!$result3) {
					echo "<script>confirm('Internal Error'); window.location.href='admission_update.php'</script>"; 
					mysqli_close($con);
				}
				else{
						//echo "yes";
					echo "<script>confirm('Student Admission Succesful'); window.location.href='admission_update.php'</script>"; 
				}
	}
	else
	{
		echo "<script>confirm('The student has not allocated this particular collage or improper data'); window.location.href='admission_update.php'</script>"; 
	}
}
mysqli_close($con);
 ?>