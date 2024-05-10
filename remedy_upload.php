<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost"; // Change this to your database host
    $username = "your_username"; // Change this to your database username
    $password = "your_password"; // Change this to your database password
    $dbname = "db"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname,4306);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO remedies (title, description, ingredients, steps, image) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssss", $title, $description, $ingredients, $steps, $image);

    // Set parameters
    $title = $_POST['remedy-title'];
    $description = $_POST['remedy-description'];
    $ingredients = $_POST['remedy-ingredients'];
    $steps = $_POST['remedy-steps'];
    $image = ''; // Assuming image path is empty for now

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Remedy uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
