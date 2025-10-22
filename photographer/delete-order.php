<?php
include "../include/db.php";

$order_id = $_POST["order-id"];

$sql = "DELETE FROM orders WHERE Id='$order_id'";
$result = $conn->query($sql);
if($result == TRUE){
    echo "<script>";
    echo "window.location.href='display-order.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('Unable to Complete the order');";
    echo "window.location.href='display-order.php';";
}
?>