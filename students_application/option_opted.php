






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
			}

?>

<?php 
	$opted_selection=$_POST['option'];
//echo($opted_selection);
$selection='option_entry_'.$option_round.'_selected';
//echo($selection);
$sql1="update $table set $selection='$opted_selection' where application_id='$application_id'";
if($opted_selection=='option_3')
{
	$sql1="update $table set $selection='$opted_selection',admission_status='expelled' where application_id='$application_id'";
}
$result1=mysqli_query($con,$sql1);
			if(! $result1){
				echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/students_application/option_entry.php'</script>";
			}
			else
			{
				echo"<script>confirm('option Selection is updated');window.location.href='http://localhost/EAD%20project/students_application/option_entry.php'</script>";
			}
mysqli_close($con);
 ?>