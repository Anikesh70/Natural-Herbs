<?php
// Check if the rating is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rating'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname,4306);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the rating value
    $rating = $_POST['rating'];

    // Insert the rating into the database
    $sql = "INSERT INTO ratings (rating) VALUES ($rating)";
    if ($conn->query($sql) === TRUE) {
        echo "Rating submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Redirect if the rating is not submitted
    header("Location: rating.php");
    exit();
}
?>

