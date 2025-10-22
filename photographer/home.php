<?php
include "../include/db.php";
session_start();
$photographer_name = $_SESSION["Name"];

$sql2 = "SELECT * FROM orders WHERE `status` = 'pending'";
$result2 = $conn->query($sql2);
$pending = $result2->num_rows;

$sql1 = "SELECT * FROM orders WHERE `status`= 'completed'";
$answer = $conn->query($sql1);
$completed = $answer->num_rows;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura - Photographer Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body style="display: flex;">
    <?php 
    include "../include/sidebar.php";
    ?>

    <div class="main-content">
        <div class="header">
            <div class="welcome-section">
                <h2>Welcome back, <?php echo $photographer_name;  ?>!</h2>
                <p>Here's your photography business overview</p>
            </div>
            <div class="date-display">
                <p><?php echo date("Y-m-d"); ?></p>
            </div>
        </div>
        
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-number"><?php echo $pending + $completed; ?></div>
                <div class="stat-label">Total Bookings</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $completed; ?></div>
                <div class="stat-label">Completed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $pending; ?></div>
                <div class="stat-label">Pending</div>
            </div>
        </div>
        
        <h3 class="section-title">Today's Schedule</h3>
        <div class="today-orders">
            <?php
            $date = date("Y-m-d");
            $sql = "SELECT * FROM orders WHERE photo_name = '$photographer_name' And from_date = '$date'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($data = $result->fetch_assoc()){
                    $status = $data["status"];
                    echo "<div class='order-item'>
                                <div class='order-client'>
                                    <div class='client-info'>
                                        <h4>".$data["user_name"]."</h4>
                                    </div>
                                </div>
                                <div class='order-time'>".$data["from_date"]." - ".$data["to_date"]."</div>";
                                if($status == "pending"){
                                    echo "<div class='order-status status-inprogress'>In Progress</div>";
                                }
                                else{
                                    echo "<div class='order-status status-completed'>Completed</div>";
                                }
                          echo "</div>";
                }
            }
            else{
                echo "<p>No orders Today</p>";
            }

            ?>
            <div class="no-orders" style="display: none;">
                <p>No upcoming bookings scheduled</p>
            </div>
        </div>
    </div>
</body>
</html>