<?php session_start(); ?>
<!DOCTYPE php>
<php>
<head>
    <title>QuarryCraft</title>
    <link rel="stylesheet" href="index.css">
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
                <input class="srch" type="search" name="search" placeholder="Type here">
                <button type="submit" class="btn">Search</button>
            </div>
        </div>
        <div class="content">
            <h1>QUALITY MATERIAL &<br><span>AGGREGATE SUPPLIER</span></h1>
            <p class="par">"Amidst the rugged beauty of a quarry site,<br> nature's raw materials shape the world around us."</p>
            <button class="btn"><a href="product.php">SHOP NOW</a></button>
            <div class="form">
                <h2>Login Here</h2>
                <form method="post" action="index.php">
                    <input type="text" placeholder="Enter Email" name="txtuname" required>
                    <input type="password" placeholder="Enter Password" name="txtpassword" required>
                    <input class="lbtn" type="submit" value="Login" name="btnsubmit">
                </form>
                <p class="link">Don't have an account?<br><a href="registration.php">Sign up</a> here</p>
                <p class="LW">Log in with</p>
            </div>
			<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["btnsubmit"])) {
    $username = $_POST["txtuname"];
    $password = $_POST["txtpassword"];

    $con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");

    if (!$con) {
        die("DB Server Error");
    }

    $sql = "SELECT * FROM `user` WHERE `Email` = '" . $username . "' AND `Password` = '" . $password . "'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userType = $row['utype'];

        $_SESSION["txtuname"] = $username;

        if ($userType === 'customer') {
            header('Location: product.php');
            exit();
        } elseif ($userType === 'admin') {
            header('Location: admin.php');
            exit();
        }
    } else {
        echo "Please enter correct username and password";
    }

    mysqli_close($con);
}
?>


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
            <a href="#">Help</a>
        </div>
        <div class="col">
            <h4>Install App</h4>
            <p>From App store or Google Play</p>
            <div class="row">
                <img src="" alt="">
                <img src="" alt="">
                <p>Secure payment gateway</p>
                <img src="card_img.png" alt="card_img">
            </div>
        </div>
    </footer>
</body>
</php>
