<?php
include "../include/db.php";
session_start();
$photographer_name = $_SESSION["Name"];
$sql = "SELECT * FROM users WHERE Name = '$photographer_name'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($data = $result->fetch_assoc()){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaptureBook - Photographer Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body style="display: flex;">
    <?php
    include "../include/sidebar.php";
    ?>
    
    <div class="profile-content">
        <div class="profile-header">
            <div class="profile-title">
                <h2><?php echo $photographer_name ?> Profile</h2>
                <p>Manage your professional information and settings</p>
            </div>
        </div>
        
        <div class="profile-grid">
            <div class="profile-card">
                <h3 class="profile-section-title">Personal Information</h3>
                <div class="profile-info">
                    <div class="profile-field">
                        <span class="profile-label">Full Name</span>
                        <span class="profile-value"><?php echo $data["Name"]; ?></span>
                    </div>
                    <div class="profile-field">
                        <span class="profile-label">Email Address</span>
                        <span class="profile-value"><?php echo $data["Email"]; ?></span>
                    </div>
                    <div class="profile-field">
                        <span class="profile-label">Phone Number</span>
                        <span class="profile-value"><?php echo $data["Phone"]; ?></span>
                    </div>
                    <div class="profile-field">
                        <span class="profile-label">Location</span>
                        <span class="profile-value"><?php echo $data["Address"];  ?></span>
                    </div>
                    <div class="profile-field">
                        <span class="profile-label">Gender</span>
                        <span class="profile-value" style="text-transform: capitalize;"><?php echo $data["Gender"]; }}?></span>
                    </div>
                </div>
            </div>
            <div class="profile-card">
                <h3 class="profile-section-title">Overview</h3>
                <div class="stats-container">
                    <div class="stat-box">
                        <div class="stat-number">156</div>
                        <div class="stat-text">Total Bookings</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">142</div>
                        <div class="stat-text">Completed Jobs</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>