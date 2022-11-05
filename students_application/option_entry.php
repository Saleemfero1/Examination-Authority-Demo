	<?php //accesing the setted cookie value in javascript in admission page
session_start();
$application_id=$_SESSION["application_id"];
$ranking=$_SESSION["ranking"];
//echo($ranking);
//echo($application_id);

$selected_admission=$_COOKIE['display_content'];
$table=str_replace(" ","_",strtolower($_COOKIE['display_content']));
$seat_matrix=str_replace(" ","_",strtolower($_COOKIE['display_content']))."_seat_matrix";
//echo($selected_admission);
//echo ($seat_matrix);
$to_string=strval($selected_admission);
$tolower=strtolower($to_string);
$table=str_replace(" ", "_",$tolower);
//echo($table);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}


?>
<?php
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");

			$sqla="select * from admissions where course='$selected_admission'";
			$resulta=mysqli_query($con,$sqla);
			if(! $resulta){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$arraya=mysqli_fetch_array($resulta);
				$option_entry_status=$arraya['option_entry'];
				//echo($arraya['option_entry']);
				//echo ($arraya['ongoing_option_entry']);
				$option_round=$arraya['ongoing_option_entry'];
				$result_status=$arraya['Result'];
				//echo($result_status);
			}



			//$application_id='dcet2021001';
			$application_id=strval($application_id);
			if($application_id==NULL)
			{
				echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
			}

			$sqla="select * from $table where application_id='$application_id'";
			$resulta=mysqli_query($con,$sqla);
			if(! $resulta){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$arraya=mysqli_fetch_array($resulta);
				$course=strval(strtolower($arraya['diploma_course']));
				$option_entry_value=$arraya['option_entry'];
				$selection='option_entry_'.$option_round.'_selected';
				$selection=$arraya[$selection];
				$option_entry_round_1=$arraya['option_entry_1_result'];
				$option_entry_round_2=$arraya['option_entry_2_result'];
				$option_entry_round_3=$arraya['option_entry_3_result'];
				$payment_status=$arraya['payment_status'];
				$selected_collage=$arraya['selected_collage'];
				$admission_status=$arraya['admission_status'];

				if($admission_status=='expelled')
				{
					echo"<script>confirm('You are expelled out from EAD admission for futher processes , if any issues contact E.A.D  Soon');window.location.href='http://localhost/EAD%20project/option_entry_login.php'</script>";
				}
				//echo "$admission_status";


				//echo ($selected_collage);
				//$option_entry_round_2=$arraya['option_entry_2'];
				//echo($option_entry_round_1);
				//echo($selection);

				//echo ($arraya['diploma_course']);
				//echo ($course);
				//if($arraya['application_id']==NULL)
					//echo "null";
				//else
					//echo($arraya['application_id']);
			}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/option_entry.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Option Entry</title>
</head>
<body>
	<div class="Examination_Authority">
	<div class="img1">
		<img src="images/log.png">
	</div>
	<div class="text">
		<h1>Examination Authority Demo Project</h1>
		<h2>Round : <?php echo ($option_round); ?></h2>
	</div>
	<div class="img2">
		<img src="images/logo 1.png">
	</div>
</div>
<div id="student_id">
	<p>Student id : <span><?php echo($arraya['application_id']); ?></span> <label>Rank :</label> <span><?php echo($arraya['ranking']); ?></span> </p>
