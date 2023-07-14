<!DOCTYPE php>
<php>
<head>
  <title>Registration QuarryCraft</title>
  <link rel="stylesheet" type="text/css" href="registration.css">

  <style>
    .button1 {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .button1:hover {
      background-color: #45a049;
    }
  </style>
  
</head>
<body>
  <div class="main">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo">QuarryCraft</h2>
      </div>

      <div class="menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="product.php">Products</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
      <div class="search">
        <input class="srch" type="search" name="" placeholder="Type here">
        <a href="#"><button class="btn">Search</button></a>
      </div>
    </div>
    <div class="content">
      <h1>Registration QuarryCraft</h1>
      <p class="par">We would love to hear from you. Please fill out the form below to get in touch with us.</p>

      <div class="form">

        <h2>Registration Form</h2>

        <form action="#" method="post">
            <p>Full Name:</p>
            <input type="text" name="txtFullName" placeholder="Full Name" id="txtFullName" required>
            <p>Contact Number:</p>
            <input type="text" name="txtnum" placeholder="Contact Number" id="txtnum" required>
            <p>Email:</p>
            <input type="email" name="txtEmail" placeholder="Email" id="txtEmail" required>
            <p>Password:</p>
            <input type="password" name="txtPassword" placeholder="Password" id="txtPassword" required>

            <button type="submit" class="button1" name="btnSubmit" id="btnSubmit">Signup</button>
        </form>
      </div>

    </div>
  </div>

  <footer class="section-p1">
    <div class="col">
       
       <h1>QuarryCraft</h1><br>
        <h4>Contact</h4>
        <p><strong>Phone: </strong>+1234567890</p>
        <p><strong>E-mail: </strong>info@quarrycraft.com</p>
    </div>
    <div class="col">
        <h4>About us</h4>
        <a href="./about.php">About us</a>
        <a href="#">Privacy policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="./contact.php">Contact us</a>
    </div>
  
    <div class="col">
        <h4>My Account</h4>
        <a href="./admin.php">Log in</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>
  
    <div class="col">
        <h4>Install App</h4>
      <p>From App store or Google Play </p>
      <div class="row">
        <img src="" alt="">
        <img src="" alt="">
        <p>Secure payment gateway</p>
        <img src="" alt="">
      </div>
    </div>
  </footer>

</body>
<?php
if (isset($_POST["btnSubmit"])) {
    $fullname = $_POST["txtFullName"];
    $contact = $_POST["txtnum"];
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];
    $utype = "customer";
    $con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");

    if (!$con) {
        die("Cannot connect to the DB Server");
    }

    $sql = "INSERT INTO `user` (`Fullname`, `Cnumber`, `Email`, `Password`, `utype`) VALUES ('$fullname', '$contact', '$email', '$password', '$utype');";

    if (mysqli_query($con, $sql)) {
        header('Location: index.php');
    }
}

?>
</php>
