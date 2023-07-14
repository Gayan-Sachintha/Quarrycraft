<?php
session_start();
if (!isset($_SESSION["txtuname"])) {
    header("location: index.php");
}
?>

<!DOCTYPE php>
<php>
<head>
    <title>QuarryCraft</title>
    <link rel="stylesheet" href="admin.css">
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
        <h1>QUALITY MATERIAL &amp; <br><span>AGGREGATE SUPPLIER</span></h1>
        <p class="par">"Amidst the rugged beauty of a quarry site,<br> nature's raw materials shape the world around us."</p>

        <h2 style="text-align: center;">Our Products</h2>

        <div class="product-section">
            <?php
            $con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");
            if (!$con) {
                die("we are facing a technical issue");
            }

            $sql = "SELECT * FROM `product`";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product">';
                    echo '<img src="' . $row['Path'] . '" alt="' . $row['Name'] . '">';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    echo '<br>';
                    echo '<h4>$' . $row['Price'] . '</h4>';
                    echo '<br>';
                    echo '<button class="btn" onclick="updateProduct(' . $row['id'] . ')">Update Product</button>'; // Pass the product ID to the JavaScript function
                    echo '<button class="btn" onclick="deleteProduct(' . $row['id'] . ')">Delete Product</button>'; // Pass the product ID to the JavaScript function
                    echo '</div>';
                }
            } else {
                echo '<p>No products found.</p>';
            }

            mysqli_close($con);
            ?>
        </div>

        <div style="text-align: center;">
            <button class="btn" onclick="addProduct()">Add Product</button>
        </div>
    </div>

    <script>
        function updateProduct(productId) {
            window.location.href = "adminUpdate.php?id=" + productId; // Redirect to the adminUpdate.php page with the product ID
        }

        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
              window.location.href = "deleteItem.php?id=" + productId; // Redirect to the deleteItem.php page with the product ID
        }
}


        function addProduct() {
            window.location.href = "adminAdd.php";
        }
    </script>

</body>
</php>
