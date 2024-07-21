<?php
// Check if the form is submitted
echo "Purchase successful. Thank you, $username!";
if ($_SERVER[ "REQUEST_METHOD" ] == "POST") {
    // Validate username (you can add more validation as needed)
    $username = trim($_POST[ "username" ]);

    // Basic validation example (you can expand this with more checks)
    if (empty($username)) {
        die("Username is required.");
    }

    echo "Purchase successful. Thank you, $username!";

    // Process the username (for example, store it in a database)
    // Replace this with your actual database connection and logic
    // Example: Connecting to a MySQL database
    $servername = "localhost";
    $username_db = "your_username";
    $password_db = "your_password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape username to prevent SQL injection
    $username_safe = $conn->real_escape_string($username);

    // Prepare SQL statement to insert username into a hypothetical table `purchases`
    $sql = "INSERT INTO purchases (username) VALUES ('$username_safe')";

    if ($conn->query($sql) === TRUE) {
        echo "Purchase successful. Thank you, $username!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
else {
    // Redirect to the product sales page if accessed directly without POST request
    header("Location: index.html");
    exit();
}
?>