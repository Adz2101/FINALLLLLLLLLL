<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$userName = $_SESSION["user"]["full_name"];
$userEmail = $_SESSION["user"]["email"];

// Retrieve user ID from session
/*if (isset($_SESSION["user"]["id"])) {
    $user_id = $_SESSION["user"]["id"];
} else {
    // Handle the case when user ID is not set
    // For example, redirect the user to the login page
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION["user"]["id"];
*/
$subject = $_POST["subject"];
$category = $_POST["category"];
$riskMapping = $_POST["riskMapping"];  
$currentImpact = $_POST["currentImpact"];
$currentlikelihood = $_POST["currentlikelihood"];
$risksource = $_POST["risksource"];
$controlregulation = $_POST["controlregulation"];
$controlno = $_POST["controlno"];
$scoringmethod = $_POST["scoringmethod"];
$owner = $_POST["owner"];
$ownermanager=$_POST["ownermanager"];



$host = "localhost";
$dbname = "login_register";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}
$sql = "SELECT id FROM users WHERE full_name = ? and email = ?";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    // Bind parameter
    mysqli_stmt_bind_param($stmt, "ss", $userName, $userEmail);
    
    // Execute SQL statement
    if (mysqli_stmt_execute($stmt)) {
        // Get the result set
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
        //echo "$risk_id";
        //echo"$message_id";
    }       
}

// Corrected SQL query to match column names in the database table
$sql = "INSERT INTO message (user_id, subject, category, riskMapping, currentImpact, currentlikelihood, risksource, controlregulation, controlno, scoringmethod, owner, ownermanager)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "isssssssssss",
    $user_id,
    $subject,
    $category,
    $riskMapping,
    $currentImpact,
    $currentlikelihood,
    $risksource,
    $controlregulation,
    $controlno,
    $scoringmethod,
    $owner,
    $ownermanager
);

mysqli_stmt_execute($stmt);
// Close the statement
mysqli_stmt_close($stmt);

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1;url=dashboard.php">
    <title>Record Saved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <h2>Record Saved</h2>
    <p>Redirecting to the dashboard</p>

</body>
</html>