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
$course_selected=str_replace(" ", "_", strtolower($_COOKIE['admissions']));
//echo($course_selected);
?>

<?php

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql2="select * from admissions where course='$admissions'";
					$result2=mysqli_query($con,$sql2);
					$row2=mysqli_fetch_assoc($result2);
					if(strval($row2['status'])=='closed'&&strval($row2['edit_option'])=='closed')
					{
				$sql="select * from $course_selected";
				$result=mysqli_query($con,$sql);
				if (!$result)
				 {
					//echo "no";
					echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
				}
				else{
					if ($row=mysqli_fetch_assoc($result)==NULL||$row=mysqli_fetch_assoc($result)=='NULL') {
						echo"<script>confirm('no data avaliable');window.location.href='admission_updates.php'</script>";
					}
						

						while($row=mysqli_fetch_assoc($result))
						{
							if($row['application_fee']=='NULL'||$row['application_fee']==NULL||$row['application_fee']==0)
							{
							$course=$row['application_id'];
							$sql1="delete from $course_selected where application_id='$course'";
							$result1=mysqli_query($con,$sql1);
							if(!$result1)
							{
								echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
							}
							else
							{
								echo"<script>confirm('applications altered');window.location.href='admission_updates.php'</script>";
							}
							}
						}
					}
					}
					else{
						echo"<script>confirm('applications inatake is not yet closed both status and edit options must be closed');window.location.href='admission_updates.php'</script>";
					}

				
					
?>