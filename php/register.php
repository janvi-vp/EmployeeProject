<?php
    include("db.php");
    $errors = array();
    session_start();
    if(isset($_POST["submit-form"])) {
        $username = $_POST["username"];
        $email = $_POST["inputEmail"];
        $pwd = $_POST["pwd1"];
        $confirm_pass = $_POST["pwd2"];
        $namee = $_POST["name"];
        $phone = $_POST["pno"];
        $id = $_POST["id"];
        $designation = $_POST["designation"];
        $addr = $_POST["address"];
        $attendance = $_POST["att"];
        $qualification = $_POST["quli"];

        //Verification
        if(empty($designation)) {
            array_push($errors, "Select your designation");
        }
        if(!preg_match('/^\d{10}$/', $phone)) {
            array_push($errors, "Incorrect Phone Number");
        }
        if($pwd != $confirm_pass) {
            array_push($errors, "Passwords do not match");
        }

        //Prepare and bind
        if(count($errors) == 0) {
            $temp = "INSERT INTO register VALUES(:username, :email, :pwd, :namee, :phone, :id, :desig, :addr, :attendance, :quali)";
            $query = $db -> prepare($temp);
            $query -> execute(array(
                ":username" => $username,
                ":email" => $email,
                ":pwd" => $pwd,
                ":namee" => $namee,
                ":phone" => $phone,
                ":id" => $id,
                ":desig" => $designation,
                ":addr" => $addr,
                ":attendance" => $attendance,
                ":quali" => $qualification,
            ));
            echo "New records created successfully";
            $_SESSION["username"] = $username;
            $_SESSION['designation'] = $results['designation'];
            header("location: home.php");
        }
    }
?>