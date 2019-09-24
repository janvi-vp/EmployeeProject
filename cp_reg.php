<!DOCTYPE html>
<html>
<head>
	<style>.colii{background-color:"yellow";}</style>
	<title>User Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <?php
//require_once('config.php')
?>
<style>.colii{background-color: #F7E410;height: 100%}</style>

</head>
<body>
	<div class="colii">
		<?php
		$db_user="root";
$db_pass="";
$db_name="login";

$db=new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8',$db_user,$db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
	

	if(isset($_POST['create'])){
		 $lidErr =$labnoErr= $labnameErr= $floorErr= "";
		 $lid=$labno= $labname= $floor="";
		 $count=0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["lid"])) {
				$count++;
		    $lidErr = "lid is req";
		  } else {
		    $lid = test_input($_POST["lid"]);
		  }
		  
		  // if (empty($_POST["name"])) {
		  //   alert('name miss');
		  // } else {
		  //   $name=		test_input($_POST['name'])	;
		  // }

		  // if (empty($_POST["ph_no"])) {
		  //   $ph_noErr = "ph_no is req";
		  // } else {
		  //   $ph_no = test_input($_POST["ph_no"]);
		  // }

		  // if (empty($_POST["address"])) {
		  //   $addressErr = "address is req";
		  // } else {
		  //   $address = test_input($_POST["address"]);
		  // }

		  // if (empty($_POST["attendance"])) {
		  //   $attendanceErr = "attendance is req";
		  // } else {
		  //   $attendance = test_input($_POST["attendance"]);
		  // }

		  // if (empty($_POST["designation"])) {
		  //   $designationErr = "designation is req";
		  // } else {
		  //   $designation = test_input($_POST["designation"]);
		  // }

		  if (empty($_POST["labno"])) {
		  	$count++;
		    alert('lab no required');
		  } else {
		    $labno = test_input($_POST["labno"]);
		  }

		  if (empty($_POST["floor"])) {
		  	$count++;
		    alert('floor info is required');
		  } else {
		    $floor = test_input($_POST["floor"]);
		  }

		  if (empty($_POST["labname"])) {
		  	$count++;
		    alert('lab name required');
		  } else {
		    $labname = test_input($_POST["labname"]);
		  }
		}
		// $lid=			$_POST['lid'];
		// $name=			$_POST['name'];
		// $ph_no=			$_POST['ph_no'];
		// $address=		$_POST['address'];
		// $attendance=	$_POST['attendance'];
		// $designation=	$_POST['designation'];
		// $labno=			$_POST['labno'];
		// $floor=			$_POST['floor'];
		// $labname=		$_POST['labname'];
		  


		//$password=			($_POST['password']);
		//$password=password_hash($password, PASSWORD_DEFAULT);
		// $sql="INSERT INTO employee.labast(lid,name,ph_no,address,attendance,designation) VALUES(?,?,?,?,?,?)";
		// $stmtinsert=$db->prepare($sql);
		// $result=$stmtinsert->execute([$lid,$name,$ph_no,$address,$attendance,$designation]);
		// if($result){
		// 	alert('signed up');}
		// else{
		// 	echo "error";
		// }
		if($count==0){
		$sqll="INSERT INTO employee.lab(lid,labno,floor,labname) VALUES(?,?,?,?)";
		$stmtinsert=$db->prepare($sqll);
		$result=$stmtinsert->execute([$lid,$labno,$floor,$labname]);
		
		if($result){
			alert('signed up');}}
		else{
			echo "error";
		}
}



		if(isset($_POST['update'])){
		 $lidErr =$labnoErr= $labnameErr= $floorErr= "";
		 $lid=$labno= $labname= $floor="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["lid"])) {
		    $lidErr = "lid is req";
		  } else {
		    $lid = test_input($_POST["lid"]);
		  }
		  if (!empty($_POST["labno"])) {
		  	$labno = test_input($_POST["labno"]);
		  	$sqll="UPDATE employee.lab SET labno=? WHERE lid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$labno, $lid]);
		  }

		  if (!empty($_POST["floor"])) {
		  	$floor = test_input($_POST["floor"]);
		    $sql="UPDATE employee.lab SET floor=? WHERE lid=?";
		  	$stmt= $db->prepare($sql);
		  	$result=$stmt->execute([$floor, $lid]);
		  }

		  if (!empty($_POST["labname"])) {
		    $labname = test_input($_POST["labname"]);
		    $sqll="UPDATE employee.lab SET labname=? WHERE lid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$labname, $lid]);
		  }
		}
		
		if($result){
			alert('changed');}
		else{
			echo "error";
		}
}

if(isset($_POST['delete'])){
		 $lidErr =$labnoErr= $labnameErr= $floorErr= "";
		 $lid=$labno= $labname= $floor="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["lid"])) {
		    $lidErr = "lid is req";
		  } else {
		    $lid = test_input($_POST["lid"]);
		    $sqll="DELETE FROM employee.lab WHERE lid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$lid]);
		  }
		}
		
		if($result){
			alert('deleted');}
		else{
			echo "error";
		}
}
	function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
	?> 
</div>
<div class="colii">
	<form  name="myForm" action="cp_reg.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form</p>
					<hr class="mb-3">
					<label for="lid"><b>id</b></label>
					<input class="form-control"type="number" name="lid" >

					 <!-- <label for="name"><b>name</b></label>
					<input class="form-control" type="text" name="name" >
					
					<label for="password"><b>password</b></label>
					<input class="form-control"type="password" name="password" >
					
					<label for="ph_no"><b>Contact number</b></label>
					<input class="form-control"type="number" name="ph_no" >

					<label for="address"><b>address</b></label>
					<input class="form-control"type="text" name="address" >

					<label for="attendance"><b>attendance</b></label>
					<input class="form-control"type="number" name="attendance" >

					<label for="designation"><b>designation</b></label>
					<input class="form-control"type="text" name="designation" > --> 

					<label for="labno"><b>lab no.</b></label>
					<input class="form-control"type="number" name="labno" >
					
					<label for="floor"><b>Which Floor?</b></label>
					<input class="form-control"type="text" name="floor" >

					<label for="labname"><b>lab name</b></label>
					<input class="form-control"type="text" name="labname" >
					<hr class="mb-3">

					
					<input  style="margin-bottom: 50%;"class="btn btn-primary"type="submit" name="create" value="Sign Up">
					<input  style="margin-bottom: 50%;"class="btn btn-primary"type="submit" name="update" value="Update">
					<input  style="margin-bottom: 50%;"class="btn btn-primary"type="submit" name="delete" value="Delete">
				</div>
			</div>
		</div>
	</form>
</div>

</body>
