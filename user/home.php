<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaptureBook - Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <style>
        body {
            background: whitesmoke;
            min-height: 100vh;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="home-container">
        <div class="header">
            <div class="logo">
                <h1>Captura</h1>
                <p>Welcome To Our System !</p>
            </div>
            
            <div class="user-info">
                <div class="avatar"><?php session_start(); $name = $_SESSION["Name"]; echo $name[0];?></div>
                <div class="user-details">
                    <h3><?php echo $name; ?></h3>
                </div>
                <form action="logout.php" method="post">
                    <button class="logout-btn" type="submit">Logout</button>
                </form>
            </div>
        </div>
        
        <div class="flex-container">
            <div class="profile-section">
                <h2 class="section-title">My Profile</h2>
                <div class="profile-details">
                    <?php
                        include "../include/db.php";
                        $sql = "SELECT * FROM users WHERE Name = '$name'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($data = $result->fetch_assoc()){
                                echo "<p><span class='profile-label'>Name:</span> <span class='profile-value'>".$data["Name"]."</span></p>
                                      <p><span class='profile-label'>Email:</span> <span class='profile-value'>".$data["Email"]."</span></p>
                                      <p><span class='profile-label'>Phone:</span> <span class='profile-value'>".$data["Phone"]."</span></p>
                                      <p><span class='profile-label'>Gender:</span> <span class='profile-value'>".$data["Gender"]."</span></p>
                                      <p><span class='profile-label'>Address:</span> <span class='profile-value'>".$data["Address"]."</span></p>
                                      <p><span class='profile-label'>Status:</span> <span class='profile-value'></span>Active</p>";
                            }
                            
                        }
                        else{
                                echo "<p><span class='profile-label'>Name:</span> <span class='profile-value'>Unable To Show Your Data</span></p>";
                        }
                    ?>
                </div>
            </div>
            
            <div class="photographers-section">
                <h2 class="section-title">Available Photographers</h2>
                <div class="photographer-list">
                    <?php
                    $sql1 = "SELECT * FROM users WHERE Role = 'photographer' ORDER BY rand()";
                    $answer = $conn->query($sql1);
                    if($answer->num_rows > 0){
                        while($row = $answer->fetch_assoc()){
                            $photo_name = "".$row["Name"]."";
                            $first_letter = $photo_name[0];
                            echo "<div class='photographer-card'>
                                    <div class='photographer-avatar'>$first_letter</div>
                                    <div class='photographer-name'>".$row["Name"]."</div>
                                    <div class='photographer-specialty'>".$row["Phone"]."</div>
                                    <form action='book-form.php' method='post'>
                                    <input type='hidden' value='".$row["Name"]."' name='photo-name'>
                                    <button type='submit' class='book-btn'>Book Photographer</button>
                                    </form>
                                  </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>