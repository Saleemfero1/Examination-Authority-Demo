<?php
	$loginid=$_POST['collage_id'];//getting the id entered in login
	$loginpassword=$_POST['Password'];//getting the password entered in login
	//connecting to mysql
	$username="root";
	$password="";
	$server="localhost";
	$database="collage_portal";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	//fetching data from mysql
	$sql="SELECT * FROM collage_list where collage_id='$loginid'";
	$result=mysqli_query($con,$sql);
	$array=mysqli_fetch_array($result);
	
	if($array['collage_id']==$loginid && $array['password']==$loginpassword)
    {
    	session_start();
    	$_SESSION['collage_id']=$array['collage_id'];
    	echo "<script>window.location.href='collage_portal/home_page.php'</script>";
    	exit;
    }
	if($array['collage_id']==$loginid && $array['password']!=$loginpassword)
    {
        echo "<script>alert('Enter correct collage id or password'); window.location.href='collage_portal.php'</script>"; 
  		mysqli_close($sql);
 	   	exit;
    }    
if($array['collage_id']!=$loginid)
    {
       	 echo "<script>alert('no collage with particular id exists'); window.location.href='collage_portal.php'</script>";
   		 mysqli_close($sql);
   		 exit;
    }  
     mysqli_close($sql);
?>