<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];
    $availability = $_POST['availability'];

    require('includes/ims_connection.php');

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    // Prepare the data for updating in the database
    $id = mysqli_real_escape_string($conn, $id);
    $product_name = mysqli_real_escape_string($conn, $product_name);
    $product_desc = mysqli_real_escape_string($conn, $product_desc);
    $price = floatval($price);
    $stocks = intval($stocks);
    $availability = mysqli_real_escape_string($conn, $availability);

        // Update the item in the database
        $query = "UPDATE items SET 
                product_name = '$product_name', 
                product_desc = '$product_desc', 
                price = $price, 
                stocks = $stocks, 
                availability = '$availability' 
                WHERE id = $id";
        $result = mysqli_query($conn, $query);

    if ($result) {
        header('location:ims_addItems.php');
        echo "Item updated successfully!";
    } else {
        echo "Error updating item: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>