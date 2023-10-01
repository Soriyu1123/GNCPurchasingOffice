<?php
require('includes/ims_connection.php');

if (isset($_GET['image_id'])) {
    $imageId = $_GET['image_id'];

    // Query your database to retrieve the image data based on $imageId
    $sql = "SELECT img FROM announcement_wall WHERE id = $imageId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set the appropriate content type for images (e.g., PNG)
        header('Content-Type: image/png');
        // Output the binary image data
        echo $row['img'];
    }
} else {
    // Handle the case where image_id is not provided
    echo 'Image not found';
}

$conn->close();
?>