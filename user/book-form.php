<?php
session_start();
$user_name = $_SESSION["Name"];
$photographer_name = $_POST["photo-name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura - Book Photographer</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>
<body class="body">
    <div class="booking-container">
        <div class="logo">
            <h1>Captura</h1>
            <p>Book Your Photographer</p>
        </div>
        
        <form action="book-order.php" method="post">
            <div class="form-group">
                <label for="photographer-name">Photographer Name</label>
                <input type="text" name="photographer-name" value="<?php echo $photographer_name; ?>" readonly>
            </div>
            
            <div class="form-group">
                <label for="user-name">Your Name</label>
                <input type="text" id="user-name"  name="user-name" value="<?php echo $user_name; ?>" readonly>
            </div>
            
            <div class="form-group">
                <label for="from-date">From Date</label>
                <input type="date" id="from-date" name="from-date" required>
            </div>
            
            <div class="form-group">
                <label for="to-date">To Date</label>
                <input type="date" id="to-date" name="to-date" required>
            </div>
            
            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="contact-confirmation" required>
                    <label for="contact-confirmation">I confirm that I have talked to the photographer and discussed the requirements</label>
                </div>
            </div>
            
            <button type="submit" class="book-btn">Book Now</button>
        </form>
        
        <div class="links">
            <a href="home.php">Back to Home</a>
            <a href="order-history.php">View My Bookings</a>
        </div>
    </div>
</body>
</html>