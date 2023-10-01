<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
</head>

<body>
    <?php
    require('includes/ims_header.php');
    require('includes/ims_connection.php');

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve item information from the database
        $query = "SELECT id, product_name, product_desc, price, stocks, availability FROM items WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);
        } else {
            echo "Item not found.";
            exit();
        }

        mysqli_free_result($result);
    }
    ?>

    <style>
    .updateItem {
        border-collapse: collapse;
        width: 100%;
    }

    .updateItem td {
        padding: 5px;
        border: none;
        /* Remove borders from table cells */
    }

    .updateItem input,
    .updateItem textarea,
    .updateItem select {
        padding: 5px;
        width: 100%;
    }

    .updateItem input[type="submit"] {
        width: auto;
    }
    </style>
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="card" style="width: 50rem; height: 50rem">
                <div class="col-lg">
                    <div class="card-body">
                        <i class="fa-solid fa-boxes-stacked fa-2xl ml-3 mb-4" style="color: #0f100f;"></i>


                        <!-- Table -->
                        <h1>Update Item</h1>
                        <table class="updateItem">
                            <form action="ims_update.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <tr>
                                    <td><label for="product_name">Product Name:</label></td>
                                    <td><input type="text" name="product_name"
                                            value="<?php echo $item['product_name']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="product_desc">Department:</label></td>
                                    <td>
                                        <select name="product_desc">
                                            <option value="Junior Highschool"
                                                <?php echo ($item['product_desc'] === 'Junior Highschool') ? 'selected' : ''; ?>>
                                                Junior Highschool
                                            </option>
                                            <option value="Senior Highschool"
                                                <?php echo ($item['product_desc'] === 'Senior Highschool') ? 'selected' : ''; ?>>
                                                Senior Highschool
                                            </option>
                                            <option value="Montessori"
                                                <?php echo ($item['product_desc'] === 'Montessori') ? 'selected' : ''; ?>>
                                                Montessori
                                            </option>
                                            <option value="College"
                                                <?php echo ($item['product_desc'] === 'College') ? 'selected' : ''; ?>>
                                                College
                                            </option>
                                            <option value="Masteral"
                                                <?php echo ($item['product_desc'] === 'Masteral') ? 'selected' : ''; ?>>
                                                Masteral
                                            </option>
                                        </select>
                                    </td>
                                </tr <tr>
                                <td><label for="price">Price:</label></td>
                                <td><input type="number" name="price" step="0.01" value="<?php echo $item['price']; ?>"
                                        required></td>
                                </tr>

                                <tr>
                                    <td><label for="stocks">Stocks:</label></td>
                                    <td><input type="number" name="stocks" value="<?php echo $item['stocks']; ?>"
                                            required></td>
                                </tr>

                                <tr>
                                    <td><label for="availability">Availability:</label></td>
                                    <td>
                                        <select name="availability">
                                            <option value="Available"
                                                <?php echo ($item['availability'] === 'available') ? 'selected' : ''; ?>>
                                                Available</option>
                                            <option value="Unavailable"
                                                <?php echo ($item['availability'] === 'unavailable') ? 'selected' : ''; ?>>
                                                Unavailable</option>
                                        </select>
                                    </td>
                                </tr>
                        </table>
                        <tr>
                            <td><input type="submit" value="Update Item"></td>
                        </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>