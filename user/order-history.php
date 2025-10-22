<?php
session_start();
$user_name = $_SESSION["Name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaptureBook - Order History</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body class="body">
    <div class="history-container">
        <div class="logo">
            <h1>Captura</h1>
            <p>Your Booking History</p>
        </div>
        
        <div class="user-info">
            <div class="user-details">
                <h3><?php echo $user_name; ?></h3>
            </div>
            <a href="home.php" class="back-btn">Back to Home</a>
        </div>
        
        <h2 class="section-title">Your Photography Bookings</h2>
        
        <?php 
        include "../include/db.php";

        $sql = "SELECT * FROM orders WHERE user_name = '$user_name'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($data = $result->fetch_assoc()){
                $status = $data["status"];
                    echo "<div class='orders-list'>
                            <div class='order-card'>
                                <div class='order-header'>
                                    <div class='photographer-name'>".$data["photo_name"]."</div>";
                                  if($status == "pending"){
                                    echo "<div class='order-status status-pending'>".$data["status"]."</div>";
                                  } 
                                  else{
                                    echo "<div class='order-status status-completed'>".$data["status"]."</div>";
                                  } 
                                echo " </div>
                                <div class='order-details'>
                                    <div class='detail-item'>
                                        <span class='detail-label'>From Date</span>
                                        <span class='detail-value'>".$data["from_date"]."</span>
                                    </div>
                                    <div class='detail-item'>
                                        <span class='detail-label'>To Date</span>
                                        <span class='detail-value'>".$data["to_date"]."</span>
                                    </div>
                                    <div class='detail-item'>
                                        <span class='detail-label'>Booking Date</span>
                                        <span class='detail-value'>".$data["book_date"]."</span>
                                    </div>
                                </div>
                            </div>";
            }
        }
        else {
            echo "<div class='no-orders'>
                    <p>You haven't made any bookings yet.</p>
                    <a href='home.php' class='book-now-btn'>Book Your First Photographer</a>
                  </div>";
        }
        ?>
    </div>
</body>
</html>