</div>

	<div id="selection_tab">
		<center><button id="active" onclick="window.location.href='#'">Option Entry</button>
			<button onclick="window.location.href='http://localhost/EAD%20project/option_entry_login.php'">Log-Out</button>
		</center>
	</div>

	<div id="option">
		<form method="post" action="option_entry_validate1.php">
		<div id="option_selection">
		<!--<h1>Collage Selection</h1>-->
		<div id="heading">
			<CENTER><p>Select - Collages</p></CENTER>
		</div>

		<?php  
			$sql="SELECT * FROM $seat_matrix group by collage_id";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$array=mysqli_fetch_array($result);
				while($row=mysqli_fetch_assoc($result)){
					//echo($row['collage_id']);
					$collage=$row['collage_id'];
					//echo ($collage);
					$database2="collage_portal";
					$sql2=mysqli_select_db($con,$database2)or die("cannot cannot to database");
					$sql2="SELECT * FROM collage_list where collage_id='$collage'";
					$result2=mysqli_query($con,$sql2);
					if(!$result2){
						die("could not get data :" .mysql_error());
					}
					else
					{
						
						//echo "query passed";
						//echo ($row['collage_id']);
						$collage_view=strval($row['collage_id']);
						$array2=mysqli_fetch_array($result2);
						echo "
						<div id='collage_name'>
						<p><center><span>";
						echo($array2['collage_name']);
						echo "- ";
						echo($array2['collage_id']);
						echo" </span></center></p>
						</div>";

						echo"<div id='collages_list'>
							<center>
							<table>
							<th>Course id</th>
							<th>Course</th>
							<th>priority</th>";

						//echo($array2['collage_name']);
						$database3="ead_admission";
						//$course='au';
						$sql3=mysqli_select_db($con,$database3)or die("cannot cannot to database");
						$search_string=strtolower($to_string);
						$kcet='kcet';
						$dcet='dcet';
						if(strpos($search_string,$dcet)!==false)
						{
							if($course=='cs')
							$sql3="SELECT * FROM $seat_matrix where collage_id='$collage_view' and (course='cs' or course='ise')";
							else if($course=='ise'){
								//echo ($collage_view);
							$sql3="SELECT * FROM $seat_matrix where collage_id='$collage_view' and(course='cs' or course='ise')";
						    }
							else{
								$sql3="SELECT * FROM $seat_matrix where collage_id='$collage_view' and course='$course'";
							}
						}
						//echo($course);
		
						if(strpos($search_string,$kcet)!==false)
						{
							$sql3="SELECT * FROM $seat_matrix where collage_id='$collage_view'";
						}
						$result3=mysqli_query($con,$sql3);
						if(!$result3){
							die("could not get data :" .mysql_error());
						}
						else
						{
							//echo "query passed";
							if(strpos($search_string,$dcet)!==false)
						{

								$array3=mysqli_fetch_array($result3);
									if($array3['course']!=NULL)
									{
										//echo ($array3['course']);
										echo"
								<tr>
								<CENTER>
									<td><center>";
									echo($array3['collage_id_and_total_seats']);
									echo"</center></td>
									<td><center>";
									echo($array3['course']);
									echo"</center></td>
									<td><center><input type='number' name='";
									echo($array3['collage_id_and_total_seats']);
									echo"' placeholder='priority'></center></td>
								</CENTER>
								</tr>";
									}
									else{
										echo " ";
									}

								while($row3=mysqli_fetch_assoc($result3)){
								//if($row3['course']==$course){

									echo"
								<tr>
								<CENTER>
									<td><center>";
									echo($row3['collage_id_and_total_seats']);
									echo"</center></td>
									<td><center>";
									echo($row3['course']);
									echo"</center></td>
									<td><center><input type='number' name='";
									echo($row3['collage_id_and_total_seats']);
									echo"' placeholder='priority'></center></td>
								</CENTER>
								</tr>";
								//}
								
							}
						}
						
						}

						if(strpos($search_string,$kcet)!==false)
						{
								$array3=mysqli_fetch_array($result3);
				
										echo"
								<tr>
								<CENTER>
									<td><center>";
									echo($array3['collage_id_and_total_seats']);
									echo"</center></td>
									<td><center>";
									echo($array3['course']);
									echo"</center></td>
									<td><center><input type='number' name='";
									echo($array3['collage_id_and_total_seats']);
									echo"' placeholder='priority'></center></td>
								</CENTER>
								</tr>";
							
								while($row3=mysqli_fetch_assoc($result3)){
								//if($row3['course']==$course){

									echo"
								<tr>
								<CENTER>
									<td><center>";
									echo($row3['collage_id_and_total_seats']);
									echo"</center></td>
									<td><center>";
									echo($row3['course']);
									echo"</center></td>
									<td><center><input type='number' name='";
									echo($row3['collage_id_and_total_seats']);
									echo"' placeholder='priority'></center></td>
								</CENTER>
								</tr>";
								//}
								
							}
						}
					
					

						echo "</table>
							</center>
							</div>"	;

					}
				}
				//echo "query passed";
			}

		?>

		<!--<div id="collage_name">
			<p><center><span>University of visvesvaraiya collage of engineering - E001 </span></center></p>
		</div>

		<div id="collages_list">
			<center>
				<table>
					<th>Course id</th>
					<th>Course</th>
					<th>priority</th>
				<tr>
					<CENTER>
						<td>Collage id</td>
				<td>CSE</td>
				<td><input type="number" name="collage_id" placeholder="priority"></td>
					</CENTER>
				</tr>
			</table>
			</center>
		</div>-->
	</div>
	<?php 
	if($option_entry_status=='open')
	{
		echo'<input type="submit" name="">';
	}
	else
		echo "<p id='option_entry'>option entry closed</p>";
	?>

	</form>
	</div>

	<div id="selected">
		<div id="heading">
			<CENTER><p>Selected - Collages</p></CENTER>
		</div>

		<div id="collages_list">
			<center>
				<table>
					<th>Course id</th>
					<th>Course</th>
					<th>priority</th>
					<?php
					$options=explode(" ",$option_entry_value);
					$i=0;
					while($options[$i]!=NULL)
					{
						echo('<tr><center><td><center>');
						echo($options[$i]);
						echo('</center></td>');
						$course_selected=explode("_",$options[$i]);
						echo('<td><center>');
						echo($course_selected[0]);
						echo('</center></td>');
						echo('<td><center>');
						echo($i+1);
						echo('</center></td>');
						$i++;
					}
					?>

			<!--	<tr>
					<CENTER>
						<td><center>Collage id</center></td>
				<td><center>CSE</center></td>
				<td><center>1</center></td>
					</CENTER>
				</tr>-->
			</table>
			</center>
		</div>

	</div>



	<?php

	if($option_entry_status=='closed' && $result_status=='open')
	{
		 echo"
	<div id='Collage_allocated'>
		<div id='heading'>
			<CENTER><p>Option Opted</p></CENTER>
		</div>";
		

		
		 if($option_entry_status=='closed' && $result_status=='open' && $selection==NULL)
		 {
		 	//echo($option_round);
		 	echo "<div id='option_select'>
			<p><center>Round <?php echo($option_round); ?> option Opting</center></p>
		</div>";

		echo "<div id='options'>";
		echo "<form method='post' action='option_opted.php'>
							<input type='radio' name='option' onclick='alert_option1()' value='option_1' ><span> Option - 1 : I am admitting in allocated Collage and ready to exit form EAD admissions.</span><br>
						 <input type='radio' name='option' onclick='alert_option2()' value='option_2'><span> Option - 2 :I am Willing to attend the next round.</span><br>
						 <input type='radio' name='option' onclick='alert_func()' value='option_3'><span> Option - 3 : I am Quiting from EAD Admissions.</span>
						 <br>
						 <center><input type='submit' name='' value='Submit'></center>
						</form>";
		echo "</div>";
		echo"</div>";

		 }

		 elseif($option_entry_status=='closed' && $result_status=='open' && $selection!=NULL)
		 {
		 	echo "<div id='options'>";
		 	echo"<center><h1>Opted $selection already</h1></center>";
		 	echo "</div>";
		 	echo"</div>";
		 }
		 else{}
	}
		?>
		<script type="text/javascript">

			function alert_option1()
			{
				alert("your are selecting option 1 confirm & submit, next do payment if payment is not made than your seat will be cancelled and you cannot even participate in next rounds");
			}

			function alert_option2()
			{
				alert("your are selecting option 2 confirm & submit, next do payment to participate in next rounds if payment is not made than you cannot participate in next rounds");
			}

			function alert_func()
			{
				alert("your are selecting option 3 so you will be expelled directly from EAD you cannot participate in next round");
			}
		</script>

		<!--<form method="post" action="option_opted.php">
							<input type="radio" name="option" value="option_1" ><span> Option - 1 : I am admitting in allocated Collage and ready to exit form EAD admissions.</span><br>
						 <input type="radio" name="option" value="option_2"><span> Option - 2 :I am Willing to attend the next round.</span><br>
						 <input type="radio" name="option" value="option_3"><span> Option - 3 : I am Quiting from EAD Admissions.</span>
						 <br>
						 <center><input type="submit" name="" value="Submit"></center>
						</form>-->
						<!--<center><h1>Opted option 1 already</h1></center>-->

