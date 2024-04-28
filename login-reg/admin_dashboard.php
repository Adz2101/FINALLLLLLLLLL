<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

// You can retrieve admin information from the session if needed
$admin = $_SESSION["admin"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Risk Management System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
       
        .wrapper {
            border: none; /* Remove border */
        }
    </style>
    <style>
    /* Add CSS styles for the home content */
    #home-content {
        background-color: #f0f0f0; /* Light gray background color */
        padding: 20px; /* Add padding */
        border-radius: 10px; /* Add rounded corners */
        margin-top: 20px; /* Add margin at the top */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add box shadow */
    }

    .feature {
        margin-bottom: 20px; /* Add margin between features */
        padding: 20px; /* Add padding */
        border: 1px solid #ccc; /* Add border */
        border-radius: 10px; /* Add rounded corners */
        background-color: #fff; /* White background color */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow */
    }

    .feature i {
        font-size: 36px; /* Increase icon size */
        margin-bottom: 10px; /* Add margin below icon */
    }

    .feature h3 {
        color: #007bff; /* Blue color for feature titles */
        margin-bottom: 10px; /* Add margin below title */
    }

    .feature p {
        color: #666; /* Dark gray color for feature descriptions */
    }
</style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Risk Management System</h2>
        <ul>
            <li><a href="#" onclick="loadhome()"><i class="fas fa-home"></i>Home</a></li>
            <!-- <li><a href="#"><i class="fas fa-bahai"></i>Overview</a></li> -->
            <li><a href="#" onclick="viewSubmittedRisks()"><i class="fab fa-expeditedssl"></i> Submitted Risks</a></li>
            <li><a href="#" onclick="loadControls()"><i class="fas fa-atom"></i>Controls</a></li>
            <li><a href="#" onclick="viewreviews()" id="nav-reviews"><i class="fas fa-comments"></i> Reviews</a></li>
            <li><a href="#" onclick="usermanagement()" id="nav-user-management"><i class="fas fa-users-cog"></i>User Management</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
    <div class="main_content">
        <div class="header">
            <div>Welcome, <?php echo $admin["username"]; ?></div>
            <!-- Other header content -->
        </div>
        <div class="info" id="content-container">
            <!-- Content will be loaded here -->
        </div>
        <div id="user-management-content">
             <!-- Content will be loaded here -->
        </div>
        <div class="info" id="home-container">
            <!-- Risk Review Table content will be loaded here -->
            <div class="info" id="home-content">
                    <h1>Risk Management System</h1>
                    <p>Welcome to our Cyber Security Risk Management System. We provide innovative solutions to help organizations identify, assess, and mitigate cyber security risks effectively.</p>
                    <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <h3>Risk Management</h3>
                <p>Our system helps you input potential risks within your organisation's network.</p>
            </div>
            <div class="feature">
                <i class="fas fa-tasks"></i>
                <h3>Mitigation Planning</h3>
                <p>Plan and implement mitigation strategies to reduce the likelihood and impact of cyber security incidents.</p>
            </div>
    </div>
</div>

<script>
    // JavaScript function to load the home content
    function loadhome() {
        // Hide other containers if visible
        $("#content-container, #user-management-content").hide();
        // Show the home container
        $("#home-container").show();
    }

    // JavaScript to handle opening/closing the submitted risks
    function viewSubmittedRisks() {
        // Load submitted risks content using jQuery
        $("#content-container").load("view-submitted-risks.php");
        document.getElementById("home-container").style.display = "none";
        $("#content-container").show();
    }

    // Function to load controls.php content
    function loadControls() {
        // Load controls.php content using jQuery
        $("#content-container").load("controls.php");
        document.getElementById("home-container").style.display = "none";
        $("#content-container").show();
    }
// JavaScript to handle opening/closing the submitted risks
function viewreviews() {
        // Load submitted risks content using jQuery
        $("#content-container").load("display-reviews.php");
        document.getElementById("home-container").style.display = "none";
        $("#content-container").show();
    }

// JavaScript to handle opening/closing the submitted risks
function usermanagement() {
        // Load submitted risks content using jQuery
        $("#content-container").load("user-management.php");
        document.getElementById("home-container").style.display = "none";
        $("#content-container").show();
    }
    // JavaScript to handle loading User Management content
/*$(document).ready(function () {
    // Event listener for the User Management link click
    $("#nav-user-management").click(function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Load User Management content using AJAX
        $("#user-management-content").load("user-management.php");
    });
});*/

</script>

<script>
    $(document).ready(function () {
        // Event handler for the "Approve Mitigation" button click
        $(document).on("click", ".btn-approve-mitigation", function () {
            // Get the risk ID associated with the clicked button
            var riskId = $(this).data("risk-id");

            // Send an AJAX request to approve-mitigation.php
            $.ajax({
                url: "approve-mitigation.php?risk_id=" + riskId,
                type: "GET",
                success: function (response) {
                    // Display the response message (if needed)
                    alert(response);
                    // Optionally, you can refresh the submitted risks section
                    viewSubmittedRisks();
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

</body>
</html>
