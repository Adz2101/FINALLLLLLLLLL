<?php
include_once "database.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve data from $_POST array
    $risk_id = $_POST['risk_id'];
    $status = $_POST['status'];

    // Escape special characters and prevent SQL injection
    $status = mysqli_real_escape_string($conn, $status);

    // Prepare and execute SQL statement to update status
    $update_query = "UPDATE message SET status = '$status' WHERE m_id = '$risk_id'";
    if (mysqli_query($conn, $update_query)) {
        // Status updated successfully
        echo "Status updated successfully. Redirecting...";
        header("Refresh:2; url=dashboard.php"); // Redirect to dashboard after 2 seconds
        exit();
    } else {
        // Error occurred while updating status
        echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
    }

   }
else {
   echo " <h1> hello </h1>";
}
?> 