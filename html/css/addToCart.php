<?php
if (isset($_POST["productId"])) {
    $productId = $_POST["productId"];
    $con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");
    if (!$con) {
        die("We are facing a technical issue");
    }

    $sql = "SELECT * FROM `product` WHERE `id` = '$productId'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row["Name"];
        $price = $row["Price"];
        $path = $row["Path"];

        $insertSql = "INSERT INTO `cart` (`Name`, `Price`, `path`) VALUES ('$name', '$price', '$path')";
        if (mysqli_query($con, $insertSql)) {
            echo "Product added to the cart successfully";
        } else {
            echo "Error adding product to the cart: " . mysqli_error($con);
        }
    } else {
        echo "Product not found";
    }

    mysqli_close($con);
}
?>
