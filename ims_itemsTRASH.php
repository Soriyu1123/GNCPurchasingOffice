<?php
    require('includes/ims_headeradminadmin.php');
    require('includes/ims_connection.php');

    $run = mysqli_query($conn, "SELECT * FROM `deleted` ORDER BY date_deleted DESC ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Items</title>
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

.data-row:hover {
    cursor: pointer;
}

</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="card" style="width: 100%; height: auto">
                <div class="col-lg">
                    <div class="card-body">
      
                        <div id="printable-items">
                            <br>
                            <h1 class="uppercase">Deleted Items</h1><br>
                            <br>
                            <!-- Use thead and tbody tags for proper structure -->
                            <table id="item_display" class="table table-responsive" align="center">
                                <thead>
                                    <tr class="heading">
                                        <!--<th>ID</th>-->
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <!--<th>Quantity</th>-->
                                        <th>Size</th>
                                        <th>Grade Level (HS)</th>
                                        <th>Course Code (College)</th>
                                        <th>Price</th>
                                        <th>Delete Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                               <?php
                                    $i = 1;
                                    if ($num = mysqli_num_rows($run) > 0) {
                                        while ($result = mysqli_fetch_assoc($run)) {
                                            // Format the date_deleted column to exclude seconds
                                            $formattedDateDeleted = date("Y-m-d H:i", strtotime($result['date_deleted']));
                                    
                                            echo "<tr class='data-row'>
                                                    <td>" . $result['name'] . "</td>
                                                    <td>" . $result['descr'] . "</td>      
                                                    <td>" . $result['size'] . "</td>
                                                    <td>" . $result['grade_level'] . "</td>
                                                    <td>" . $result['course_code'] . "</td>
                                                    <td class='text-success'>₱ " . $result['price'] . "</td>
                                                    <td class='text-danger'>" . $formattedDateDeleted . "</td>
                                                    <td> 
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