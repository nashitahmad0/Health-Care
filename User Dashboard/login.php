<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "healthcare"; // Change to your database name
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve email and password from the form
    $email = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check if the credentials are valid
    $sql = "SELECT * FROM patients WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, store user data in session variables
        $row = $result->fetch_assoc();
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["dob"] = $row["dob"];
        $_SESSION["gender"] = $row["gender"];
        $_SESSION["mobile"] = $row["mobile"];
        $_SESSION["address"] = $row["address"];
        $_SESSION["email"] = $row["email"];

        // Redirect to dashboard
        header("Location: userdashboard.php");
        exit;
    } else {
        // Login failed, display error message
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
    }

    // Close database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="images/jpg" sizes="64x64" href="logo.jpg">
    <title>Patient Login</title>


    <style>
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

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            font-size: 1.2rem;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        body{
            background-image:url(./images/form-background.jpg);
           
        }

        #login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80%;
           margin-top: 80px;
           
        }

        #login-box {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .links {
            margin-top: 20px;
        }

        .links a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }
        
        /*footer start*/
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
        /*footer end*/

         /* Responsive design */
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
            #login-container {
                padding: 20px;
            }
            #login-box {
                width: 100%;
                max-width: 400px;
                margin: 20px;
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
        </div>
    </header>

    <!-- nav bar starting -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active  mr-4">
                    <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active mr-4">
                    <a class="nav-link" href="../about-us.html">About </a>
                </li>
                <li class="nav-item active mr-4">
                    <a class="nav-link " href="../healthcamp.html">Health Camp</a>
                </li>

                 <!-- If need in future just uncomment and link this  -->
                <!-- <li class="nav-item active mr-4">
                    <a class="nav-link " href="../medicine/index.html" target="_blank">Medicine</a>
                </li> -->
                <li class="nav-item active mr-4">
                    <a class="nav-link" href="../bloodbank.html">Blood Bank</a>
                </li>
                <li class="nav-item active mr-4">
                    <a class="nav-link " href="../index.html#creachus">Contact Us</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto mr-4">
                <button type="button" class="btn btn-primary"> <a style="color: white;"
                        href="../booking_instruction.html"><span class="glyphicon glyphicon-user"></span>
                        Register</a></button>
            </ul>
        </div>
    </nav>
    <!-- nav bar Ending -->

    <div id="login-container">
        <div id="login-box">
            <h2>Patient Login</h2>
            <form id="login-form" method="post">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
            <div class="links">
                <a href="../booking_instruction.html">Register</a>
                <a href="#">Forgot Password</a>
            </div>
        </div>
    </div>
   

    <!-- footer start -->
    <footer class="footer">
        &copy; 2025 Health Care. All rights reserved.
    </footer>
    <!-- footer end -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
-->
</body>

</html>
