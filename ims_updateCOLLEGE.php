<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require('includes/ims_connection.php');

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    // Get form data and sanitize
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $descr = mysqli_real_escape_string($conn, $_POST['descr']);
    $quantity = intval($_POST['quantity']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $course_code = mysqli_real_escape_string($conn, $_POST['course_code']);
    $price = floatval($_POST['price']);

    // Handle image upload
    if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $img_name = $_FILES['img']['name'];
        $img_tmp_name = $_FILES['img']['tmp_name'];

        // Move the uploaded image to a directory (e.g., 'uploads')
        $img_upload_path = 'uploads/' . $img_name;

        if (move_uploaded_file($img_tmp_name, $img_upload_path)) {
            // Image uploaded successfully, update the database
            $updateQuery = "UPDATE items_college SET 
                `name`='$name',
                `descr`='$descr',
                `quantity`='$quantity',
                `size`='$size',
                `course_code`='$course_code',
                `price`='$price',
                `img`='$img_name'
                WHERE `id`='$id'";

            $result = mysqli_query($conn, $updateQuery);

            if ($result) {
                header('location: ims_itemsCOLLEGE.php');
                echo "Item updated successfully!";
            } else {
                echo "Error updating item: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Error uploading image: " . $_FILES['img']['error'];
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>