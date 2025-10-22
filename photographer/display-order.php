<?php
include "../include/db.php";
session_start();
$photogrpher_name = $_SESSION["Name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaptureBook - My Orders</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body style="display: flex;">
       <?php 
        include "../include/sidebar.php";
       ?>
       
        <div class="orders-grid">
            <?php
                $sql = "SELECT * FROM orders WHERE photo_name = '$photogrpher_name'";
                $result = $conn->query($sql);
                if($result == TRUE){
                    while($data = $result->fetch_assoc()){

            ?>
            <div class="order-card-main">
                <div class="order-header-main">
                    <div class="order-client-main">
                        <div class="client-info-main">
                            <h4><?php echo $data["user_name"]; ?></h4>
                        </div>
                    </div>
                    <div class="order-meta-main">
                        <div class="order-date">Booked on: <?php $data["book_date"]; ?></div>
                    </div>
                </div>
                
                <div class="order-details-grid">
                    <div class="detail-item-main">
                        <span class="detail-label-main">Event Date</span>
                        <span class="detail-value-main"><?php echo $data["from_date"]; ?></span>
                    </div>
                    <div class="detail-item-main">
                        <span class="detail-label-main">To</span>
                        <span class="detail-value-main"><?php echo $data["to_date"] ?></span>
                    </div>
                    <div class="detail-item-main">
                        <span class="detail-label-main">Status</span>
                        <span class="order-status-main status-confirmed-main"><?php echo $data["status"];?></span>
                    </div>
                </div>
                
                <?php 
                    $status = $data["status"];
                    if($status == "pending"){
                        echo "<div class='order-actions'>
                                    <form action='complete-status.php' method='post'>
                                    <input type='hidden' value='".$data["Id"]."' name='order-id'>
                                    <button typ='submit' class='action-btn btn-primary'>Mark as complete</button>
                                    </form>
                                    <form action='cancell-order.php' method='post'>
                                    <input type='hidden' value='".$data["Id"]."' name='order-id'>
                                    <button type='submit' class='action-btn btn-danger'>Cancel Order</button>
                                    </form>
                              </div>";
                    }
                    else{
                        echo "<div class='order-actions'>
                                    <form action='delete-order.php' method='post'>
                                        <input type='hidden' name='order-id' value='".$data["Id"]."'>
                                        <button type='submit' class='action-btn btn-danger'>Delete Order</button>
                                    </form>
                              </div>";
                    }
                ?>
            </div>
            <?php }}
                else{
                    echo "<div class='no-orders-main'>
                        <p>You don't have any orders yet.</p>
                    </div>";
                }?>
        </div>
    </div>
    
</body>
</html>