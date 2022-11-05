	<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
if($selected_admission==NULL||$selected_admission=='NULL')
{
	echo "<script>confirm('due to interal error the page redirecting to another page'); window.location.href='admission.php'</script>"; 
}
$admissions=strtoupper($_COOKIE['admissions']);
//echo($admissions);
$seat_matrix=str_replace(" ", "_", strtolower($_COOKIE['admissions']))."_seat_matrix";
echo($seat_matrix);
//echo($selected_admission);
?>

<?php

	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admission";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$to_string=strval($selected_admission);
	$search_string=strtolower($to_string);
		$kcet='kcet';
		$dcet='dcet';
		$pgcet='pgcet';
		$diploma='diploma';
		//the below function will be used for pgcet
		if(strpos($search_string,$pgcet)!==false)
			{
				echo "pgcet";
				echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
			}

		if(strpos($search_string,$diploma)!==false)
			{
				echo "diploma";
				echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
			}

		if(strpos($search_string,$dcet)!==false)
			{
				//echo "kcet.php";
				$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
				$sql="create table $seat_matrix (collage_id varchar(30),course varchar(10),collage_id_and_total_seats varchar(50)primary key,total_seats int(50),general int(30),2A int(30),2B int(30),3A int(30),3B int(30),SC int(30),ST int(30),SNQ int(30),HYK int(30),collage_submission_status varchar(30))";
				$result=mysqli_query($con,$sql);
				if (!$result) {
					//echo "no";
					echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
				}
				else{
					echo "yes";
					$database1='collage_portal';
					$sql2=$sql=mysqli_select_db($con,$database1)or die("cannot cannot to database");
					$sql2="select * from ug_course_list";
					$result1=mysqli_query($con,$sql2);
					if (!$result1) {
					echo "no collage database";
					}
					else{
						echo "yes collage database";
						while($row1=mysqli_fetch_assoc($result1))
						{
							$collage_id1=$row1['collage_id'];
							$database3='ead_admission';
							$sql3=mysqli_select_db($con,$database3)or die("cannot cannot to database");
							$collage_id_is=strval($row1['collage_id']);
							$csbranch=0;
							if($row1['cs']!=NULL && $row1['cs']!='NULL' && $row1['cs']!=0)
							{
							$cs="cs_";
							//$csbranch=$collage_id_is.$cs;
							$csbranch=$cs.$collage_id_is;
							$total_seats=$row1['cs'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','cs','$csbranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$mebranch=0;
							if($row1['me']!=NULL && $row1['me']!='NULL' && $row1['me']!=0)
							{
							$me="me_";
							//$mebranch=$collage_id_is.$me;
							$mebranch=$me.$collage_id_is;
							$total_seats=$row1['me'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','me',$mebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$cebranch=0;
							if($row1['ce']!=NULL && $row1['ce']!='NULL' && $row1['ce']!=0)
							{
							$ce="ce_";
							//$cebranch=$collage_id_is.$ce;
							$cebranch=$ce.$collage_id_is;
							$total_seats=$row1['ce'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','ce','$cebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['eee']!=NULL && $row1['eee']!='NULL' && $row1['eee']!=0)
							{
							$eee="eee_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['eee'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','eee','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								// "inserted";
							}
							}
							$eeebranch=0;
							if($row1['ec']!=NULL && $row1['ec']!='NULL' && $row1['ec']!=0)
							{
							$eee="ec_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['ec'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','ce','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['tx']!=NULL && $row1['tx']!='NULL' && $row1['tx']!=0)
							{
							$eee="tx_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['tx'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','tx','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['au']!=NULL && $row1['au']!='NULL' && $row1['au']!=0)
							{
							$eee="au_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['au'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','au','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['mt']!=NULL && $row1['mt']!='NULL' && $row1['mt']!=0)
							{
							$eee="mt_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['mt'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','mt','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}

							$eeebranch=0;
							if($row1['rb']!=NULL && $row1['rb']!='NULL' && $row1['rb']!=0)
							{
							$eee="rb_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['rb'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','rb','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}

							$eeebranch=0;
							if($row1['ise']!=NULL && $row1['ise']!='NULL' && $row1['ise']!=0)
							{
							$eee="ise_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['ise'];
							$total_seats=round($total_seats/10);
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','ise','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}


						/*$mebranch=0;
						if($row1['me']!=NULL&&$row1['me']!='NULL' && $row1['me']!=0)
						{
							$mebranch=$collage_id."_me";
						}
						$cebranch=0;
						if($row1['ce']!=NULL&&$row1['ce']!='NULL' && $row1['ce']!=0)
						{
							$cebranch=$collage_id."_ce";
						}
						$eeebranch=0;
						if($row1['eee']!=NULL&&$row1['eee']!='NULL' && $row1['eee']!=0)
						{
							$eeebranch=$collage_id."_eee";
						}
						$ecbranch=0;
						if($row1['ec']!=NULL&&$row1['ec']!='NULL' && $row1['ec']!=0)
						{
							$ecbranch=$collage_id."_ec";
						}
						$txbranch=0;
						if($row1['tx']!=NULL&&$row1['tx']!='NULL' && $row1['tx']!=0)
						{
							$txbranch=$collage_id."_tx";
						}
						$aubranch=0;
						if($row1['au']!=NULL&&$row1['au']!='NULL' && $row1['au']!=0)
						{
							$aubranch=$collage_id."_au";
						}
						$mtbranch=0;
						if($row1['mt']!=NULL&&$row1['mt']!='NULL' && $row1['mt']!=0)
						{
							$mtbranch=$collage_id."_mt";
						}
						$rbbranch=0;
						if($row1['rb']!=NULL&&$row1['rb']!='NULL' && $row1['rb']!=0)
						{
							$rbbranch=$collage_id."_rb";
						}
						$isebranch=0;
						if($row1['ise']!=NULL&&$row1['ise']!='NULL' && $row1['ise']!=0)
						{
							$isebranch=$collage_id."_cs";
						}*/
						
					}
					$database5='ead_admission';
					$row_match=strval($_COOKIE['admissions']);
					$sq4=mysqli_select_db($con,$database5)or die("cannot cannot to database");
					$sql4="update admissions set seat_matrix='created' where course='$row_match'";
					$result5=mysqli_query($con,$sql4);
							if(!$result5){
								echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
							}
							else{
								//echo "created";
								echo"<script>confirm('seat matrix created');window.location.href='admission_updates.php'</script>";
							}
				}
			}
		}
		
		if(strpos($search_string,$kcet)!==false)
			{
				//echo "kcet.php";
				$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
				$sql="create table $seat_matrix (collage_id varchar(30),course varchar(30),collage_id_and_total_seats varchar(50)primary key,total_seats int(50),general int(30),2A int(30),2B int(30),3A int(30),3B int(30),SC int(30),ST int(30),SNQ int(30),HYK int(30),collage_submission_status varchar(30))";
				$result=mysqli_query($con,$sql);
				if (!$result) {
					//echo "no";
					echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
				}
				else{
					echo "yes";
					$database1='collage_portal';
					$sql2=$sql=mysqli_select_db($con,$database1)or die("cannot cannot to database");
					$sql2="select * from ug_course_list";
					$result1=mysqli_query($con,$sql2);
					if (!$result1) {
					echo "no collage database";
					}
					else{
						echo "yes collage database";
						while($row1=mysqli_fetch_assoc($result1))
						{
							$collage_id1=$row1['collage_id'];
							$database3='ead_admission';
							$sql3=mysqli_select_db($con,$database3)or die("cannot cannot to database");
							$collage_id_is=strval($row1['collage_id']);
							$csbranch=0;
							if($row1['cs']!=NULL && $row1['cs']!='NULL' && $row1['cs']!=0)
							{
							$cs="cs_";
							//$csbranch=$collage_id_is.$cs;
							$csbranch=$cs.$collage_id_is;
							$total_seats=$row1['cs'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','cs',$csbranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$mebranch=0;
							if($row1['me']!=NULL && $row1['me']!='NULL' && $row1['me']!=0)
							{
							$me="me_";
							//$mebranch=$collage_id_is.$me;
							$mebranch=$me.$collage_id_is;
							$total_seats=$row1['me'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','me','$mebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$cebranch=0;
							if($row1['ce']!=NULL && $row1['ce']!='NULL' && $row1['ce']!=0)
							{
							$ce="ce_";
							//$cebranch=$collage_id_is.$ce;
							$cebranch=$ce.$collage_id_is;
							$total_seats=$row1['ce'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','ce','$cebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['eee']!=NULL && $row1['eee']!='NULL' && $row1['eee']!=0)
							{
							$eee="eee_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['eee'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','eee','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								// "inserted";
							}
							}
							$eeebranch=0;
							if($row1['ec']!=NULL && $row1['ec']!='NULL' && $row1['ec']!=0)
							{
							$eee="ec_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['ec'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','ec','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['tx']!=NULL && $row1['tx']!='NULL' && $row1['tx']!=0)
							{
							$eee="tx_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['tx'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','tx','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['au']!=NULL && $row1['au']!='NULL' && $row1['au']!=0)
							{
							$eee="au_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['au'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','au','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}
							$eeebranch=0;
							if($row1['mt']!=NULL && $row1['mt']!='NULL' && $row1['mt']!=0)
							{
							$eee="mt_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['mt'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','mt','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}

							$eeebranch=0;
							if($row1['rb']!=NULL && $row1['rb']!='NULL' && $row1['rb']!=0)
							{
							$eee="rb_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['rb'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','rb','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}

							$eeebranch=0;
							if($row1['ise']!=NULL && $row1['ise']!='NULL' && $row1['ise']!=0)
							{
							$eee="ise_";
							//$eeebranch=$collage_id_is.$eee;
							$eeebranch=$eee.$collage_id_is;
							$total_seats=$row1['ise'];
							$sql3="insert into $seat_matrix(collage_id,course,collage_id_and_total_seats,total_seats)values('$collage_id1','ise','$eeebranch','$total_seats')";
							$result4=mysqli_query($con,$sql3);
							if(!$result4){
								//echo "not inserted";
							}
							else{
								//echo "inserted";
							}
							}


						/*$mebranch=0;
						if($row1['me']!=NULL&&$row1['me']!='NULL' && $row1['me']!=0)
						{
							$mebranch=$collage_id."_me";
						}
						$cebranch=0;
						if($row1['ce']!=NULL&&$row1['ce']!='NULL' && $row1['ce']!=0)
						{
							$cebranch=$collage_id."_ce";
						}
						$eeebranch=0;
						if($row1['eee']!=NULL&&$row1['eee']!='NULL' && $row1['eee']!=0)
						{
							$eeebranch=$collage_id."_eee";
						}
						$ecbranch=0;
						if($row1['ec']!=NULL&&$row1['ec']!='NULL' && $row1['ec']!=0)
						{
							$ecbranch=$collage_id."_ec";
						}
						$txbranch=0;
						if($row1['tx']!=NULL&&$row1['tx']!='NULL' && $row1['tx']!=0)
						{
							$txbranch=$collage_id."_tx";
						}
						$aubranch=0;
						if($row1['au']!=NULL&&$row1['au']!='NULL' && $row1['au']!=0)
						{
							$aubranch=$collage_id."_au";
						}
						$mtbranch=0;
						if($row1['mt']!=NULL&&$row1['mt']!='NULL' && $row1['mt']!=0)
						{
							$mtbranch=$collage_id."_mt";
						}
						$rbbranch=0;
						if($row1['rb']!=NULL&&$row1['rb']!='NULL' && $row1['rb']!=0)
						{
							$rbbranch=$collage_id."_rb";
						}
						$isebranch=0;
						if($row1['ise']!=NULL&&$row1['ise']!='NULL' && $row1['ise']!=0)
						{
							$isebranch=$collage_id."_cs";
						}*/
						
					}
					$database5='ead_admission';
					$row_match=strval($_COOKIE['admissions']);
					$sq4=mysqli_select_db($con,$database5)or die("cannot cannot to database");
					$sql4="update admissions set seat_matrix='created' where course='$row_match'";
					$result5=mysqli_query($con,$sql4);
							if(!$result5){
								echo"<script>confirm('technical error ');window.location.href='admission_updates.php'</script>";
							}
							else{
								//echo "created";
								echo"<script>confirm('seat matrix created');window.location.href='admission_updates.php'</script>";
							}
				}
			}
		}
	
	//$array=mysqli_fetch_array($result);
	//echo($array['status']);
				 
?>