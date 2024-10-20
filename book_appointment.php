<?php
// Database connection
$host = 'localhost';
$db = 'webpr_db';
$user = 'root'; // Use your MySQL username
$pass = '';     // Use your MySQL password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    // Insert data into the appointments table
    $sql = "INSERT INTO appointments (first_name, last_name, address, phone_number) 
            VALUES ('$first_name', '$last_name', '$address', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
