<?php
    require('includes/ims_headeradminadmin.php');
    require('includes/ims_connection.php');

    $run = mysqli_query($conn, "select * from `items`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="includes\css\additems.css">
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="card" style="width: 100%; height: auto">
                <div class="col-lg">
                    <div class="card-body">
                        <i class="fa-solid fa-boxes-stacked fa-2xl ml-3 mb-4" style="color: #0f100f;"></i><br>

                        <!-- Table -->
                        <h1 class="uppercase">Add Item</h1><br>
                        <table class="additems">
                            <form action="ims_additemsprocess.php" method="POST">
                                <tr>
                                    <td><label for="product_name">Product Name:</label></td>
                                    <td><input type="text" name="product_name" required></td>
                                </tr>
                                <tr>
                                    <td><label for="product_desc">Department:</label></td>
                                    <td>
                                        <select name="product_desc">
                                            <option value="Junior Highschool" required>Junior Highschool</option>
                                            <option value="Senior Highschool" required>Senior Highschool</option>
                                            <option value="Montessori" required>Montessori</option>
                                            <option value="College" required>College</option>
                                            <option value="Masteral" required>Masteral</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="price">Price:</label></td>
                                    <td><input type="number" name="price" step="0.01" required></td>
                                </tr>
                                <tr>
                                    <td><label for="stocks">Quantity:</label></td>
                                    <td><input type="number" name="stocks" required></td>
                                </tr>
                                <tr>
                                    <td><label for="availability">Availability:</label></td>
                                    <td>
                                        <select name="availability">
                                            <option value="Available">Available</option>
                                            <option value="Unavailable">Unavailable</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Add Item"></td>
                                </tr>
                            </form>
                        </table>


                        <!-- ///////////////////////////////////////////////////////////////////////////////////////////// -->
                        <div id="printable-items">
                            <br>
                            <h1 class="display-4">All Items</h1><br>
                            <br>
                            <!-- Use thead and tbody tags for proper structure -->
                            <table id="item_display" class="table table-bordered" align="center">
                                <thead>
                                    <tr class="heading">
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Department</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Availability</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($num = mysqli_num_rows($run) > 0) {
                                        while ($result = mysqli_fetch_assoc($run)) {
                                            echo "
                                                <tr class='data'>
                                                    <td>" . $result['id'] . "</td>
                                                    <td>" . $result['product_name'] . "</td>
                                                    <td>" . $result['product_desc'] . "</td>      
                                                    <td>" . $result['price'] . "</td>    
                                                    <td>" . $result['stocks'] . "</td>
                                                    <td>" . $result['availability'] . "</td>
                                                    <td> 
                                                        <a href='ims_editProduct.php?id=" . $result['id'] . "' class='btn btn-primary'>Edit</a>
                                                        <a href='ims_deleteAdminProduct.php?id=" . $result['id'] . "' class='btn btn-danger'>Delete</a>
                                                </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="includes\assets\paging.js"></script>
</body>

</html>