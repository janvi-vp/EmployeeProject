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
<style>.colii{background-color: #F7E410;height: 100%}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

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
					$cidErr =$co_idErr= $cnameErr= $creditsErr=  "";
					$cid=$co_id= $cname= $credits= "";
					$count=0;
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						if (empty($_POST["cid"])) {
						$count++;
						$cidErr = "cid is req";
					} else {
						$cid = test_input($_POST["cid"]);
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

		  if (empty($_POST["co_id"])) {
		  	$count++;
		    alert('course id required');
		  } else {
		    $co_id = test_input($_POST["co_id"]);
		  }
		  if (empty($_POST["credits"])) {
		  	$count++;
		    alert('course credits required');
		  } else {
		    $credits = test_input($_POST["credits"]);
		  }

		  
		  if (empty($_POST["cname"])) {
		  	$count++;
		    alert('course name required');
		  } else {
		    $cname = test_input($_POST["cname"]);
		  }
		
		if (empty($_POST["branch"])) {
		  	$count++;
		    alert('branch name required');
		  } else {
		    $branch = test_input($_POST["branch"]);
		  }
		}
		// $cid=			$_POST['cid'];
		// $name=			$_POST['name'];
		// $ph_no=			$_POST['ph_no'];
		// $address=		$_POST['address'];
		// $attendance=	$_POST['attendance'];
		// $designation=	$_POST['designation'];
		// $co_id=			$_POST['co_id'];
		// $floor=			$_POST['floor'];
		// $cname=		$_POST['cname'];
		  


		//$password=			($_POST['password']);
		//$password=password_hash($password, PASSWORD_DEFAULT);
		// $sql="INSERT INTO employee.courseast(cid,name,ph_no,address,attendance,designation) VALUES(?,?,?,?,?,?)";
		// $stmtinsert=$db->prepare($sql);
		// $result=$stmtinsert->execute([$cid,$name,$ph_no,$address,$attendance,$designation]);
		// if($result){
		// 	alert('signed up');}
		// else{
		// 	echo "error";
		// }
		if($count==0){
		$sqll="INSERT INTO employee.course(cid,co_id,cname,credits,branch) VALUES(?,?,?,?,?)";
		$stmtinsert=$db->prepare($sqll);
		$result=$stmtinsert->execute([$cid,$co_id,$cname,$credits,$branch]);
		if($result){
			alert('signed up');}}
		else{
			alert('Refill form');
		}

}



		if(isset($_POST['update'])){
		 $cidErr =$co_idErr= $cnameErr=  "";
		 $cid=$co_id= $cname= "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["cid"])) {
		    $cidErr = "cid is req";
		  } else {
		    $cid = test_input($_POST["cid"]);
		  }
		  if (!empty($_POST["co_id"])) {
		  	$co_id = test_input($_POST["co_id"]);
		  	$sqll="UPDATE employee.course SET co_id=? WHERE cid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$co_id, $cid]);
		  }
		  if (!empty($_POST["credits"])) {
		  	$credits = test_input($_POST["credits"]);
		  	$sqll="UPDATE employee.course SET credits=? WHERE cid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$credits, $cid]);
		  }

		  if (!empty($_POST["cname"])) {
		    $cname = test_input($_POST["cname"]);
		    $sqll="UPDATE employee.course SET cname=? WHERE cid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$cname, $cid]);
		  }
		  if (!empty($_POST["branch"])) {
		    $branch = test_input($_POST["branch"]);
		    $sqll="UPDATE employee.course SET branch=? WHERE cid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$branch, $cid]);
		  }
		}
		
		if($result){
			alert('changed');}
		else{
			echo "error";
		}
}

if(isset($_POST['delete'])){
		 $cidErr =$co_idErr= $cnameErr= $floorErr=$branchErr= "";
		 $cid=$co_id= $cname= $floor=$branch="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["cid"])) {
		    $cidErr = "cid is req";
		  } else {
		    $cid = test_input($_POST["cid"]);
		    $sqll="DELETE FROM employee.course WHERE cid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$cid]);
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
	<form  name="myForm" action="cp_reg_tcourse.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form</p>
					<hr class="mb-3">
					<label for="cid"><b>id</b></label>
					<input class="form-control"type="number" name="cid" >

					<label for="branch"><b>Branch</b></label>
					<br>
					<select  style="padding-right: 24%;padding-bottom: 3%;border-style: none;"name="branch" placeholder="select">
						<option value="Computer" class="dropdown">Computer Engineering</option>
						<option value="IT" class="dropdown">Information Technology</option>
						<option value="EXTC" class="dropdown">EXTC</option>
						<option value="ETRX" class="dropdown">ETRX</option>
					</select>

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

					<label for="co_id"><b>Course id</b></label>
					<input class="form-control"type="number" name="co_id" >

					<label for="credits"><b>Course Credits</b></label>
					<input class="form-control"type="number" name="credits" >

					<label for="cname"><b>course name</b></label>
					<input class="form-control"type="text" name="cname" >
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
