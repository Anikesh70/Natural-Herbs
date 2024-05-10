
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remedy Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="header1.css">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/back 5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .remedy-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
            width: 600px;
            /* Smaller width */
            height: 600px;
            align-items: center;
            /* Increased height */
            transition: transform 0.3s ease;
            margin-left: 450px;
            /* Add transition for hover effect */
            background-image: url('images/back 4.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .remedy-container:hover {
            transform: translateY(-5px);
            /* Move container up on hover */
        }

        .remedy-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .remedy-info {
            margin-bottom: 10px;
        }

        .remedy-description {
            margin-bottom: 20px;
        }

        .button-container {
            text-align: center;
        }

        .grant-btn,
        .reject-btn {
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
            transition: transform 0.2s ease;
            /* Add transition for button hover effect */
        }

        .grant-btn:hover,
        .reject-btn:hover {
            transform: translateY(-3px);
            /* Move button up on hover */
        }

        .grant-btn {
            background-color: #4caf50;
            color: white;
        }

        .reject-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>
    <!--------------------------------------Header start----------------------------------------->
    <header class="container-fluid header-container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">

                <h1 class="brand-title">Natural Herbs</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <nav class="nav">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#">Remedies</a>
                    <a class="nav-link" href="#">Community</a>
                    <a class="nav-link" href="about_us.html">About</a>
                    <!--<button class="btn btn-primary">Get Started</button>-->
                </nav>
                <a href="#" class="profile-image">
                    <img src="images/profile1.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                </a>


            </div>
        </div>
        <div></div>
    </header>
    <!------------------------------------------Header end----------------------------------------------->


    <h1 style="text-align: center;">Remedy Review</h1>

    <div class="remedy-container" id="remedy1">
        <div class="remedy-title">Remedy Name</div>
        <!-- <div class="remedy-info">
            <h3>Used Ingredients:</h3> Ingredient 1, Ingredient 2, Ingredient 3
        </div>
        <div class="remedy-description">
            <h3>Description of About:</h3>Description of the remedy uploaded by the woman.
        </div> -->

       <!-- ------------------------------ -->
       <?php
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

// Fetch data from database
$sql = "SELECT * FROM remedies";
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. "<br>";
        echo "Description: " . $row["description"]. "<br>";
        echo "Ingredients: " . $row["ingredients"]. "<br>";
        echo "Steps: " . $row["steps"]. "<br>";
        echo "Image: <img src='" . $row["image"]. "' alt='Remedy Image'><br><br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>





        <div class="button-container">
            <button class="grant-btn" onclick="grantRemedy('remedy1')">Grant</button>
            <button class="reject-btn" onclick="rejectRemedy('remedy1')">Reject</button>
        </div>
    </div>

    <script>
        function grantRemedy(remedyId) {
            var remedyDiv = document.getElementById(remedyId);
            remedyDiv.style.transform = "scale(0)"; // Shrink the container using CSS transform
            var newPageUrl = "HomePage.html"; // Change this to the URL of the page where you want to add the granted remedy
            setTimeout(function () {
                window.location.href = newPageUrl; // Redirect after animation
            }, 300); // Set timeout to match the duration of the animation
        }

        function rejectRemedy(remedyId) {
            var remedyDiv = document.getElementById(remedyId);
            remedyDiv.style.opacity = "0"; // Fade out the container using CSS opacity
            setTimeout(function () {
                remedyDiv.remove(); // Remove the container from the DOM after animation
            }, 300); // Set timeout to match the duration of the animation
            // Additionally, you might want to send an AJAX request to delete the remedy from the server/database
        }

    </script>
</body>

</html>
