	<?php //accesing the setted cookie value in javascript in admission page
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
			$application_id='dcet2021001';
			$application_id=strval($application_id);
			$sqla="select * from $table where application_id='$application_id'";
			$resulta=mysqli_query($con,$sqla);
			if(! $resulta){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$arraya=mysqli_fetch_array($resulta);
				$course=strval(strtolower($arraya['diploma_course']));
				//echo ($arraya['diploma_course']);
				//echo ($course);
				//if($arraya['application_id']==NULL)
				//	echo "null";
				//else
				//	echo($arraya['application_id']);
			}
?>
























<?php
$search_string=strtolower($to_string);
						$kcet='kcet';
						$dcet='dcet';
						if(strpos($search_string,$dcet)!==false)
						{
							if($course=='cs')
							$sql="SELECT * FROM $seat_matrix where course='cs' or course='ise' order by collage_id";
							else
								$sql="SELECT * FROM $seat_matrix where  course='$course' order by collage_id";
						}
		
						if(strpos($search_string,$kcet)!==false)
						{
							$sql="SELECT * FROM $seat_matrix order by collage_id";
						}
//echo($sql);
//$sql="SELECT * FROM $seat_matrix";
			$result=mysqli_query($con,$sql);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			else
			{
				$array=mysqli_fetch_array($result);
				$rows=mysqli_num_rows($result);
					//echo ($rows);
				$collage_array[$rows]=0;
				$i=1;
				//$first_value=$array['collage_id_and_total_seats'];
				//$collage_array[0]=$first_value;
				//echo($collage_array[0]);
				$order_of_collage[$rows]=0;
					//echo ($collage_array[0]);
				while($row=mysqli_fetch_assoc($result))
				{
					$collage_array[$i]=$row['collage_id_and_total_seats'];
					if ($_POST[$collage_array[$i]]!=NULL)
					 {
					 	$value=$_POST[$collage_array[$i]];
					 	if($value <1 || $value>$rows){
					 		echo('priority '.$value .' for collage '.$collage_array[$i].' is out of range means the value is not suitable');
					 		mysqli_close($con);
							//echo "out of range";
							//echo "//";
						}
						//echo "--------------";
						//echo ($value);
						//echo "--------------";
						
						$order_of_collage[$value]=$collage_array[$i];
						//echo($order_of_collage[$value]);
					}
					$i++;
					

					



				}







				// the below for loop is to see the values of the seat matrix values
				
			//	for ($i=1; $i<$rows ; $i++) { 
					# code...
					//echo($order_of_collage[$i]);
					//echo "-------------- ";
			//		if($order_of_collage[$i]==NUll)
			//			echo "null";
			//	}

				if($order_of_collage!=NULL){
				echo"<script>confirm('No valid priority has been given ');window.location.href='http://localhost/EAD%20project/students_application/option_entry.php";
				mysqli_close($con);
			}

				$option_entry=NULL;
				//if($option_entry==null)
					//echo "null";
				$i=1;
				while($i<=$rows)
				{
					if($order_of_collage[$i]!=NUll)
					{
						if ($option_entry==NULL) {
							$option_entry=$order_of_collage[$i].' ';
						}
						else
							$option_entry=$option_entry.$order_of_collage[$i].' ';
					}
					$i++;
				}
			
					//$cs=$_POST['cs_2'];
					//echo($cs);
			}


//$abc='abc';
//$xyz='ise_2';
//$abc=$_POST[$xyz];
//echo ($abc);

//echo($option_entry);
			//echo $table;
			if($option_entry==NULL){
				echo"<script>confirm('No valid priority has been given ');window.location.href='http://localhost/EAD%20project/students_application/option_entry.php";
				mysqli_close($con);
			}

$data_base='ead_admission';
$sql5=mysqli_select_db($con,$database)or die("cannot cannot to database");
$sql5="update $table set option_entry='$option_entry' where application_id='$application_id'";

$result=mysqli_query($con,$sql5);
			if(! $result){
				die("could not get data :" .mysql_error());
			}
			else
			{
				echo "updated";
			}

?>


