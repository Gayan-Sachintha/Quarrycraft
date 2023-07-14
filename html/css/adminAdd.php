<!DOCTYPE php>
<php>
<head>
  <title>QuarryCraft Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
  <style>
    .button {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #45a049;
    }

    .cancel-button {
      background-color: #f44336;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .cancel-button:hover {
      background-color: #d32f2f;
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
      <h1>QUALITY MATERIAL &<br><span>AGGREGATE SUPPLIER</span></h1>
      <p class="par">"Amidst the rugged beauty of a quarry site,<br> nature's raw materials shape the world around us."</p>

      <!-- Admin Panel -->
      <div class="admin-panel">
        <h2>Admin Panel</h2>
        <div class="admin-options">
          <form action="" method="post" enctype="multipart/form-data">
            <h1 style="text-align: center;">Add Product</h1>
            <hr>
            <div style="margin-bottom: 20px;">
                <label for="pName" style="font-weight: bold;">Product Name</label>
                <input type="text" placeholder="Enter Product Name" name="txtProductName" id="txtProductName" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="image" style="font-weight: bold;">Image</label>
                <input type="file" name="imagefol" id="imagefol" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="price" style="font-weight: bold;">Price</label>
                <input type="text" placeholder="Enter Price" name="txtPrice" id="txtPrice" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="chkPublish" style="font-weight: bold;">Publish</label>
                <input type="checkbox" name="chkPublish" id="chkPublish">
            </div>

            <div style="text-align: center;">
                <button type="submit" class="button" name="btnSubmit" id="btnSubmit">Add Product</button>
                <button type="button" class="cancel-button" onclick="window.location.href='admin.php'">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  session_start();
  if (!isset($_SESSION["txtuname"])) {
      header("location:index.php");
  }

  if (isset($_POST["btnSubmit"])) {
      $name = $_POST["txtProductName"];
      $image = "uploads/" . basename($_FILES["imagefol"]["name"]);
      move_uploaded_file($_FILES["imagefol"]["tmp_name"], $image);
      $price = $_POST["txtPrice"];

      if (isset($_POST["chkPublish"])) {
          $status = 1;
      } else {
          $status = 0;
      }

      $con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");
      if (!$con) {
          die("we are facing a technical issue");
      }

      $sql = "INSERT INTO `product`(`id`, `Email`, `Name`, `Price`, `Path`, `Post`) VALUES (NUll,'" . $_SESSION["txtuname"] . "','" . $name . "','" . $price . "','" . $image . "','" . $status . "');";

      if (mysqli_query($con, $sql)) {
          echo "file uploaded Successfully";

          // Retrieve existing products from localStorage
          $existingProducts = json_decode($_COOKIE['adminProducts'], true);

          // Create a new product object
          $newProduct = array(
              'name' => $name,
              'image' => $image,
              'price' => $price,
              'description' => ''
          );

          // Add the new product to the existing products array
          $existingProducts[] = $newProduct;

          // Store the updated products array in localStorage
          setcookie('adminProducts', json_encode($existingProducts), time() + (86400 * 30), '/');

          header('Location:admin.php');
      } else {
          echo "please select the file again !!!!";
      }
  }
  ?>
</body>
</php>
