<?php
session_start();
if (!isset($_SESSION["admin"])) {
   header("Location: login.php");
}

// Database connection
require_once "database.php";

// Fetch users from the database
$sql = "SELECT full_name, email FROM users";
$result = mysqli_query($conn, $sql);

// Check if any users are found
if ($result && mysqli_num_rows($result) > 0) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $users = array();
}

?>
<html>
    <head>
    <style>
        /* CSS to center the table */
        .table-container {
            margin: 0 auto; /* This centers the container horizontally */
            width: 50%; /* Adjust the width as needed */
        }

        table {
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    </head>
<body>
<div class="table-container">
<table border='1'>
<tr><th>User</th><th>Email</th>
</tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['full_name']; ?></td>
                <td><?php echo $user['email']; ?></td>
            </tr>
        <?php endforeach; ?>
</table>
</div>
</body>
</html>