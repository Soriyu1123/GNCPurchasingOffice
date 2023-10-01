<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];
    $availability = $_POST['availability'];

    require('includes/ims_connection.php');

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    // Prepare the data for insertion into the database
    $product_name = mysqli_real_escape_string($conn, $product_name);
    $product_desc = mysqli_real_escape_string($conn, $product_desc);
    $price = floatval($price);
    $stocks = intval($stocks);
    $availability = mysqli_real_escape_string($conn, $availability);

    // Insert the data into the database
    $query = "INSERT INTO items (product_name, product_desc, price, stocks, availability) 
                VALUES ('$product_name', '$product_desc', $price, $stocks, '$availability')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Item added successfully!";
        header('location:ims_additemsstaff.php');
    } else {
        echo "Error adding item: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>