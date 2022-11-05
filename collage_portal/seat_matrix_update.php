<?php 
	session_start();
	$collage_id=$_SESSION['collage_id'];
$database="ead_admission";
 $con=mysqli_connect("localhost","root","") or die("unable to connect host");
 $sql=mysqli_select_db($con,$database)or die("unable to connect to database");
	$seat_matrix=$_POST['seat_matrix'];
	//echo($seat_matrix);
	$course_id=$_POST['course_id'];
	$total_seats=$_POST['total_seats'];
	$general=$_POST['general'];
	$_2A=$_POST['2A'];
	//echo($_2A);
	$_2B=$_POST['2B'];
	$_3A=$_POST['3A'];
	$_3B=$_POST['3B'];
	$SC=$_POST['SC'];
	$ST=$_POST['ST'];
	$SNQ=$_POST['SNQ'];
	$HYK=$_POST['HYK'];
	if($total_seats==NULL||$total_seats=='NULL') $total_seats=0;
	if($general==NULL||$general=='NULL') $general=0;
	if($_2A==NULL||$_2A=='NULL') $_2A=0;
	if($_2B==NULL||$_2B=='NULL') $_2B=0;
	if($_3A==NULL||$_3A=='NULL') $_3A=0;
	if($_3B==NULL||$_3B=='NULL') $_3B=0;
	if($SC==NULL||$SC=='NULL') $SC=0;
	if($ST==NULL||$ST=='NULL') $ST=0;
	if($SNQ==NULL||$SNQ=='NULL') $SNQ=0;
	if($HYK==NULL||$HYK=='NULL') $HYK=0;
	$sum=0;
	$sum=$general+$_2A+$_2B+$_3A+$_3B+$SC+$ST+$SNQ+$HYK;
	//echo($sum);
	if($sum==$total_seats)
	{
		$sql="update $seat_matrix set general='$general',2A='$_2A',2B='$_2B',3A='$_3A',3B='$_3B',SC='$SC',ST='$ST',SNQ='$SNQ',HYK='$HYK',collage_submission_status='submitted' where collage_id_and_total_seats='$course_id'";
		if(!mysqli_query($con,$sql))
  			echo "<script>confirm('internal error retry'); window.location.href='updates.php'</script>";
		else
		{
			 echo "<script>confirm('Seat matrix updated for $seat_matrix of $course_id'); window.location.href='updates.php'</script>";
		   
		}
	}
	else
	{
		 echo "<script>confirm('the Total seats did not match with the seat matrix'); window.location.href='updates.php'</script>";
	}

	
mysqli_close($con);
?>