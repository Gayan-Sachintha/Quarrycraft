<?php
$con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");
if (!$con) {
    die("We are facing a technical issue");
}

$sql = "SELECT * FROM `product`";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE php>
<php>
<head>
  <title>QuarryCraft</title>
  <link rel="stylesheet" href="product.css">
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
          <li><a href="cart.php">Cart</a></li>
        </ul>
      </div>
      <div class="search">
        <input class="srch" type="search" name="" placeholder="Type here">
        <a href="#"><button class="btn">Search</button></a>
      </div>
    </div>
  </div>


  <div class="content">
    <h1>QUALITY MATERIAL &amp; <br><span>AGGREGATE SUPPLIER</span></h1>
    <p class="par">"Amidst the rugged beauty of a quarry site,<br> nature's raw materials shape the world around us."</p>

    <h2 style="text-align: center;">Our Products</h2>

    <div class="product-section">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="product">';
          echo '<img src="' . $row['Path'] . '" alt="' . $row['Name'] . '">';
          echo '<h3>' . $row['Name'] . '</h3>';
          echo '<br>';
          echo '<h4>$' . $row['Price'] . '</h4>';
          echo '<br>';
          echo '<button class="btn" onclick="addToCart(' . $row['id'] . ')">Add to Cart</button>';
          echo '</div>';
        }
      } else {
        echo '<p>No products found.</p>';
      }

      mysqli_close($con);
      ?>
    </div>
  </div>

  <script>
    function addToCart(productId) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "addToCart.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert(xhr.responseText);
        }
      };
      xhr.send("productId=" + productId);
    }
  </script>

  <footer class="section-p1">
    <!-- Footer content goes here -->
  </footer>
</body>
</php>
