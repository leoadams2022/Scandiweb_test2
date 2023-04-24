<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <!-- reset style  -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <!-- product list style  -->
    <link rel="stylesheet" href="assets/css/product_list_style.css">
    <!-- bootstrap  -->
    <!-- <link rel="stylesheet" href="assets/css/Bootstrap_v5.3.css"> -->
    <!-- bootstrap  -->
    <!-- <script src="assets/js/Bootstrap_v5.3.js"></script> -->
    <!-- jQuery  -->
    <script src="assets/js/jQuery.js"></script>
</head>
<body>
<!-- nav_section -->
    <section class='nav_section container'>
        <div class="nav_warper">
            <h2 class="">Products List</h2>
            <div class="">
                <a class='btn add_btn' href='Product_Page.php'>ADD</a>
                <button class='btn delete_btn' onclick="massDelete()">MASS DELETE</button>
            </div>
        </div>
        <hr>
    </section>
<!-- // nav_section -->
<!-- main section -->
    <section id='products_section' class="main_section container">
       
    </section>     
<!-- // main section -->
<!-- foot section  -->
    <section class="foot_section container">
        <hr>
        <div class="flext_center">
            <h3>Scandiweb Test assignment</h3>
        </div>
    </section>
<!-- // foot section  -->
<script src="assets/js/product_list.js"></script>
</body>
</html>