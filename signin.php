<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP (leave empty)
$dbname = "user_auth";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($pass, $row['password'])) {
            echo "Welcome, " . $user . "!";
            // Here, you can set session variables or redirect the user to another page
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>
