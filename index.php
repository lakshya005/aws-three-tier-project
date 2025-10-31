<?php
// --- !! IMPORTANT !! ---
// This is the sample application code for the 3-Tier Web App.
// The database credentials have been replaced with placeholders for security.

$db_endpoint = "YOUR_DB_ENDPOINT_PLACEHOLDER"; 
$db_username = "admin";
$db_password = "YOUR_DB_PASSWORD_PLACEHOLDER";
$db_name = "information_schema"; // A default DB to test connection

echo "<html><body style='font-family: Arial, sans-serif; text-align: center;'>";
echo "<h1>Welcome to the Application Tier!</h1>";
echo "<p>This page is served from a private EC2 instance.</p>";

// Try to connect to the database
@$conn = new mysqli($db_endpoint, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    echo "<h2>Database Connection: <span style='color:red;'>FAILED</span></h2>";
    echo "<p>Error: " . $conn->connect_error . "</p>";
    echo "<p><i>(This indicates the application server cannot reach the database. Check security groups and network routing.)</i></p>";
} else {
    echo "<h2>Database Connection: <span style='color:green;'>SUCCESSFUL!</span></h2>";
    echo "<p>Successfully connected to the RDS database at: " . $db_endpoint . "</p>";
}
echo "</body></html>";
@$conn->close();
?>
