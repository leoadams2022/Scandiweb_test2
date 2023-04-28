<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- reset style  -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <!-- Product_Page_style  -->
    <link rel="stylesheet" href="assets/css/Product_Page_style.css">
    <!-- jQuery  -->
    <script src="assets/js/jQuery.js"></script>
</head>
<body>
<!-- nav_section -->
<section class='nav_section container'>
        <div class="nav_warper">
            <h2 class="">Products Add</h2>
            <div class="">
                <button class='btn save_btn' onclick="">Save</button>
                <button class='btn cancel_btn' onclick="">Cancel</button>
            </div>
        </div>
        <hr>
</section>
<!-- // nav_section -->
<!-- from_section -->
<section class='from_section container'>
    <form action="" id="product_form">
        <div class="basic_info">
            <div>
                <label for="sku" class="input_lable">SKU:</label>
                <input type="text" id="sku" class="input text_input" name="sku">
            </div>
            <div>
                <label for="name" class="input_lable">Name:</label>
                <input type="text" id="name" class="input text_input" name="name">
            </div>
            <div>
                <label for="price" class="input_lable">Price:</label>
                <input type="number" id="price" class="input number_input" name="price">
            </div>
            <div>
                <label for="productType" class="input_lable">Type switcher:</label>
                <select name="" id="productType" name="productType" class="input productType_input">
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
            </div>
        </div>
        
        <div class="props">
            <div id="dvd">
                <label for="size" class="input_lable">Size (MB):</label>
                <input type="number" id="size" class="input number_input" name="size">
            </div>

            <div id="book">
                <label for="weight" class="input_lable">Weight:</label>
                <input type="number" id="weight" class="input number_input" name="weight">
            </div>

            <div id="furniture">
                <label for="height" class="input_lable">Height:</label>
                <input type="number" id="height" class="input number_input" name="height">
                
                <label for="width" class="input_lable">Width:</label>
                <input type="number" id="width" class="input number_input" name="width">

                <label for="lenght" class="input_lable">Length:</label>
                <input type="number" id="lenght" class="input number_input" name="lenght">
            </div>
        </div>
        
    </form>
</section>
<!-- // from_section -->

<script>

</script>
</body>
</html>