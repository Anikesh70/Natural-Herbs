<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Image</title>
</head>
<body>
    <?php
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

    // Fetch image data from database
    if(isset($_GET['id'])) {
        // Get the image ID from the URL parameter
        $imageId = $_GET['id'];
        
        // Prepare SQL statement to fetch image data
        $sql = "SELECT image_data FROM images WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters and execute query
        $stmt->bind_param("i", $imageId);
        $stmt->execute();
        
        // Get result
        $result = $stmt->get_result();
        
        // Check if result contains data
        if ($result->num_rows > 0) {
            // Fetch image data from the result
            $row = $result->fetch_assoc();
            // Set appropriate content type header
            header("Content-type: 10th"); // Adjust content-type based on the image type
            // Output the image data
            echo $row['image_data'];
        } else {
            // If no image found with the provided ID, display error message
            echo "Image not found.";
        }
    } else {
        // If no image ID provided in the URL, display error message
        echo "No image ID provided.";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
