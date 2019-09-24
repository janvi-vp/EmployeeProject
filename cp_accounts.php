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
		 $fidErr =$bonusErr= $lpoErr= $salaryErr=$duesErr=  "";
		 $fid=$bonus= $lpo= $salary=$duesErr= "";
		 $count=0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["fid"])) {
			$count++;
		    $fidErr = "fid is req";
		  } else {
		    $fid = test_input($_POST["fid"]);
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

		  if (empty($_POST["bonus"])) {
		  	//$count++;
		    //alert('bonus required');
		  } else {
		    $bonus = test_input($_POST["bonus"]);
		  }
		  if (empty($_POST["salary"])) {
		  	$count++;
		    alert('salary required');
		  } else {
		    $salary = test_input($_POST["salary"]);
		  }
		  if (empty($_POST["dues"])) {
		  	//$count++;
		   // alert('dues required');
		  } else {
		    $dues = test_input($_POST["dues"]);
		  }

		  
		  if (empty($_POST["lpo"])) {
		  	$count++;
		    alert('last paid on required');
		  } else {
		    $lpo = test_input($_POST["lpo"]);
		  }
		}
		// $fid=			$_POST['fid'];
		// $name=			$_POST['name'];
		// $ph_no=			$_POST['ph_no'];
		// $address=		$_POST['address'];
		// $attendance=	$_POST['attendance'];
		// $designation=	$_POST['designation'];
		// $bonus=			$_POST['bonus'];
		// $floor=			$_POST['floor'];
		// $lpo=		$_POST['lpo'];
		  


		//$password=			($_POST['password']);
		//$password=password_hash($password, PASSWORD_DEFAULT);
		// $sql="INSERT INTO employee.accountsast(fid,name,ph_no,address,attendance,designation) VALUES(?,?,?,?,?,?)";
		// $stmtinsert=$db->prepare($sql);
		// $result=$stmtinsert->execute([$fid,$name,$ph_no,$address,$attendance,$designation]);
		// if($result){
		// 	alert('signed up');}
		// else{
		// 	echo "error";
		// }
		if($count==0){
		$sqll="INSERT INTO employee.accounts(fid,bonus,lpo,salary,dues) VALUES(?,?,?,?,?)";
		$stmtinsert=$db->prepare($sqll);
		$result=$stmtinsert->execute([$fid,$bonus,$lpo,$salary,$dues]);
		if($result){
			alert('signed up');}}
		else{
			alert('Refill form');
		}

}



		if(isset($_POST['update'])){
		 $fidErr =$bonusErr= $lpoErr=  "";
		 $fid=$bonus= $lpo= "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["fid"])) {
		    $fidErr = "fid is req";
		  } else {
		    $fid = test_input($_POST["fid"]);
		  }
		  if (is_numeric($_POST["bonus"])) {
		  	$bonus = test_input($_POST["bonus"]);
		  	$sqll="UPDATE employee.accounts SET bonus=? WHERE fid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$bonus, $fid]);
		  }
		  if (!empty($_POST["salary"])) {
		  	$salary = test_input($_POST["salary"]);
		  	$sqll="UPDATE employee.accounts SET salary=? WHERE fid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$salary, $fid]);
		  }
		  if (is_numeric($_POST["dues"])) {
		  	$dues = test_input($_POST["dues"]);
		  	$sqll="UPDATE employee.accounts SET dues=? WHERE fid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$dues, $fid]);
		  }

		  if (!empty($_POST["lpo"])) {
		    $lpo = test_input($_POST["lpo"]);
		    $sqll="UPDATE employee.accounts SET lpo=? WHERE fid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$lpo, $fid]);
		  }
		}
		
		if($result){
			alert('changed');}
		else{
			echo "error";
		}
}

if(isset($_POST['delete'])){
		 $fidErr =$bonusErr= $lpoErr= $floorErr= "";
		 $fid=$bonus= $lpo= $floor="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["fid"])) {
		    $fidErr = "fid is req";
		  } else {
		    $fid = test_input($_POST["fid"]);
		    $sqll="DELETE FROM employee.accounts WHERE fid=?";
		  	$stmt= $db->prepare($sqll);
		  	$result=$stmt->execute([$fid]);
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
	<form  name="myForm" action="cp_accounts.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<h1>Accounts</h1>
					<p>Fill up the required information</p>
					<hr class="mb-3">
					<label for="fid"><b>id</b></label>
					<input class="form-control"type="number" name="fid" >

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
					<label for="salary"><b>Salary</b></label>
					<input class="form-control"type="number" name="salary" >

					<label for="bonus"><b>Bonus</b></label>
					<input class="form-control"type="number" name="bonus" >

					<label for="dues"><b>Dues</b></label>
					<input class="form-control"type="number" name="dues" >

					<label for="lpo"><b>Last paid on</b></label>
					<input class="form-control"type="date" name="lpo" >
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