<?php
	if($option_entry_status=='closed' && $result_status=='open')
	{
		echo "<div id='allocated_collage'>
		<div id='heading'>
			<CENTER><p>Allocated Collage</p></CENTER>
		</div>
		<div id='option_select'>
			<p><center>Select Collage Id for Payment</center></p>
		</div>
		<div id='options'>
		
		<form method='post' action='admission_payment.php'>";
			//$option_entry_round_1=$arraya['option_entry_1_result'];
				//$option_entry_round_2=$arraya['option_entry_2_result'];
				//$option_entry_round_3=$arraya['option_entry_3_result'];

		if($option_entry_round_1!=NULL){
		echo "<input type='radio' name='collage_select' required value='";
		echo"$option_entry_round_1";
		echo"'><span>";
		echo "$option_entry_round_1";
		echo"</span>";
		}

		if($option_entry_round_2!=NULL){
		echo "<input type='radio' name='collage_select' required value='";
		echo"$option_entry_round_2";
		echo"'><span>";
		echo "$option_entry_round_2";
		echo"</span>";
		}

		if($option_entry_round_3!=NULL){
		echo "<input type='radio' name='collage_select' required value='";
		echo"$option_entry_round_3";
		echo"'><span>";
		echo "$option_entry_round_3";
		echo"</span>";
		}

       //echo ($selection);
		if($selection!=NULL)
		{
			if($selected_collage==NULL && $payment_status=='done')
			{
				echo "<center><input type='submit' name='' value='Opt Collage'></center>";
			}


			if($payment_status=="done"){
				if($selected_collage!=NULL){
				echo"<CENTER>
							<p>Opted Collage is $selected_collage <br> Payment Already Made </p>
							<a href='http://localhost/EAD%20project/students_application/admission_order.php'>Print Admission Order</a>
						</CENTER>
						</form>
				</div>
				</div>";}
				else{
					{
				echo"<CENTER>
							<p>Payment Already Made </p>
						</CENTER>
						</form>
				</div>
				</div>";}
				}
				}
				
			else{
				echo "<center><input type='submit' name='' value='Payment'></center>
			</form>
		</div>
		</div>";
			

			}
		}
		else
		{
			echo "<CENTER>
							<p>Opt an Option for payment and admission order download Options</p>
						</CENTER>
						</form>
				</div>
				</div>";
		}
	}

?>


<!--	<div id="allocated_collage">
		<div id='heading'>
			<CENTER><p>Allocated Collage</p></CENTER>
		</div>
		<div id='option_select'>
			<p><center>Select Collage Id for Payment</center></p>
		</div>
		<div id='options'>
		
		<form method="post" action="payment.php">
						 <input type="radio" name="collage_select" value="option_2"><span> Cs_1</span>
						 <input type="radio" name="collage_select" value="option_2"><span> Cs_1</span>
						 <input type="radio" name="collage_select" value="option_2"><span> Cs_1</span>
						<center><input type="submit" name="" value="Payment"></center>
						<CENTER>
							<p>Opt an Option for payment and admission order download Options</p>
						</CENTER>

						</form>
		</div>

	</div>-->

<?php

// the code for selected course to view

//echo($option_entry_value);
//$options=explode(" ",$option_entry_value);
//echo($options[9]);
//$check=$options[9];
//if($options[7]==NULL)
//{
//	echo('nukk');
//}
//else
//echo($options[7]);

//$i=0;
//$flag=1;
//while($options[$i]!=NULL)
//{
	//echo($options[$i]);
	//$course_selected=explode("_",$options[$i]);
	//echo($course_selected[0]);
	//$i++;
//	echo('null');
//}


?>

</body>
</html>