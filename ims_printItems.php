<?php
    require('includes/ims_headeradminadmin.php');
    require('includes/ims_connection.php');

    $run = mysqli_query($conn, "SELECT * FROM `items_jhs`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Print</title>
</head>

<style>

/**{border: 1px solid red;}*/

@media print { .hide-on-print {display: none;} }

#level, #quant{
    width: 40px;
}

.sub_header{
    font-size: 12px;
}

/*.items, th, td {*/
/*    padding-left: 15px;*/
/*    padding-right: 15px;*/
/*    border: 1px solid black;*/
/*}*/

</style>

<body>
<div class="container">
    <div class="row">
        <div class="card" style="width: 50rem; height: auto">
            <div class="col-lg">
                <div class="card-body">
                <div id="printable-items">
                
                    <div class="container text-center">
                    <img src="includes/img/Logoo.png" class="GNC_Logo position-absolute" />
                    <h3>GUAGUA NATIONAL COLLEGES<h3>
                        <div class="row sub_header">
                            <span>Rep. E. Lagman St., Sta. Filomena (Pob.)</span><br>
                            <span>2003 Guagua, Pampanga, Philippines</span>
                            <span>Tel. No. (045) 9000-341/841</span><br>
                            <span>TIN 000-770-695-00000 NON VAT</span>
                        </div>
                        
                        <div class="row m-2 fs-5">
                            <span><strong><u>OFFICIAL RECEIPT </u></strong></span>
                            <p class="text-right">No.<span class="text-danger">090324</span></p>
                        </div>
                        
                    </div>
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                    
                    <div class="container">
                        <label for="name"><strong>Student Name:</strong><input class="text-uppercase" type="text" name="name" required></label>
                        
                        <div class="container">
                            <!--<label for="level"><strong>Level:</strong></label>-->
                            <select name="department">
                            <option value="Junior High School">Junior High School</option>
                            <option value="Senior High School">Senior High School</option>
                            <option value="Montessori">Montessori</option>
                            <option value="College">College</option>
                            <option value="Graduate School">Graduate School</option>
                            </select>

                            <!--<label for="level"><strong>Level:</strong></label>-->
                            <select name="course" id="course">
                            <option value="Accountancy">Accountancy</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Medical Technology">Medical Technology</option>
                            <option value="Hospitality Management">Hospitality Management</option>
                            <option value="Education">Education</option>
                            <option value="Regular">Regular</option>
                            <option value="Montessori">Montessori</option>
                            <option value="Not Applicable">Not Applicable</option>
                            </select>
       
                            <!--<label for="level"><strong>Level:</strong></label>-->
                            <select name="level" id="level">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="Not Applicable">Not Applicable</option>
                            </select>
                        </div><hr>
                    
                    </div>
                    
                    <div class="container">
                        <p class="mb-0 pb-0"><strong>Product:</strong></p>
                        <input class="mb-3" type="radio" id="pe" name="product" value="P.E. Uniform"><label for="pe"> P.E. Uniform</label><br>
                        <input class="mb-3" type="radio" id="idlace" name="product" value="ID Lace"><label for="idlace"> ID Lace</label><br>
                        <input class="mb-3" type="radio" id="grlvP" name="product" value="Grade Level Patch"><label for="grlvP"> Grade Level Patch</label><br>
                        <input class="mb-3" type="radio" id="grlvNt" name="product" value="Grade Level Necktie"><label for="grlvNt"> Grade Level Necktie</label><br>
                        <input class="mb-3" type="radio" id="coursePt" name="product" value="Course Patch"><label for="coursePt"> Course Patch</label><br>
                        <input class="mb-3" type="radio" id="collarPt" name="product" value="GNC Collar Patch"><label for="collarPt"> GNC Collar Patch</label><br>
                        <input class="mb-5" type="radio" id="deptShirt" name="product" value="Department Shirt"><label for="deptShirt"> Department Shirt</label>

                        <p class="mb-0 pb-0"><strong>Size:</strong></p>
                        <input class="m-3" type="radio" id="xs" name="size" value="XS"><label for="xs">XS</label>
                        <input class="m-3" type="radio" id="s" name="size" value="S"><label for="s">S</label>
                        <input class="m-3" type="radio" id="m" name="size" value="M"><label for="m">M</label>
                        <input class="m-3" type="radio" id="l" name="size" value="L"><label for="l">L</label>
                        <input class="m-3" type="radio" id="xl" name="size" value="XL"><label for="xl">XL</label>
                        <input class="m-3" type="radio" id="xxl" name="size" value="XL"><label for="xxl">XXL</label>
                        <input class="m-3" type="radio" id="notapp" name="size" value="Not Applicable"><label for="notapp">N/A</label>
                        
                        <hr>
                        
                        <label class="p-3" for="quantity"><strong>Quantity:</strong></label>
                        <input type="number" name="quantity" min="1" value="1" id="quant" required>
                    </div>
                    

                    
                    <!--<div class="container">-->
                    <!--    <p class=""><strong>Department:</strong></p>-->
                    <!--    <input class="mb-3" type="radio" id="jhs" name="dept" value="Junior High School"><label for="jhs"> Junior High School</label><br>-->
                    <!--    <input class="mb-3" type="radio" id="shs" name="dept" value="Senior High School"><label for="shs"> Senior High School</label><br>-->
                    <!--    <input class="mb-3" type="radio" id="monte" name="dept" value="Montessori"><label for="monte"> Montessori</label><br>-->
                    <!--    <input class="mb-3" type="radio" id="college" name="dept" value="College"><label for="college"> College</label><br>-->
                    <!--    <input class="mb-3" type="radio" id="gradschool" name="dept" value="Graduate School"><label for="gradschool"> Graduate School</label><br>-->
                    <!--    <input class="mb-3" type="radio" id="misc" name="dept" value="Miscellaneous"><label for="misc"> Miscellaneous</label>-->
                    <!--</div>-->
                    
                    <!--<div class="container">-->
                    <!--    <label for="grade_level"><strong>Grade Level:</strong></label>-->
                    <!--    <select name="grade_level">-->
                    <!--    <option value="7">7</option>-->
                    <!--    <option value="8">8</option>-->
                    <!--    <option value="9">9</option>-->
                    <!--    <option value="10">10</option>-->
                    <!--    <option value="11">11</option>-->
                    <!--    <option value="12">12</option>-->
                    <!--    <option value="Not Applicable">Not Applicable</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                    
                    
                    <!--<div class="container">-->
                    <!--    <label for="course_code"><strong>Program Course:</strong></label>-->
                    <!--    <select name="course_code">-->
                    <!--    <option value="All College Levels">All College Levels</option>-->
                    <!--    <option value="Accountancy">Accountancy</option>-->
                    <!--    <option value="Civil Engineering">Civil Engineering</option>-->
                    <!--    <option value="Information Technology">Information Technology</option>-->
                    <!--    <option value="Medical Technology">Medical Technology</option>-->
                    <!--    <option value="Hospitality Management">Hospitality Management</option>-->
                    <!--    <option value="Education">Education</option>-->
                    <!--    <option value="Not Applicable">Not Applicable</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                    
                    </form>
                    
                    <div class="margin" style="margin:20px"></div>
                    <button class="hide-on-print" onclick="printItems()">Print Items</button>
                
                </div>
                
                    <!-- JavaScript for Print Functionality -->
                    <script>
                    function printItems() {
                    const elementToPrint = document.getElementById('printable-items');
                    const originalDisplay = elementToPrint.style.display;
                    
                    // Temporarily show the section to print
                    elementToPrint.style.display = 'block';
                    
                    // Print the section
                    window.print();
                    
                    // Restore the original display property
                    elementToPrint.style.display = originalDisplay;
                    }
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>