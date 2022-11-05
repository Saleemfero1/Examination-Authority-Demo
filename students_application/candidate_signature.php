<?php
session_start();
//echo($_SESSION['application_id']);
$application_id=$_SESSION['application_id'];
//echo($_SESSION['admission_type']);
?>
<?php //accesing the setted cookie value in javascript in admission page
$selected_admission=$_COOKIE['display_content'];
$to_string=strval($selected_admission);
$tolower=strtolower($to_string);
$table=str_replace(" ", "_",$tolower);
	//echo($table);
//echo($selected_admission);
if($selected_admission==NULL)
{
	echo"<script>confirm('due to internal error the page is redirecting to another page');window.location.href='http://localhost/EAD%20project/admission.php'</script>";
}
	$file_name=$_FILES["candidates_signature"]["name"];
	$tmp_name=$_FILES["candidates_signature"]["tmp_name"];
	$folder="candidate_signature/".$application_id;
if(move_uploaded_file($tmp_name,$folder)){
	echo"<script>confirm('application saved');window.location.href='image_upload.php'</script>";
	}
	else
	{
		echo "<script>confirm('due to interal error the processing takes place from first or image size will be greater upload with less KB image'); window.location.href='image_upload.php'</script>"; 
	}
?>