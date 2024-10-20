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
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert data into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully. You can now <a href='signin.php'>sign in</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
