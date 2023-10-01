<?php
require('includes/ims_headeradminadmin.php');
require('includes/ims_connection.php');

$run = mysqli_query($conn, "select * from `accounts`");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <!-- Css -->
    <link rel="stylesheet" href="includes/css/style.css">
    <!-- Script Js -->
    <script src="includes/assests/js/snippets.js"></script>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>WBMIMS</title>
</head>

<style>
table,
th,
td {
    border: 1px solid black;
}


th,
td {
    padding-left: 15px;
    padding-right: 15px;
}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="card" style="width: 50rem; height: 50rem">
                <div class="col-lg">
                    <div class="card-body">
                        <i class="fa-solid fa-boxes-stacked fa-2xl ml-3 mb-4" style="color: #0f100f;"></i>


                        <!-- Table -->
                        <table align="center" border="1" cellspacing="0" cellpadding="0">
                            <tr class="heading">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Position</th>
                            </tr>

                            <?php
                                $i = 1;
                                if ($num = mysqli_num_rows($run) > 0) {
                                    while ($result = mysqli_fetch_assoc($run)) {
                                        echo "
                                <tr class='data' style='border: 1px solid'> 
                                <td>" . $result['firstname'] . "</td>
                                <td>" . $result['lastname'] . "</td>      
                                <td>" . $result['username'] . "</td>    
                                <td>" . $result['password'] . "</td>
                                <td>" . $result['role'] . "</td>
                                <td>
                                <a href='ims_deleteAdminUsers.php?id=" . $result['id'] . "' id='btn' class='btn btn-danger'>Delete</a>
                                </td>  
                                </tr>";}
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>