
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaptureBook - Manage Users</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body style="display: flex;">
    <?php include "admin-sidebar.php"; ?>
    <div class="users-main-content">
        <div class="users-table-container">
            <table class="users-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Gender</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../include/db.php";

                        $sql = "SELECT * FROM users WHERE `Role` = 'user'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($data = $result->fetch_assoc()){

                    ?>
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-details">
                                    <h4><?php echo $data["Name"]; ?></h4>
                                    <p>User ID: <?php echo $data["Id"]; ?></p>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $data["Email"]; ?></td>
                        <td><?php echo $data["Phone"]; ?></td>
                        <td><?php echo $data["Address"]; ?></td>
                        <td><?php echo $data["Gender"] ?></td>
                        <td><?php echo $data["Role"]?></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>