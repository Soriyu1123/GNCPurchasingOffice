<?php
    require('includes/ims_headeradminadmin.php');
    require('includes/ims_connection.php');

    $run = mysqli_query($conn, "select * from `items_shs`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="includes/css/additems.css">
    <link rel="stylesheet" href="includes/css/memo.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>

<style>
/**{*/
/*    border: 1px solid red;*/
/*}*/
.image_header {
    width: 65px;
}

/* Add some basic styles for the editable cell */
td.editable {
    cursor: pointer;
}
</style>

<script>
// Function to make a cell editable
function makeEditable(cell) {
    cell.contentEditable = true;
    cell.focus();
}

// Function to save edited cell content
function saveEditable(cell) {
    cell.contentEditable = false;
}
</script>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="card" style="width: 100%; height: auto">
                <div class="col-lg">
                    <div class="card-body">
                        <!--<i class="fa-solid fa-boxes-stacked fa-2xl ml-3 mb-4" style="color: #0f100f;"></i><br>-->
                        <!-- Table -->
                        <h1 class="uppercase">Senior High School Department</h1><br>
                        <table class="additems">
                            <form action="ims_additemsSHS.php" method="POST" enctype="multipart/form-data">
                                <tr>
                                    <td><label for="img">Product Image:</label></td>
                                    <td><input type="file" name="img" accept="image/* " required></td>
                                </tr>

                                <tr>
                                    <td><label for="name">Product Name:</label></td>
                                    <td><input type="text" name="name" required></td>
                                </tr>
                                <tr>
                                    <td><label for="descr">Description:</label></td>
                                    <td><input type="text" name="descr" required></td>
                                </tr>
                                <tr>
                                    <td><label for="quantity">Quantity:</label></td>
                                    <td><input type="number" name="quantity" min="1" value="1" required></td>
                                </tr>
                                <tr>
                                    <td><label for="size">Size:</label></td>
                                    <td>
                                        <select name="size">
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                            <option value="Not Applicable">Not Applicable</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <td><label for="grade_level">Grade Level:</label></td>
                                    <td>
                                        <select name="grade_level">
                                            <option value="All SHS Levels">All SHS Levels</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="price">Price:</label></td>
                                    <td><input type="number" name="price" min="1" value="1" required></td>
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="2"><input type="submit" value="Add Item"></td>
                                </tr>
                            </form>
                        </table>

                        <script>
                        function confirmDelete(itemId) {
                            if (confirm("Are you sure you want to delete this item?")) {
                                window.location.href = 'ims_deleteSHS.php?id=' + itemId;
                            }
                        }
                        </script>

                        <!-- ///////////////////////////////////////////////////////////////////////////////////////////// -->
                        <div id="printable-items">
                            <br>
                            <h1 class="display-4">All Items</h1><br>
                            <br>
                            <!-- Use thead and tbody tags for proper structure -->
                            <table id="item_display" class="table table-responsive" align="center">
                                <thead>
                                    <tr class="heading">
                                        <th class="image_header">Image</th>
                                        <th>ID</th>
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Grade Level</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        if ($num = mysqli_num_rows($run) > 0) {
                                            while ($result = mysqli_fetch_assoc($run)) {
                                                // Display the image as a base64-encoded string within an <img> tag
                                                echo "
                                                    <tr class='data'>
                                                        <td>" . '<img class="w-75 m-auto d-flex justify-content-center" src="data:image/jpeg;base64,'.base64_encode($result['img']).'"/>'.  "</td>
                                                        <td>" . $result['id'] . "</td>
                                                        <td class='editable' ondblclick='makeEditable(this);' onblur='saveEditable(this);'>" . $result['name'] . "</td>
                                                        <td>" . $result['descr'] . "</td>      
                                                        <td>" . $result['quantity'] . "</td>    
                                                        <td>" . $result['size'] . "</td>
                                                        <td>" . $result['grade_level'] . "</td>
                                                        <td>" . $result['price'] . "</td>
                                                        <td> 
                                                            <a href='ims_editSHS.php?id=" . $result['id'] . "' title='Edit' class='btn btn-primary m-auto mb-2'><i class='fa-regular fa-pen-to-square' style='color: #ffffff;'></i></a>
                                                            <a href='javascript:void(0);' onclick='confirmDelete(" . $result['id'] . ");' title='Delete' class='btn btn-danger m-auto'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a>
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