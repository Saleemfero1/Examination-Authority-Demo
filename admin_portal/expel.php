	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);
//echo($selected_admission);
$table=strtolower(str_replace(" ","_",$admissions));
$seat_matrix=strtolower(str_replace(" ","_",$admissions)).'_seat_matrix';
//echo "$table";

?>

<?php

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql="SELECT * FROM admissions where course='$admissions'";
	$result=mysqli_query($con,$sql);
	if (!$result) {
		echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
		mysqli_close($con);
		//echo "no";
	}
	else{
		//echo "yes";
	$array=mysqli_fetch_array($result);
	$on_going_option_entry=$array['ongoing_option_entry'];
	$expell='expell_round_'.$on_going_option_entry;
	//echo "$on_going_option_entry";
	//echo "$expell";
	$option_entry='option_entry_'.$on_going_option_entry.'_selected';
	$entry='option_entry_'.$on_going_option_entry;
	//echo($array['option_entry']);
	//echo "$option_entry";
	if($array[$expell]=='expelled')
	{
		echo "<script>confirm('already expelled '); window.location.href='admission_updates.php'</script>"; 
		mysqli_close($con);
	}




if($array['option_entry']=='closed')
{
	$sql2="SELECT * FROM $table";
	$result2=mysqli_query($con,$sql2);
	if (!$result2) {
		echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
		mysqli_close($con);
		//echo "no";
	}
	else{
		while($row2=mysqli_fetch_assoc($result2))
		{
			$application_id=$row2['application_id'];
			//echo($row2[$option_entry]);


			if($row2[$option_entry]=='option_1'||$row2[$option_entry]=='option_3')
			{
				//echo "in";
				$sql3="update $table set admission_status='expelled' where application_id='$application_id'";
				//echo "$sql3";
				$result3=mysqli_query($con,$sql3);
				if (!$result3) {
					mysqli_close($con);
					echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
				}
				else{
					//echo "yes";
					$selection=0;
					for($i=1;$i<=$on_going_option_entry;$i++)
					{	
						$option_entry2='option_entry_'.$i.'_selected';
						$seat='option_entry_'.$i.'_result';
						$selected_collage=$row2['selected_collage'];

						$sql5="SELECT * FROM $seat_matrix where collage_id_and_total_seats='$selected_collage' ";
		$result5=mysqli_query($con,$sql5);
						if (!$result5) {
							echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
							mysqli_close($con);
		//echo "no";
	}
	else{
		//echo "yes";
	$array5=mysqli_fetch_array($result5);
}



						if($row2[$option_entry2]=='option_1'){
							//echo "yes";
							if(($row2['selected_collage']==$row2[$seat])&&$selection==0)
							{
								$selection++;
								echo "   ";
								//echo($row2['application_id']);
								echo "   ";
								//echo "no";
								if($row2['collage_admitted_status']!='admitted')
								{
									$seat=$array5['general']+1;
								echo($seat);
								$sql4="update $seat_matrix set general='$seat' where collage_id_and_total_seats='$selected_collage'";
								//echo "$sql3";
								$result4=mysqli_query($con,$sql4);
								if (!$result4) {
									echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
									mysqli_close($con);
								}
								else{
									echo "yes";
								}
								}
							}
							else{
								//echo ($selected_collage);
								//echo($array5['general']);
								$seat=$array5['general']+1;
								echo($seat);
								$sql4="update $seat_matrix set general='$seat' where collage_id_and_total_seats='$selected_collage'";
								//echo "$sql3";
								$result4=mysqli_query($con,$sql4);
								if (!$result4) {
									echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
									mysqli_close($con);
								}
								else{
									echo "yes";
								}
				
							}
						}
						else{
							//echo "no";
						}
						if($row2[$option_entry2]=='option_3')
						{
							$seat=$array5['general']+1;
								echo($seat);
								$sql4="update $seat_matrix set general='$seat' where collage_id_and_total_seats='$selected_collage'";
								//echo "$sql3";
								$result4=mysqli_query($con,$sql4);
								if (!$result4) {
									echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
									mysqli_close($con);
								}
								else{
									echo "yes";
								}
						}


						if($row2[$option_entry2]=='option_2')
						{
								$sql8="update $table set selected_collage='' where application_id='$application_id'";
								//echo "$sql3";
								$result8=mysqli_query($con,$sql8);
								if (!$result8) {
									echo "<script>confirm('Internal Error '); window.location.href='admission_updates.php'</script>"; 
									mysqli_close($con);
								}
								else{
									echo "yes";
								}
						}
						//if($option_entry2=='option_3'){
							//echo "yes";
						//}
						//else
						//{
							//echo "no";
							//echo($row2[$option_entry2]);

						//}

					}

				}
			}
		}
	}

}
				 }
				 $sql7="update admissions set $expell='expelled' where course='$admissions'";
					$result7=mysqli_query($con,$sql7);
				echo "<script>confirm('Updated Database '); window.location.href='admission_updates.php'</script>"; 
				mysqli_close($con);
?>