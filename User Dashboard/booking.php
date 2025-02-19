<?php
session_start(); // Start the session

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}

// Include the database connection file
include_once 'db_connection.php';

// Retrieve user data from session
$patient_id = $_SESSION['id']; // Ensure 'id' is stored in session after login
$name = $_SESSION['name'];

// Check if logout button is clicked
if (isset($_POST["logout"])) {
    // Destroy the session and redirect to login page
    session_destroy();
    header("Location: login.php");
    exit;
}

// Initialize variables for appointment form
$department = $doctor = $date = $time = $consultationType = "";

// Store appointment if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $department = mysqli_real_escape_string($conn, $_POST["department"]);
    $doctor = mysqli_real_escape_string($conn, $_POST["doctor"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);
    $consultationType = mysqli_real_escape_string($conn, $_POST["consultation-type"]);

    // Insert appointment into database
    $sql = "INSERT INTO appointments (patient_id, department, doctor, date, time, consultation_type)
            VALUES ('$patient_id', '$department', '$doctor', '$date', '$time', '$consultationType')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Appointment booked successfully!');</script>";
    } else {
        echo "<script>alert('Error: Appointment booking failed.');</script>";
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <title>Appointment Booking Form</title>
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

body {
    
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    
}

.container {
    margin: 50px auto;
    width: 400px;
    padding: 25px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: rgb(43 158 106);
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type="text"][readonly],
input[type="email"][readonly] {
    background-color: #f0f0f0;
    cursor: not-allowed;
}

select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    cursor: pointer;
}

input[type="submit"] {
    width: 100%;
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
.footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    
    bottom: 0;
    width: 100%;
}

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
        width: 100%;
        margin: 20px auto;
        padding: 20px;
    }

    h2 {
        font-size: 1.5rem;
    }

    p, label {
        font-size: 1rem;
    }

    input[type="text"], 
    input[type="email"], 
    select, 
    input[type="submit"] {
        padding: 8px;
        font-size: 1rem;
    }

    input[type="submit"] {
        font-size: 1rem;
    }
}

/* Very small screens */
@media (max-width: 576px) {
    /* Further reduce font sizes and paddings */
    .header-container {
        padding: 10px;
    }

    h2 {
        font-size: 1.25rem;
    }

    p, label {
        font-size: 0.9rem;
    }

    input[type="text"], 
    input[type="email"], 
    select, 
    input[type="submit"] {
        padding: 6px;
        font-size: 0.9rem;
    }

    input[type="submit"] {
        font-size: 0.9rem;
    }

    /* Adjust the navbar to collapse properly on very small screens */
    .navbar-collapse {
        text-align: center;
    }

    .navbar-nav {
        flex-direction: column;
        width: 100%;
    }

    .navbar-nav .nav-item {
        margin-bottom: 10px;
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
                <a class="nav-link" href="./userdashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active mr-4">
                <a class="nav-link" href="./userprofile.php">Profile </a>
            </li>
            <li class="nav-item active mr-4">
                <a class="nav-link " href="/booking.php">Appointment</a>
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
    <h2>Book Appointment</h2>
    <form action="booking.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="text" id="dob" name="dob" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : ''; ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile No:</label>
            <input type="text" id="mobile" name="mobile" value="<?php echo isset($_SESSION['mobile']) ? $_SESSION['mobile'] : ''; ?>" readonly required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <select id="department" name="department" required>
                <option value="">Select Department</option>
                <option value="General Physician">General Physician</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Neurology">Neurology</option>
                <!-- Add more departments as needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="doctor">Doctor Name:</label>
            <select id="doctor" name="doctor" required>
                <option value="">Select Doctor</option>
                <option value="Dr. Ram Kumar">Dr. Ram Kumar</option>
                <option value="Dr. Nidhi">Dr. Nidhi</option>
                <!-- Populate doctors based on selected department -->
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="consultation">Consultation</label>
            <select id="consultation-type" name="consultation-type" required>
                <option value="">Select</option>
                <option value="teleconsultation">Teleconsultation</option>
                <option value="offline_consultation">Offline Consultation</option>
            </select>
        </div>
        <input type="submit" value="Book Appointment">
    </form>
</div>

<footer class="footer">
    <p>&copy; 2025 Health Care. All rights reserved.</p>
</footer>
</body>
</html>
