<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin'])!=true){
        header("location:login.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   <style>

.view-more-btn1 {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
            margin-left: 600px;
          }
        
          /* Change button color on hover */
          .view-more-btn1:hover {
            background-color: #45a049;
          }
   </style>

</head>
  <body>
  <?php
    include "navbar.php";
    ?>
    <br><br><br>
    <div id="form">
        
       <h1><a class="nav-link" href="http://localhost:3000/HomePage.html">
          <button>Welcome</button></a>

        
        <?php echo $_SESSION['username']; 
          ?>
         <a class="nav-link" href="http://localhost:3000/myprofile.html"><button >My Profile</button></a>
        </h1>
        

        <div>

    <button class="view-more-btn1" style="margin-left: 100px;">
      <a  href="http://localhost:3000/upload_remedy.html" style="color: black;">Upload Remedy</a></button>

      <button class="view-more-btn1" style="margin-left: 100px;">
      <a  href="http://localhost:3000/a.php" style="color: black;">Doctor</a></button>
    </div>

    </div>
    
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>