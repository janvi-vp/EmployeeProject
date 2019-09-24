<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        echo "<script>alert('Please sign in first');</script>";
        header("location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
</head>
<body>
    <h4>hello</h4>
</body>
</html>