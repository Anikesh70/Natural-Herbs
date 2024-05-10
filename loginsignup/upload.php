<?php
// Check if the form was submitted
if(isset($_POST["submit"])) {
    // Database connection
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname,4306);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare image data
    $imageName = $_FILES["image"]["name"];
    $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

    // Insert image data into database
    $stmt = $conn->prepare("INSERT INTO images (image_name, image_data) VALUES (?, ?)");
    $stmt->bind_param("sb", $imageName, $imageData);
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();

    echo "Image uploaded successfully.";
}
?>
