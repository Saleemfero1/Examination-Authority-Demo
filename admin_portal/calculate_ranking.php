	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	//echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);
$seat_matrix=str_replace(" ", "_", strtolower($_COOKIE['admissions']))."_seat_matrix";
//echo($seat_matrix);
//echo($selected_admission);
$year=str_replace(" ", "_", strtolower($_COOKIE['admissions']));
//echo($year);
?>

<?php

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql2="select * from $year";
	$result2=mysqli_query($con,$sql2);
	while($row=mysqli_fetch_assoc($result2))
	{
		$application_id=$row['application_id'];
		$diploma_percentage=($row['diploma_year_3_marks']/$row['diploma_3year_total_marks'])*100;
		//echo($diploma_percentage);
		$dcet_percentage=($row['ead_obtained_marks']/$row['ead_total_marks'])*100;
		//echo($dcet_percentage);
		$ranking=($diploma_percentage+$dcet_percentage)/2;
		//echo($ranking);
		//echo("  ");
		$sql3=mysqli_select_db($con,$database)or die("cannot cannot to database");
		$sql3="update $year set ead_marks='$ranking' where application_id='$application_id'";
		$result3=mysqli_query($con,$sql3);
		if (!$result3) {
			//echo "no";
			echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
		}
	}

	$sql2="select * from $year order by ead_marks desc";
	$result2=mysqli_query($con,$sql2);
	$rank=1;
	while($row=mysqli_fetch_assoc($result2))
	{
		$application_id=$row['application_id'];
		$sql3=mysqli_select_db($con,$database)or die("cannot cannot to database");
		$sql3="update $year set ranking='$rank' where application_id='$application_id'";
		$result3=mysqli_query($con,$sql3);
		if (!$result3) {
			//echo "no";
			echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
		}
		else {
			//echo("yes");
			$rank+=1;
			echo"<script>confirm('Ranking Calculated');window.location.href='admission_updates.php'</script>";
		}
	}

	mysqli_close($con);
	?>