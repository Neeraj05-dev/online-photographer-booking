<?php
include "./include/db.php";

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$password = $_POST["password"];
$role = $_POST["role"];

if(is_numeric($phone)){
    if(strlen($phone) == 10){
        $sql = "INSERT INTO users(Name , Email , Phone , Gender , Address , Password , Role)VALUES('$name' , '$email' , '$phone' , '$gender' , '$address' , '$password' , '$role')";
        $result = $conn->query($sql);
        if($result == TRUE){
            echo "<script>";
            echo "alert('Account Created Successfully');";
            echo "window.location.href = 'index.html';";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('Invalid Details');";
            echo "window.location.href = 'create-user.html';";
            echo "</script>";
        }
    }
    else{
        echo "<script>";
        echo "alert('Invalid Details');";
        echo "window.location.href = 'create-user.html';";
        echo "</script>";
    }
}
else{
    echo "<script>";
    echo "alert('Invalid Details');";
    echo "window.location.href = 'create-user.html';";
    echo "</script>";
}
?>