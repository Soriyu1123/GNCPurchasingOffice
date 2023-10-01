<?php
    require('includes/ims_header_std.php');
    require('includes/ims_connection.php');
    include('includes/ims_sidepnl.php');
    $run = mysqli_query($conn, "select * from `items_monte`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchasing Office</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Include Bootstrap CSS (make sure you have the correct path) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Include Bootstrap JS and jQuery (make sure you have the correct paths) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<style>

/**{ border: 1px solid red;}*/
    
    body {
    background: url(https://images.unsplash.com/photo-1634153570366-deda92ecf625?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1664&q=80);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    font-family: 'Open Sans', sans-serif;
    }
    
    .image_header {
        width: 65px;
    }
    
    /* Add some basic styles for the editable cell */
    td.editable {
        cursor: pointer;
    }

    .item-description,
    .item-detail {
        margin: 5px;
        font-size: 14px; /* Adjust the font size as needed */
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
    
<div class="container mt-5 category-content">
    <div class="row">
        <div class="card" style="width: 100%; height: auto; margin-top: 90px; margin-left: 100px; opacity: 90%">
            <div class="col-lg">
                <div class="card-body">

                    <div id="printable-items">
                        <br>
                        <h1 class="display-4">Montessori</h1><br>
                        <br>


                        <div class="container mb-3"><p>Filter by:</p>
                            <button class="btn btn-dark filter-button" data-category="P.E. Uniform">PE Uniform</button>
                            <button class="btn btn-dark filter-button" data-category="Grade Level Patch">Collar Patch</button>
                            <button class="btn btn-dark filter-button" data-category="Grade Level Necktie">Necktie</button>
                            <button class="btn btn-dark" id="resetFilterButton">All</button>
                        </div>
                        
                        
                        <script>
                        // JavaScript function to filter cards by category
                        function filterCardsByCategory(category) {
                            var cards = document.getElementsByClassName('col-md-3');
                            
                            for (var i = 0; i < cards.length; i++) {
                                var card = cards[i];
                                var cardCategory = card.getAttribute('data-category').toLowerCase();
                                
                                if (category === 'all' || cardCategory.includes(category.toLowerCase())) {
                                    card.style.display = 'block';
                                } else {
                                    card.style.display = 'none';
                                }
                            }
                        }
                        
                        // Add click event listeners to filter buttons
                        var filterButtons = document.getElementsByClassName('filter-button');
                        for (var i = 0; i < filterButtons.length; i++) {
                            filterButtons[i].addEventListener('click', function() {
                                var category = this.getAttribute('data-category');
                                filterCardsByCategory(category);
                            });
                        }
                        
                        // Initialize by showing all cards
                        filterCardsByCategory('all');
                        </script>
                                                
                        <!-- Reset Filter -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        
                        <script>
                        $(document).ready(function() {
                            // Reset filter button click event
                            $("#resetFilterButton").click(function() {
                                filterCardsByCategory('all'); // Show all cards by calling the filter function with 'all' category
                            });
                        });
                        </script>

                        <?php
                            $i = 1;
                            if ($num = mysqli_num_rows($run) > 0) {
                                echo '<div class="row">';
                                while ($result = mysqli_fetch_assoc($run)) {
                                    // Place the category information in the data-category attribute
                                    echo '<div class="col-md-3" style="padding: 10px 10px;" data-category="' . $result['name'] . '">
                                            <div class="card mb-2" style="width: 100%; margin-bottom: 20px;">
                                                <a href="#" class="card-link" data-toggle="modal" data-target="#cardModal' . $i . '">
                                                    <div style="width: 100%; padding-bottom: 100%; position: relative;">
                                                        <img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($result['img']) . '" alt="Card image cap" style="position: absolute; width: 100%; height: 100%; object-fit: cover;">
                                                    </div>
                                                    <div class="card-body text-dark">
                                                        <h5 class="card-title">' . $result['name'] . '</h5>
                                                         <p class="card-text item-detail m-1">Size: ' . $result['size'] . '</p>
                                                         <p class="card-text item-detail text-secondary"> ' . $result['quantity'] . ' available</p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="card-text item-detail text-success">₱ ' . $result['price'] . '</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>';
                            
                                    // Create a modal for each card
                                    echo '
                                        <div class="modal fade" style="margin-top:100px;" data-backdrop="false" id="cardModal' . $i . '" tabindex="-1" aria-labelledby="cardModalLabel' . $i . '" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cardModalLabel' . $i . '">' . $result['name'] . '</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Add the content you want to display in the modal here -->
                                                        <img src="data:image/jpeg;base64,' . base64_encode($result['img']) . '" alt="Card image cap" style="width: 100%; max-height: 400px;">
                                                        <p>Description: ' . $result['descr'] . '</p>
                                                        <p>Size: ' . $result['size'] . '</p>
                                                        <p>Grade Level: ' . $result['grade_level'] . '</p>
                                                        <p class="text-success">₱ ' . $result['price'] . '</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                            
                                    // Close the row and start a new one after every 4 cards
                                    if ($i % 4 == 0) {
                                        echo '</div><div class="row">';
                                    }
                                    $i++;
                                }
                                echo '</div>'; // Close the final row
                            }
                         ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="includes\assets\paging.js"></script>

<script>
 const activePage = window.location.pathname;    
 const navLinks = document.querySelectorAll('nav a').
 forEach(link => {
    if(link.href.includes(`${activePage}`))
    {
        link.classList.add('active');
    }
 })
</script>

</body>

</body>

</html>