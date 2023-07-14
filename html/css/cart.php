<?php
$con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");
if (!$con) {
    die("We are facing a technical issue");
}

// Check if the delete button is clicked
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteSql = "DELETE FROM `cart` WHERE `id`='$id'";
    mysqli_query($con, $deleteSql);
}

$sql = "SELECT * FROM `cart`";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>QuarryCraft - Cart</title>
  <link rel="stylesheet" href="cart.css">
  <style>
    .delete-button {
      display: inline-block;
      padding: 8px 16px;
      border-radius: 20px;
      background-color: #ff6600;
      color: #fff;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .delete-button:hover {
      background-color: #e65c00;
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
  </div>

  <div class="content">
    <h1>Your Cart</h1>

    <table class="cart-table">
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['Name'] . '</td>';
          echo '<td>$' . $row['Price'] . '</td>';
          echo '<td><img src="' . $row['path'] . '" alt="' . $row['Name'] . '"></td>';
          echo '<td><a href="?delete=' . $row['id'] . '" class="delete-button">Delete</a></td>';
          echo '</tr>';
        }
      } else {
        echo '<tr><td colspan="4">No products in the cart</td></tr>';
      }

      mysqli_close($con);
      ?>
    </table>
  </div>

  <footer class="section-p1">
    <!-- Footer content goes here -->
  </footer>
</body>
</html>
