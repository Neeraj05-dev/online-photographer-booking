<?php
include "./include/db.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "<script>";
    echo "alert('Login Successfully');";
    while($row = $result->fetch_assoc()){
        $role = "".$row["Role"]."";
        $_SESSION["Name"] = "".$row["Name"]."";
        if($role == "user"){
            echo "window.location.href = './user/home.php';";
        }
        else{
            echo "window.location.href = './photographer/home.php';";
        }
    }
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('User Not Found');";
    echo "window.location.href='index.html';";
    echo "</script>";
}
$conn->close();
?>