<?php
include_once "database.php";
$sql = "SELECT m.*, u.full_name FROM message m JOIN users u ON m.user_id = u.id";
$stmt = mysqli_prepare($conn, $sql);
if (mysqli_stmt_execute($stmt)) {
    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Check if any risks are found
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>User</th><th>Subject</th><th>Category</th><th>Risk Mapping</th><th>Status</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['full_name']}</td>";
            echo "<td>{$row['subject']}</td>";
            echo "<td>{$row['category']}</td>";
            echo "<td>{$row['riskMapping']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No submitted risks found</p>";
    }
} else {
    // Error executing the SQL statement
    echo "Error: " . mysqli_error($conn);
}

// Close the prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>