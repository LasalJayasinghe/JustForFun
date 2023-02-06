<?php

$fname = $_POST["FName"];
$lname = $_POST["LName"];
$email = $_POST["Email"];
$message = $_POST["Message"];


$host = "localhost";
$dbname = "message_db";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           

$sql = "INSERT INTO message (fName, lName, email, textMsg)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii",
                       $fname,
                       $lname,
                       $email,
                       $message);

mysqli_stmt_execute($stmt);
// echo "Record saved.";