<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE employee";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//sql to create table
$sql = "CREATE TABLE employee.register (
id INT(6) PRIMARY KEY, 
namee VARCHAR(30),
username VARCHAR(30),
pwd VARCHAR(50),
phone INT(10),
addr VARCHAR(30),
attendance INT(5),
designation VARCHAR(20),
qualification VARCHAR(40),
email VARCHAR(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table register created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}









// sql to create table
// $sql = "CREATE TABLE labast (
// lid INT(6) PRIMARY KEY, 
// name VARCHAR(30),
// ph_no INT(10),
// address VARCHAR(30),
// attendance INT(5),
// designation VARCHAR(20)
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table labast created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

$sql = "CREATE TABLE employee.lab (
labno INT(6) PRIMARY KEY, 
labname VARCHAR(30) NOT NULL,
lid INT(6) ,
FOREIGN KEY (lid) REFERENCES labast(lid),
floor VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table lab created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

 $sql = "CREATE TABLE employee.course (
 co_id INT(6) PRIMARY KEY, 
 cname VARCHAR(30) NOT NULL,
 credits INT(30) NOT NULL,
 cid INT(6) ,
 -- FOREIGN KEY (lid) REFERENCES labast(lid),
 floor VARCHAR(30) NOT NULL
 )";

 if ($conn->query($sql) === TRUE) {
     echo "Table lab created successfully";
 } else {
     echo "Error creating table: " . $conn->error;
}

 $sql = "CREATE TABLE employee.accounts (
 fid INT(6) PRIMARY KEY, 
 Bonus INT(30) NOT NULL,
 salary INT(6) ,
 dues INT(6),
 -- FOREIGN KEY (lid) REFERENCES labast(lid),
 lpo DATE NOT NULL
 )";

 if ($conn->query($sql) === TRUE) {
     echo "Table lab created successfully";
 } else {
     echo "Error creating table: " . $conn->error;
}

$conn->close();

?>
