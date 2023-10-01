<?php
    require('includes/ims_headeradminadmin.php');
    require('includes/ims_connection.php');
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // Retrieve the item from the database
        $query = "SELECT * FROM `items_jhs` WHERE `id`='$id'";
        $result = mysqli_query($conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);
        } else {
            echo "Item not found.";
            exit;
        }
    } else {
        echo "Item ID not provided.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes\css\additems.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="card" style="width: 100%; height: auto">
                <div class="col-lg">
                    <div class="card-body">
                        <!--<i class="fa-solid fa-boxes-stacked fa-2xl ml-3 mb-4" style="color: #0f100f;"></i><br>-->
                        <!-- Table -->
                        <h1 class="uppercase">Update Item</h1><br>
                        <table class="additems">
                            <form action="ims_updateJHS.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <tr>
                                    <td><label for="img">Product Image:</label></td>
                                    <td><input type="file" name="img" accept="image/*"></td>
                                </tr>

                                <tr>
                                    <td><label for="name">Product Name:</label></td>
                                    <td><input type="text" name="name" value="<?php echo $item['name']; ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="descr">Description:</label></td>
                                    <td><input type="text" name="descr" value="<?php echo $item['descr']; ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="quantity">Quantity:</label></td>
                                    <td><input type="number" name="quantity" value="<?php echo $item['quantity']; ?>"
                                            required></td>
                                </tr>
                                <tr>
                                    <td><label for="size">Size:</label></td>
                                    <td>
                                        <select name="size">
                                            <option value="XS" <?php if ($item['size'] === 'XS') echo 'selected'; ?>>XS
                                            </option>
                                            <option value="S" <?php if ($item['size'] === 'S') echo 'selected'; ?>>S
                                            </option>
                                            <option value="M" <?php if ($item['size'] === 'M') echo 'selected'; ?>>M
                                            </option>
                                            <option value="L" <?php if ($item['size'] === 'L') echo 'selected'; ?>>L
                                            </option>
                                            <option value="XL" <?php if ($item['size'] === 'XL') echo 'selected'; ?>>XL
                                            </option>
                                            <option value="XXL" <?php if ($item['size'] === 'XXL') echo 'selected'; ?>>
                                                XXL</option>
                                            <option value="Not Applicable"
                                                <?php if ($item['size'] === 'Not Applicable') echo 'selected'; ?>>Not
                                                Applicable</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td><label for="grade_level">Grade Level:</label></td>
                                    <td>
                                        <select name="grade_level">
                                            <option value="All JHS Levels">All JHS Levels</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="price">Price:</label></td>
                                    <td><input type="number" name="price" value="<?php echo $item['price']; ?>"
                                            required></td>
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="2"><input type="submit" value="Update Item"></td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="includes\assets\paging.js"></script>
</body>

</html>