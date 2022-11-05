<?php
	$loginid=$_POST['collage_id'];//getting the id entered in login
	$loginpassword=$_POST['Password'];//getting the password entered in login
	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="ead_admin_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	//fetching data from mysql
	$sql="SELECT * FROM admin_details where admin_id='$loginid'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	
	if($array['admin_id']==$loginid && $array['pass']==$loginpassword)
    {
    	session_start();
    	$_SESSION['admin_id']=$array['admin_id'];
    	echo "<script>window.location.href='admin_portal/home_page1.php'</script>";
    	exit;
    }
	if($array['admin_id']==$loginid && $array['pass']!=$loginpassword)
    {
        echo "<script>alert('Incorrect Credentials'); window.location.href='about_us.php'</script>"; 
  		mysqli_close($sql);
 	   	exit;
    }    
if($array['admin_id']!=$loginid)
    {
       	 echo "<script>alert('Incorrect Credentials'); window.location.href='about_us.php'</script>";
   		 mysqli_close($sql);
   		 exit;
    }  
     mysqli_close($sql);
?>