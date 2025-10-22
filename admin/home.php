<?php
include "../include/db.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$users = $result->num_rows;

$sqlp = "SELECT * FROM users WHERE `Role` = 'photographer';";
$result1 = $conn->query($sqlp);
$photgraphers = $result1->num_rows;

$sqla = "SELECT * FROM orders WHERE `status` = 'pending'";
$result2 = $conn->query($sqla);
$pending_order = $result2->num_rows;

$sqlc = "SELECT * FROM orders WHERE `status` = 'completed'";
$result3 = $conn->query($sqlc);
$completed_order = $result3->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaptureBook - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets//css//admin.css">
</head>
<body style="display: flex;">
    <?php include "admin-sidebar.php"; ?>
    
    <div class="admin-main-content">
        <div class="admin-header">
            <div class="admin-welcome">
                <h2>Admin Dashboard</h2>
                <p>Welcome back, Admin</p>
            </div>
            <div class="admin-user-info">
                <div class="admin-user-avatar">A</div>
                <div class="admin-user-details">
                    <h4>Admin</h4>
                    <p>Hello  , Admin</p>
                </div>
            </div>
        </div>
        
        <div class="admin-stats-grid">
            <div class="admin-stat-card stat-card-users">
                <div class="admin-stat-number stat-number-users"><?php echo $users; ?></div>
                <div class="admin-stat-label">Total Users</div>
            </div>
            <div class="admin-stat-card stat-card-photographers">
                <div class="admin-stat-number stat-number-photographers"><?php echo $photgraphers; ?></div>
                <div class="admin-stat-label">Photographers</div>
            </div>
            <div class="admin-stat-card stat-card-bookings">
                <div class="admin-stat-number stat-number-bookings"><?php echo $pending_order; ?></div>
                <div class="admin-stat-label">Active Bookings</div>
            </div>
            <div class="admin-stat-card stat-card-revenue">
                <div class="admin-stat-number stat-number-revenue"><?php echo $completed_order; ?></div>
                <div class="admin-stat-label">Completed Bookings</div>
            </div>
        </div>
        

        <h3 class="admin-section-title">Recent Activity & Quick Actions</h3>
        <div class="admin-activity-grid">
            <div class="admin-activity-card">
                <h4 style="color: #2c3e50; margin-bottom: 20px;">Recent Activity</h4>
                <div class="activity-list">
                    <?php
                    $query = "SELECT * FROM orders ORDER BY book_date desc";
                    $answer = $conn->query($query);
                    if($answer->num_rows > 0){
                        while($data = $answer->fetch_assoc()){
                            echo "<div class='activity-item'>
                                    <div class='activity-icon icon-booking'>📅</div>
                                    <div class='activity-content'>
                                        <h4>New booking created</h4>
                                        <p>".$data["user_name"]." booked ".$data["photo_name"]."</p>
                                    </div>
                                    <div class='activity-time'>".$data["book_date"]."</div>
                                </div>";
                        }
                    }
                    ?>
                </div>
            </div>
            
            <div class="admin-activity-card">
                <h4 style="color: #2c3e50; margin-bottom: 20px;">Quick Actions</h4>
                <div class="quick-actions">
                    <a href="display-user.php" class="quick-action-btn">
                        <div class="action-icon action-manage-users">👥</div>
                        <div class="action-text">
                            <h4>Manage Users</h4>
                            <p>View and manage all users</p>
                        </div>
                    </a>
                    <a href="display-photographer.php" class="quick-action-btn">
                        <div class="action-icon action-manage-photographers">📸</div>
                        <div class="action-text">
                            <h4>Manage Photographers</h4>
                            <p>Verify and manage photographers</p>
                        </div>
                    </a>
                    <a href="display-booking.php" class="quick-action-btn">
                        <div class="action-icon action-manage-photographers">📅</div>
                        <div class="action-text">
                            <h4>Manage Bookings</h4>
                            <p>Verify and manage bookings</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>