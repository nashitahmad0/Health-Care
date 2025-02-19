
  <?php
  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "healthcare";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Gather form data
      $name = $_POST["name"];
      $dob = $_POST["dob"];
      $gender = $_POST["gender"];
      $mobile = $_POST["mobile"];
      $address = $_POST["address"];
      $email = $_POST["email"];
      $password = $_POST["password"];

      // Insert data into database
      $sql = "INSERT INTO patients (name, dob, gender, mobile, address, email, password)
              VALUES ('$name', '$dob', '$gender', '$mobile', '$address', '$email', '$password')";

      if ($conn->query($sql) === TRUE) {
          echo "<div class='container'><p class='text-success'>Thank you for Registering with us. Your are now successfully registered.</p></div>";
      } else {
          echo "<div class='container'><p class='text-danger'>Error: " . $sql . "<br>" . $conn->error . "</p></div>";
      }

      // Close connection
      $conn->close();
  }
  ?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/patient_registration.css">
  <link rel="icon" type="images/jpg" sizes="64x64" href="/images/logo.jpg">

  <title>Registration Form</title>

</head>

<body style="background-image:url(./images/form-background.jpg);">


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
          <a class="nav-link " href="../index.html#contactus">Contact Us</a>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto mr-4">
        <button type="button" class="btn btn-primary"> <a style="color: white;" href="../User Dashboard/login.php"><span
              class="glyphicon glyphicon-user"></span> Login</a></button>
      </ul>

    </div>
  </nav>
  <!-- nav bar Ending -->


  <section>
    <div class="container">
      <h2>Patient Registration</h2>
      <form id="registration-form" method="post" action="">
        <input type="text" name="name" placeholder="Patient Name" required>
        <div class="row">
          <div class="col-lg-6">
            <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required>
          </div>
          <div class="col-lg-6">
            <select name="gender" class="form-select" aria-label="Default select example">
              <option selected>Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>

        <input type="tel" name="mobile" placeholder="Mobile Number" required>
        <input type="text" name="address" placeholder="Address with Pincode" required>
        <input type="email" name="email" placeholder="Email@example.com" required>
        <input type="password" name="password" placeholder="Password" required>

        <div class="text-center">
          <button type="submit" class="btn btn-primary" id="next-btn">Register</button>
        </div>

      </form>
    </div>
  </section>


  <!-- footer start-->
  <footer class="footer">
    &copy; 2025 Health Care. All rights reserved.
  </footer>
  <!-- footer end-->

  <script src="./js/patient_registration.js"></script>


  <!-- Optional JavaScript; choose one of the two! -->


  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

  
</body>

</html>
