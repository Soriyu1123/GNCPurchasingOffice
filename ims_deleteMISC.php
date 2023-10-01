<?php
require('includes/ims_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Specify column mapping and include the date_deleted column with NOW()
    $query = "INSERT INTO `deleted` (name, descr, quantity, price, size, date_deleted)
              SELECT name, descr, quantity, price, size, NOW()
              FROM `items_misc`
              WHERE id = '$id'";

    $result1 = mysqli_query($conn, $query);

    // Delete from items_college
    $dlt = "DELETE FROM `items_misc` WHERE id = '$id'";
    $result2 = mysqli_query($conn, $dlt);

    if ($result1 && $result2) {
        echo "<script>alert('Item deleted successfully!'); window.location='ims_itemsMISC.php';</script>";
        exit; // Important to stop script execution after the redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
