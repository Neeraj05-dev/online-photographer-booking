<?php
$name = $_POST["user-name"];
$pass = $_POST["password"];

if($name == "Admin" && $pass == "Admin"){
    echo "<script>";
    echo "alert('Login Successfully');";
    echo "window.location.href = 'home.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('Login Unsuccessfully');";
    echo "window.location.href = 'login.html';";
    echo "</script>";
}
?>