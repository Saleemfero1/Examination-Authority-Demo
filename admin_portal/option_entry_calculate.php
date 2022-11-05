<?php //accesing the setted cookie value in javascript in admission page

$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);

$table=str_replace(" ","_",strtolower($admissions));
$seat_matrix=$table.'_seat_matrix';
//echo($table);
//echo($seat_matrix);
//echo($selected_admission);
	
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");

			$sql= "SELECT * from admissions where course='$admissions'";
			$result=mysqli_query($con,$sql);
			if(!$result)
			{
				//echo "error";
				//echo"<script>confirm('invalid user');window.location.href='option_entry_login.php'</script>";
		
			}
			else
			{
					$row=mysqli_fetch_assoc($result);
					$option_round=$row['ongoing_option_entry'];
					//echo($row['option_entry']);
					if($row['option_entry']=='closed'){
						//echo "closed";
						$sql1= "SELECT * from $table";
						$result1=mysqli_query($con,$sql1);
						if(!$result1)
						{
							echo "error";
						}
						else
						{
							//echo "success";
							$row1=mysqli_fetch_assoc($result1);
							//echo($row1['application_id']);

							while($array1=mysqli_fetch_assoc($result1))
							{

								if($array1['admission_status']=='expelled')
								continue;


								//echo($array1['application_id']);
								$application_id=$array1['application_id'];
								$option_selected=$array1['option_entry'];
								$caste=$array1['caste'];
								$selection='option_entry_'.$option_round.'_result';
								$column='option_entry_'.$option_round;
								if ($row[$column]=='allocated') {
									//echo"<script>confirm(The allocatement has been already made');window.location=history.back()</script>";	
									echo"<script>confirm('The allocatement has been already made');window.location.href='admission_updates.php'</script>";
										mysqli_close($con);
								}
							//	echo($caste);
								//echo($option_selected);
								$option_array=explode(" ",$option_selected);
								$i=0;
								while ($option_array[$i]!=NULL) {
									//echo($option_array[$i]);
									$course_search=$option_array[$i];
									$sql2= "SELECT * from $seat_matrix where collage_id_and_total_seats='$course_search'";
									$result2=mysqli_query($con,$sql2);
									if(!$result2)
									{
										echo "error";
									}
									else
									{
										//echo "selected";
										//echo($caste);
										$row2=mysqli_fetch_assoc($result2);
										//echo($row2['collage_id_and_total_seats']);
										$general=$row2['general'];
										$category=$row2[$caste];
										//echo($category);
										//echo($row2['']);
										$collage=$row2['collage_id_and_total_seats'];
										//if($)
										//function f($value)
										//{
										//	echo($value);
										//	echo "hai";
										//}

										if($category>0 && $category!='general'){
											if($category>0)
											{
												//echo($caste);
											//echo($collage);
											$category=$category-1;
											$sql3= "update $seat_matrix set $caste='$category' where collage_id_and_total_seats='$collage'";
											$result3=mysqli_query($con,$sql3);
											if(!$result3){
												//echo('no');
											}
											else{
												//echo "yes";
												$sql4= "update $table set $selection='$collage' where application_id='$application_id'";
												//echo($sql3);
												 $result4=mysqli_query($con,$sql4);
													if(!$result4){
														echo('no');
													}
													else{
														echo "yes";
													}
											}

											//$sql4= "update $table set $caste='$category' where collage_id_and_total_seats='$collage'";
											//echo($sql3);

											//echo'high';
										//	echo($category);
											//$category=$category-1;
											//echo " after ";
											//echo($category);
											break;
											}
											elseif($general>0){
												//echo($caste);
												//echo($collage);
											$general=$general-1;
											$sql3= "update $seat_matrix set general='$general' where collage_id_and_total_seats='$collage'";
											$result3=mysqli_query($con,$sql3);
											if(!$result3){
												//echo('no');
											}
											else{
												//echo "yes";
												$sql4= "update $table set $selection='$collage' where application_id='$application_id'";
												//echo($sql3);
												 $result4=mysqli_query($con,$sql4);
													if(!$result4){
														//echo('no');
													}
													else{
													//	echo "yes";
													}
											}


											//echo($sql3);
											//echo('low');
											
											//	echo('general');
											//	echo($general);
											//$general=$general-1;
											//echo " after ";
											//echo($general);
											break;
											}
										}
										else{
											if($general>0){
												//echo($caste);
												//echo($collage);
											$general=$general-1;
											$sql3= "update $seat_matrix set general='$general' where collage_id_and_total_seats='$collage'";
											$result3=mysqli_query($con,$sql3);
											if(!$result3){
												//echo('no');
											}
											else{
												//echo "yes";
												$sql4= "update $table set $selection='$collage' where application_id='$application_id'";
												//echo($sql3);
												 $result4=mysqli_query($con,$sql4);
													if(!$result4){
														//echo('no');
													}
													else{
														//echo "yes";
													}
											}


											//echo($sql3);
											//echo('low');
											
											//	echo('general');
											//	echo($general);
											//$general=$general-1;
											//echo " after ";
											//echo($general);
											break;
											}
										}
									}


									$i++;

								}
							}

						}

					}
					else{
						echo "error";
						echo"<script>confirm('option entry is still open or not yet started');window.location=history.back()</script>";	
						mysqli_close($con);
					}

			}
			$sql5= "update admissions set $column='allocated' where course='$admissions'";
			$result5=mysqli_query($con,$sql5);
			if(!$result5)
			{
				//echo "error";
				//echo"<script>confirm('invalid user');window.location.href='option_entry_login.php'</script>";
		
			}
			else
			{
			echo"<script>confirm('completed');window.location.href='admission_updates.php'</script>";	
			}





?>