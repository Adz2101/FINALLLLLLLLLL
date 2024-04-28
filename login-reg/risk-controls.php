<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Current risk trends</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eff5fb; /* Light powder blue background color */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* White background color for the container */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle effect */
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden; /* Hide overflow content */
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2; /* Light gray background color for table headers */
        }
        td {
            background-color: #fff; /* White background color for table data cells */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Alternate row background color */
        }
        tr:hover {
            background-color: #f0f0f0; /* Hover row background color */
        }
        p {
            margin-bottom: 20px;
        }
        a {
            color: #007bff; /* Blue color for links */
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Current Risks</h2> 
    
    <?php
    // Check if the risk label is set in the URL parameters
    if (isset($_GET['risk'])) {
        // Define the risk details array
        $risk_details = array(
            "Insider threat" => array(
                "Definition" => "An insider threat is a security risk that originates from within the organization.",
                "Detection Method" => "Continuous monitoring of employee activities, access logs, and behavior analytics.",
                "Prevention Strategies" => "Implement strict access controls, conduct regular security training, and establish whistleblower programs."
            ),
            "Ransomware Attacks" => array(
                "Definition" => "Ransomware attacks are malicious software that encrypts files and demands ransom for decryption.",
                "Detection Method" => "Use of antivirus software, network intrusion detection systems, and security audits.",
                "Prevention Strategies" => "Regular data backups, employee training on phishing awareness, and software patching."
            ),
            "IOT Attacks" => array(
                "Definition" => "IoT attacks target vulnerabilities in connected devices to gain unauthorized access or disrupt operations.",
                "Detection Method" => "Implementing network segmentation, using intrusion detection systems (IDS), and monitoring device behavior.",
                "Prevention Strategies" => "Regular firmware updates, strong authentication mechanisms, and encryption of IoT data."
            ),
            "Data breaches" => array(
                "Definition" => "Data breaches involve unauthorized access to sensitive information, leading to its exposure or theft.",
                "Detection Method" => "Monitoring network traffic, implementing data loss prevention (DLP) tools, and conducting security audits.",
                "Prevention Strategies" => "Encryption of sensitive data, access control measures, and employee training on data protection."
            ),
            "Phishing" => array(
                "Definition" => "Phishing is a type of cyber attack that uses deceptive emails or messages to trick users into revealing sensitive information.",
                "Detection Method" => "Email filtering, phishing simulations, and user awareness training.",
                "Prevention Strategies" => "Implementing multi-factor authentication (MFA), verifying URLs and sender identities, and regular security updates."
            ),
            "Cloud attacks" => array(
                "Definition" => "Cloud attacks target vulnerabilities in cloud services or infrastructure to gain unauthorized access or disrupt operations.",
                "Detection Method" => "Cloud security monitoring, logging, and anomaly detection.",
                "Prevention Strategies" => "Implementing strong access controls, encryption of data in transit and at rest, and regular security assessments."
            ),
            "Supply Chain Attacks" => array(
                "Definition" => "Supply chain attacks exploit vulnerabilities in third-party vendors or partners to gain access to a target organization's systems.",
                "Detection Method" => "Supplier risk assessments, monitoring third-party connections, and security audits.",
                "Prevention Strategies" => "Establishing secure procurement practices, vendor security evaluations, and contractual security requirements."
            ),
            "Zero-Day Exploits" => array(
                "Definition" => "Zero-day exploits target vulnerabilities that are unknown to software vendors, making them susceptible to attack.",
                "Detection Method" => "Network traffic analysis, intrusion detection systems (IDS), and threat intelligence feeds.",
                "Prevention Strategies" => "Regular software updates and patch management, intrusion prevention systems (IPS), and sandboxing of suspicious files."
            ),
            "Distributed Denial of Service (DDoS) Attacks" => array(
                "Definition" => "DDoS attacks flood network resources or services, causing disruption or denial of service to legitimate users.",
                "Detection Method" => "DDoS mitigation tools, traffic analysis, and monitoring for abnormal traffic patterns.",
                "Prevention Strategies" => "Implementing DDoS protection solutions, network redundancy, and rate limiting."
            ),
            "SQL Injection" => array(
                "Definition" => "SQL injection attacks exploit vulnerabilities in web applications' SQL queries, allowing attackers to execute malicious SQL commands.",
                "Detection Method" => "Web application firewalls (WAFs), code reviews, and input validation.",
                "Prevention Strategies" => "Using parameterized queries, input sanitization, and least privilege access."
            ),
            // Add details for other risk labels as needed
        );

        // Get the selected risk label from the URL parameters
        $selected_risk = $_GET['risk'];

        // Check if the selected risk label exists in the risk details array
        if (array_key_exists($selected_risk, $risk_details)) {
            echo "<p>Selected Risk Label: $selected_risk</p>";
            echo "<h3>$selected_risk</h3>";
            echo "<table>";
            foreach ($risk_details[$selected_risk] as $key => $value) {
                echo "<tr><th>$key</th><td>$value</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No information available for the selected risk</p>";
        }
    } else {
        echo "<p>Error: Risk label not specified</p>";
    }
    ?>

    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>