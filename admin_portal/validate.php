<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>new collage form</title>
	<link rel="stylesheet" type="text/css" href="css/test.css">
</head>

<body>
		<script type="text/javascript">
	function validate_password() {
		var pass=document.getElementById("Password").value;
		var repass=document.getElementById("re_password").value;
		if(pass!=repass) {
			document.getElementById("re_password").style.color="red";
		}
		else
		{
			document.getElementById("re_password").style.color="black";
		}
	}
</script>
	<!--header -->

	<div class="Examination_Authority">
	<div class="img1">
		<img src="images/log.png">
	</div>
	<div class="text">
		<h1>Examination Authority Demo </h1>
		<h2>Project</h2>
	</div>
	<div class="img2">
		<img src="images/logo 1.png">
	</div>
</div>
<div id="heading">
<h1><u>EAD New Collage allotment Form</u></h1>
</div>
<div id="back">
	<input type="button" value="Go Back!" onclick="history.back()">
</div>

<div id="application">
	<form method="post" action="#">
		<table id="1">
			<tr>
				<td><span>Name :</span></td>
				<td><input type="text" id="name" name="name" placeholder="Enter collage name here" required></td>
			</tr>
			<tr>
				<td><span>Address :</span></td>
				<td><input type="text" name="address" placeholder="Enter collage address here"required></td>
			</tr>
			<tr>
				<td><span>Contact Number :</span></td>
				<td><input type="tel" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890 "required></td>
			</tr>
			<tr>
				<td><span>Email id :</span></td>
				<td><input type="email" name="email" placeholder="Enter e-mail id here "required></td>
			</tr>
		</table>
		<div id="form_right">
			<table>
			<tr>
				<td><span class="checkmark">Collage Type :</span></td>
				<td><input type="radio" id="name" name="collage_type" placeholder="Enter collage name here" required><label>Government</label>
				<input type="radio" id="name" name="collage_type" placeholder="Enter collage name here"><label>Private</label></td>
			</tr>
			<tr>
				<td><span>Chairman Name :</span></td>
				<td><input type="text" name="chair_name" placeholder="Enter Chair-person Name "required></td>
			</tr>
			<tr>
				<td><span>Enter Password :</span></td>
				<td><input type="Password" name="Password" id="Password"  minlength="8" title="must contain atleast 8 or more characters" placeholder="Enter Chair-person Name "required></td>
			</tr>
			<tr>
				<td><span>Re-Enter Password :</span></td>
				<td><input type="Password" name="re_password"  id="re_password" onmouseout="validate_password()" minlength="8" placeholder="Enter Chair-person Name" required></td>
			</tr>
		</table>
		</div>
		<div id="photo">
					<span>Insert Collage Photo :</span></td>
				<input type="file" name="img" required>
		</div>
			<table>
				<td><input type="checkbox" name="" required id="check_box"></td>
			</table>
			<p>I agree to all the conditions imposed by the EAD</p>
		<input type="submit" name="" value="Submit">
		<input type="reset" name="" value="Reset">

	</form>
</div>

</body>
</html>