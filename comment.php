<?php
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    // Get username and comment from the form
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    // Insert the comment into the database
    $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
    if ($conn->query($sql) === TRUE) {
        // Comment inserted successfully
        // Redirect back to the same page to prevent form resubmission
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch existing comments from the database
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);
$comments = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remedy Comments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="header1.css">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
            overflow: hidden;
            background-image: url('images/back 5.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            /* Prevent scrolling during animation */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.5s ease;

            background-image: url('images/back 4.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            /* Apply animation to container */
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c4f70;
        }

        .comment-form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            resize: vertical;
        }

        .comment-form button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            background-color: #2c4f70;
            color: #fff;
            transition: background-color 0.3s;
            margin-left: 10px;
        }

        .comment-form button:hover {
            background-color: #79f083;
        }

        .comments {
            margin-top: 10px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .comment {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .comment:hover {
            transform: translateY(-3px);
        }

        .comment p {
            margin: 5px 0;
        }

        .comment p strong {
            color: #2c4f70;
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
                    <a class="nav-link" href="health_tips.html">Health Tips</a>
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
    <!-- Header content -->

    <div class="container">
        <h1>Remedy Comments</h1>
        <div class="comment-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="username" value="Abc"> <!-- Assuming the username is hardcoded -->
                <textarea name="comment" placeholder="Write your comment..." rows="4"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="comments">
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p><strong><?php echo $comment['username']; ?>:</strong> <?php echo $comment['comment']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Script content -->
</body>

</html>
