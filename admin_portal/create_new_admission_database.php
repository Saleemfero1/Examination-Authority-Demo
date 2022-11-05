<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['admission_type'];
//echo "$selected_admission";

$selected_year=$_POST['selected_year'];
//echo "$selected_year";
$insert_table=strtoupper($selected_admission)." ".$selected_year;
$table_name=$selected_admission."_".$selected_year;
$table_count=$table_name.'_count';
//echo "$table_name";
$to_string=strval($selected_admission);
$search_string=strtolower($to_string);
		$kcet='kcet';
		$dcet='dcet';
	//	//if(strpos($search_string,$dcet)!==false)
		//	{
				//echo "dcet.php";
			$username="root";
			$password="";
			$server="localhost";
			$database="ead_admission";
			$con=mysqli_connect("localhost","root","")or die("unable to connect");
			$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
			$sql="insert into admissions(course)values('$insert_table')";
			$result=mysqli_query($con,$sql);
			if(! $result){
				//die("could not get data :" .mysql_error());
				//echo "no";
				echo"<script>confirm('database already created for this particular year and course');window.location.href='create_new_admission.php'</script>";
				//echo "<script>confirm(database already present');window.location.href='create_new_admission.php'</script>";
			}
			else
			{
				//echo "done";
		if(strpos($search_string,$dcet)!==false)
			{
				//echo "study_details.php";
				$sql="CREATE TABLE $table_name (
  application_id varchar(30),
  name varchar(50) NOT NULL,
  dob date NOT NULL,
  gender varchar(20) NOT NULL,
  phone varchar(100),
  email varchar(30) NOT NULL,
  adhaar varchar(30) NOT NULL,
  nationality varchar(30) NOT NULL,
  mother_tongue varchar(20) NOT NULL,
  religion varchar(20) NOT NULL,
  caste varchar(20) NOT NULL,
  sub_caste varchar(30) NOT NULL,
  address varchar(10000) NOT NULL,
  state varchar(30) NOT NULL,
  district varchar(30) NOT NULL,
  pincode int(30) NOT NULL,
  10_studied_state varchar(50) NOT NULL,
  10_passed_year year(4) NOT NULL,
  10_marks int(30) NOT NULL,
  10_total_marks int(50) NOT NULL,
  10_type varchar(30) NOT NULL,
  10_roll_number varchar(30) NOT NULL,
  diploma_course varchar(100) NOT NULL,
  diploma_1year_total_marks int(50) NOT NULL,
  diploma_2year_total_marks int(50) NOT NULL,
  diploma_3year_total_marks int(50) NOT NULL,
  diploma_roll_number varchar(30) NOT NULL,
  diploma_year_1_marks int(30) NOT NULL,
  diploma_year_1_status varchar(30) NOT NULL,
  diploma_year_2_marks int(30) NOT NULL,
  diploma_year_2_status varchar(30) NOT NULL,
  diploma_year_3_marks int(30) NOT NULL,
  diploma_year_3_status varchar(30) NOT NULL,
  ead_total_marks int(100) NOT NULL,
  ead_obtained_marks int(100) NOT NULL,
  password varchar(30) NOT NULL,
  final_submit varchar(50) NOT NULL,
  application_payment varchar(30) NOT NULL,
  application_fee int(50) NOT NULL,
  ead_marks int(100) NOT NULL,
  ranking int(100) NOT NULL,
  verification varchar(100) NOT NULL,
  option_entry varchar(10000) NOT NULL,
  option_entry_1_result varchar(50) NOT NULL,
  option_entry_1_selected varchar(50) NOT NULL,
  option_entry_2_selected varchar(50) NOT NULL,
  option_entry_2_result varchar(50) NOT NULL,
  option_entry_3_selected varchar(50) NOT NULL,
  option_entry_3_result varchar(50) NOT NULL,
  option_entry_mock_selected varchar(50) NOT NULL,
  option_entry_mock_result varchar(50) NOT NULL,
  selected_collage varchar(50) NOT NULL,
  admission_amount int(50) NOT NULL,
  payment_status varchar(50) NOT NULL,
  collage_admitted_status varchar(50) NOT NULL,
  admission_status varchar(50) NOT NULL,primary key(application_id,phone)
)";
$result=mysqli_query($con,$sql);
			if(! $result){
				//die("could not get data :" .mysql_error());
				//echo "no";
				mysqli_close($con);
				echo"<script>confirm('internal error in table creation');window.location.href='create_new_admission.php'</script>";
				//echo "<script>confirm(database already present');window.location.href='create_new_admission.php'</script>";
			}
			else
			{
				//echo "yes";
				$sql="INSERT INTO $table_name values('1111', 'dummy', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, 0, 0, '', '', '', 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', 0, '0', '', '')";
$result=mysqli_query($con,$sql);
			if(! $result){
				//die("could not get data :" .mysql_error());
				echo "no";
				echo"<script>confirm('internal error in dummy data inserion');window.location.href='create_new_admission.php'</script>";
				mysqli_close($con);
				//echo "<script>confirm(database already present');window.location.href='create_new_admission.php'</script>";
			}
			else
			{
				//echo "yes";
				$sql="CREATE TABLE $table_count (count int(50) NOT NULL)";
				$result=mysqli_query($con,$sql);
			if(! $result){
				//die("could not get data :" .mysql_error());
				//echo "no";
				echo"<script>confirm('internal error in table count creation');window.location.href='create_new_admission.php'</script>";
				mysqli_close($con);
				//echo "<script>confirm(database already present');window.location.href='create_new_admission.php'</script>";
			}
			else
			{
				echo "yes";
				$sql="INSERT INTO $table_count VALUES(1)";
				$result=mysqli_query($con,$sql);
			if(! $result){
				//die("could not get data :" .mysql_error());
				echo "no";
				echo"<script>confirm('internal error in dummy data inserion');window.location.href='create_new_admission.php'</script>";
				mysqli_close($con);
				//echo "<script>confirm(database already present');window.location.href='create_new_admission.php'</script>";
			}
			else
			{
				echo "yes";
				$database="collage_portal";
				$con2=mysqli_connect("localhost","root","")or die("unable to connect");
				$sql2=mysqli_select_db($con2,$database)or die("cannot cannot to database");
				$sql2="CREATE TABLE $table_name (priority int(10),announcement varchar(100) NOT NULL,link varchar(40) NOT NULL)";
				$result2=mysqli_query($con2,$sql2);
			if(! $result2){
				//die("could not get data :" .mysql_error());
				//echo "no";
				echo"<script>confirm('internal error in table count creation');window.location.href='create_new_admission.php'</script>";
				mysqli_close($con);
				//echo "<script>confirm(database already present');window.location.href='create_new_admission.php'</script>";
			}
			else
			{
				echo"<script>confirm('Database Created');window.location.href='create_new_admission.php'</script>";
			mysqli_close($con);
			}
				//echo"<script>confirm('Database Created');window.location.href='create_new_admission.php'</script>";
			//	mysqli_close($con);
			}
			}
				}
				}

			}
		
		if(strpos($search_string,$kcet)!==false)
			{
				echo "kcet.php";
			}
			}

		//	}
		
		//if(strpos($search_string,$kcet)!==false)
		//	{
				//echo "kcet.php";
		//	}

			echo"<script>confirm('Database Created');window.location.href='create_new_admission.php'</script>";
				mysqli_close($con);
?>