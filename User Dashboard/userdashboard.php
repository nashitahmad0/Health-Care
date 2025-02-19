<?php
// Start the session to access session variables
session_start();

// Check if user is logged in, if not redirect to login page
if(!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}

// Retrieve user data from session or database
// You can retrieve the user's data from the session variables or query the database again to get the latest data

// Check if logout button is clicked
if(isset($_POST["logout"])) {
    // Destroy the session and redirect to login page
    session_destroy();
    header("Location: login.php");
    exit;
}
// Display user profile information
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Health Care Dashboard">
    <meta name="keywords" content="healthcare, dashboard, user profile">
   
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
 integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Document</title>
    <style>
 /**header start*/
 .header-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;

  }
  

  .logo {
    width: 50px;
    height: auto;
    margin-right: 10px;

  }

  /*header end*/


  /*Navigation bar start*/
  .navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
  }

  .navbar-nav .nav-link {
    font-size: 1.2rem;
  }
  
  .btn:hover{
    background-color: #0056b3;
  }

  /* navigation bar end*/
  .container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.container h1 {
    color: forestgreen;
    margin-bottom: 20px;
}

p {
    font-size: 18px;
}

  /* footer start*/

  .footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  }
  /*footer end*/
  /** Responsive design **/
  @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                text-align: center;
            }

            .logo {
                margin-bottom: 10px;
            }

            .navbar-nav .nav-link {
                font-size: 1rem;
            }

            .container {
                padding: 20px;
            }

            .container h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>

        <div class="header-container">
          <img class="logo" src="./images/logo.jpg" alt="Health Care Logo">
          <i>
            <h1>Health Care</h1>
          </i>
          <p><b>Swasthya ka Saathi, Aapke Har Kadam Mein</b></p>
      </header>
      <!-- nav bar starting -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active  mr-4">
              <a class="nav-link" href="./userdashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active mr-4">
              <a class="nav-link" href="./userprofile.php">Profile </a>
            </li>
           
            <li class="nav-item active mr-4">
              <a class="nav-link " href="./booking.php">Appointment</a>
            </li>
          </ul>
          <ul class="nav navbar-nav ml-auto mr-4">
            <form method="post">
              <button type="submit" class="btn btn-success" name="logout">Logout</button>
          </form>
          </ul>
        </div>
      </nav>
      <!-- nav bar Ending -->

      <div class="container">
        <h1>Welcome to Health Care Dashboard</h1>
        <hr>
        <p>Dear [User],</p>
        <p>We're glad to have you on board! Here, you can manage your health appointments,  and explore various healthcare services.</p>
        <p>If you have any questions or need assistance, feel free to reach out to our support team.</p>
        <p>Wishing you good health and wellness,</p>
        <p> - The Health Care Team</p>
     </div>
        
       
 

    <!-- footer start-->
  <footer class="footer">
    &copy; 2025 Health Care. All rights reserved.
  </footer>
  <!-- footer end-->

  <!-- Optional JavaScript; choose one of the two! -->
  <script src="script.js"></script>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
</body>
</html>