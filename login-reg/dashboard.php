<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}

// Retrieve user information from the session
$user = $_SESSION["user"];
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
        /* Add this style to remove white border */
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
            <li><a href="#" onclick="openForm()"><i class="fas fa-asterisk"></i>Risk Management</a></li>
            <!--<li><a href="#"><i class="fas fa-project-diagram"></i>Risks and Controls</a></li>-->
            <li><a href="#" onclick="loadCurrentRiskTrends()"><i class="fas fa-atom"></i>Current risk trends</a></li>
            <li><a href="#" onclick="viewSubmittedRisks()"><i class="fab fa-expeditedssl"></i> Submitted Risks</a></li>
            <li><a href="#" onclick="loadPlanMitigation()"><i class="fas fa-tasks"></i> View Mitigation</a></li>
            <li><a href="#" id="nav-reviews"><i class="fas fa-comments"></i> Reviews</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">
            <div>Welcome, <?php echo $user["full_name"]; ?></div>
            <!-- Other header content -->
        </div>  
        <div class="info" id="form-container">
            <!-- Form content will be loaded here -->
        </div>
        <div class="info" id="submitted-risks-container" style="display:none;">
            <!-- Submitted risks content will be loaded here -->
        </div>
        <div class="info" id="plan-mitigation-container" style="display:none;">
            <!-- Plan mitigation content will be loaded here -->
        </div>
        <div class="info" id="approved-mitigation-container" style="display:none;">
            <!-- Approved mitigation plans content will be loaded here -->
        </div>
        <div class="info" id="review-table-container" style="display:none;">
            <!-- Risk Review Table content will be loaded here -->
        </div>
        <div class="info" id="home-container">
            <!-- Home content will be loaded here -->
            <div class="info" id="home-content">
                    <h1>Risk Management System</h1>
                    <p>Welcome to our Cyber Security Risk Management System. We provide innovative solutions to help organizations identify, assess, and mitigate cyber security risks effectively.</p>
                    <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <h3>Risk Management</h3>
                <p>Our system helps you input potential risks from within your organisation's network.</p>
            </div>
            <div class="feature">
                <i class="fas fa-tasks"></i>
                <h3>Mitigation Planning</h3>
                <p>Plan and implement mitigation strategies to reduce the likelihood and impact of cyber security incidents.</p>
            </div>
           
    </div>
</div>
        </div>
        <!-- Content about the risk management system -->
        
    </div>
</div>


<script>
    // JavaScript function to load the home content
    function loadhome() {
        // Hide other containers if visible
        $("#form-container, #submitted-risks-container, #plan-mitigation-container, #approved-mitigation-container, #review-table-container").hide();
        // Show the home container
        $("#home-container").show();
    }
    // JavaScript to handle opening/closing the form and loading content
    function openForm() {
        // Load form content using jQuery
        $("#form-container").load("form.php");
        // Display the form container
        document.getElementById("form-container").style.display = "block";
        // Hide other containers if visible
        document.getElementById("submitted-risks-container").style.display = "none";
        document.getElementById("plan-mitigation-container").style.display = "none";
        document.getElementById("approved-mitigation-container").style.display = "none";
        document.getElementById("review-table-container").style.display = "none"; // Hide review table container
        document.getElementById("home-container").style.display = "none";
    }

     // JavaScript function to load the Risk Review Table
     function loadRiskReviewTable() {
        // Load Risk Review Table content using jQuery
        $("#review-table-container").load("review-table.php", function() {
            // Display the Risk Review Table container
            $("#review-table-container").show();
            // Hide other containers if visible
            $("#form-container, #submitted-risks-container, #plan-mitigation-container, #approved-mitigation-container, #home-container").hide();
        });
    }

    // JavaScript to handle opening/closing the submitted risks
    function viewSubmittedRisks() {
        // Load submitted risks content using jQuery
        $("#submitted-risks-container").load("view-submitted-risks.php");
        // Display the submitted risks container
        document.getElementById("submitted-risks-container").style.display = "block";
        // Hide other containers if visible
        document.getElementById("form-container").style.display = "none";
        document.getElementById("plan-mitigation-container").style.display = "none";
        document.getElementById("approved-mitigation-container").style.display = "none";
        document.getElementById("review-table-container").style.display = "none"; // Hide review table container if it's visible
        document.getElementById("home-container").style.display = "none";
    }

    // JavaScript function to load approved mitigation
    function loadPlanMitigation() {
        // Load approved mitigation content using jQuery
        $("#plan-mitigation-container").load("view-mitigation.php");
        // Display the plan mitigation container
        document.getElementById("plan-mitigation-container").style.display = "block";
        // Hide other containers if visible
        document.getElementById("form-container").style.display = "none";
        document.getElementById("submitted-risks-container").style.display = "none";
        document.getElementById("approved-mitigation-container").style.display = "none";
        document.getElementById("review-table-container").style.display = "none"; // Hide review table container if it's visible
        document.getElementById("home-container").style.display = "none";
    }

    function loadCurrentRiskTrends() {
        // Load current risk trends content using jQuery
        $("#form-container").load("current-risk-trends.php");
        // Hide submitted risks, plan mitigation, and approved mitigation containers if visible
        document.getElementById("submitted-risks-container").style.display = "none";
        document.getElementById("plan-mitigation-container").style.display = "none";
        document.getElementById("approved-mitigation-container").style.display = "none";
        document.getElementById("form-container").style.display = "block";
        document.getElementById("review-table-container").style.display = "none"; // Hide review table container if it's visible
        document.getElementById("home-container").style.display = "none";
    }

    // Call the function to load Risk Review Table when the Reviews link is clicked
    $(document).ready(function() {
        $("#nav-reviews").click(function() {
            loadRiskReviewTable();
        });
    });
</script>



<script>
    // Function to load approved mitigation plans content
    function loadApprovedMitigation() {
        // Load approved mitigation content using jQuery AJAX
        $("#approved-mitigation-container").load("get-approved-mitigation.php");
        // Display the approved mitigation container
        $("#approved-mitigation-container").show();
        // Hide other containers if visible
        $("#submitted-risks-container, #form-container, #plan-mitigation-container, #home-container").hide();
    }

    // Function to toggle the visibility of the approved mitigation container
    function toggleApprovedMitigation() {
        // Toggle visibility of the approved mitigation container
        $("#approved-mitigation-container").toggle();
        // Hide other containers if visible
        $("#submitted-risks-container, #form-container, #plan-mitigation-container, #home-container").hide();
    }

    $(document).ready(function() {
        // Event handler for the "Approved Mitigation" link click
        $("#btn-approved-mitigation").click(function() {
            loadApprovedMitigation(); // Load approved mitigation plans content
        });

        // Event handler for toggling the visibility of the approved mitigation container
        $("#btn-toggle-approved-mitigation").click(function() {
            toggleApprovedMitigation(); // Toggle visibility of the approved mitigation container
        });
    });
</script>
</body>
</html>