<?php
include "../include/db.php";

$photographer_name = $_POST["photographer-name"];
$user = $_POST["user-name"];
$from_date = $_POST["from-date"];
$to_date = $_POST["to-date"];
$current_date = date("Y-m-d");

$sql = "INSERT INTO orders(user_name , photo_name , from_date , to_date ,  book_date , `status`)VALUES('$user' , '$photographer_name' , '$from_date' , '$to_date' , '$current_date', 'pending');";
$result = $conn->query($sql);
if($result == TRUE){
    echo "<script>";
    echo "alert('Order Booked Successfully');";
    echo "window.location.href = 'home.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('Invalid Details');";
    echo "window.location.href = 'home.php';";
    echo "</script>";
}
$conn->close();

?>