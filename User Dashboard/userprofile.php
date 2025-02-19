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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
 integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>User Dashboard</title>
    <style>
        */*header start*/
.header-container {
   display: flex;
   justify-content: center;
   align-items: center;
   padding: 15px;
   background-color: #fff;

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

   /* Container styling */
  .container {
     margin: 30px auto;
     padding: 20px;
     background-color: #f8f9fa;
     border-radius: 8px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

  h2 {
     text-align: center;
     color: forestgreen;
     text-shadow: #333;
        }

  .profile-info p {
     font-size: 1.1rem;
     margin: 10px 0;
        }

  .profile-info strong {
      color: #0056b3;
        }

  .footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}
/* Responsive design */
@media (max-width: 768px) {
            .header-container {
                flex-direction: column;
            }
            .logo {
                margin-bottom: 10px;
            }
            .navbar-nav .nav-link {
                font-size: 1rem;
            }
            .container {
                margin: 20px;
                padding: 15px;
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

    <!-- User Profile Section -->
    <div class="container">
        <h2>User Profile</h2>
        <div>
            <p><strong>Name:</strong> <?php echo $_SESSION["name"]; ?> </p>
            <p><strong>Date of Birth:</strong> <?php echo $_SESSION["dob"]; ?> </p>
            <p><strong>Gender:</strong> <?php echo $_SESSION["gender"]; ?> </p>
            <p><strong>Mobile:</strong> <?php echo $_SESSION["mobile"]; ?> </p>
            <p><strong>Address:</strong> <?php echo $_SESSION["address"]; ?> </p>
            <p><strong>Email:</strong> <?php echo $_SESSION["email"]; ?> </p>
        </div>
    </div>
 
<!--footer-->
    <footer class="footer">
        <p>&copy; 2025 Health Care. All rights reserved.</p>
    </footer>

</body>

</html>
