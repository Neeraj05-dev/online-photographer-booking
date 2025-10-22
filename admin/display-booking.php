
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
                        <th>Photographer</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Booked</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../include/db.php";

                        $sql = "SELECT * FROM orders";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($data = $result->fetch_assoc()){

                    ?>
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-details">
                                    <h4><?php echo $data["user_name"]; ?></h4>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $data["photo_name"]; ?></td>
                        <td><?php echo $data["from_date"]; ?></td>
                        <td><?php echo $data["to_date"]; ?></td>
                        <td><?php echo $data["book_date"] ?></td>
                        <td><?php echo $data["status"]?></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>