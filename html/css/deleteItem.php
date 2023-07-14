<?php
session_start();
if (!isset($_SESSION["txtuname"])) {
    header("location: index.php");
}

if (isset($_GET["id"])) {
    $con = mysqli_connect("localhost:3306", "root", "", "quarrycraft");

    if (!$con) {
        die("DB Server Error: " . mysqli_connect_error());
    }

    $id = $_GET["id"];
    $sql = "DELETE FROM `product` WHERE `id` = '$id'";

    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($con);
    }
} else {
    echo "Invalid product ID";
}
?>
