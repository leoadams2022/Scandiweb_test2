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
<form id="product_form">
<!-- nav_section -->
<section class='nav_section container'>
        <div class="nav_warper">
            <h2 class="">Products Add</h2>
            <div class="">
                <button class='btn save_btn' type='submit' onclick="" id="save_btn">Save</button>
                <button class='btn cancel_btn' type="button" onclick="cancelAdding()" id="cancel_btn">Cancel</button>
            </div>
        </div>
        <hr>
</section>
<!-- // nav_section -->
<!-- from_section -->
<section class='from_section container'>
    
        <div class="basic_info">
            <div>
                <label for="sku" class="input_lable">SKU:</label>
                <input type="text" id="sku" class="input text_input" name="sku" placeholder="XXXX-XXXX-XXXX"  maxlength="14" onkeypress="return /[0-9A-Za-z-]/i.test(event.key)">
                <span id="warning_span_sku" class="warning_span">Lorem ipsum dolor sit amet.</span>
            </div>
            <div>
                <label for="name" class="input_lable">Name:</label>
                <input type="text" id="name" class="input text_input" name="name" placeholder='product name' maxlength="15">
                <span id="warning_span_name" class="warning_span">Lorem ipsum dolor sit amet.</span>
            </div>
            <div>
                <label for="price" class="input_lable">Price:</label>
                <input type="number" min='0' id="price" class="input number_input" name="price" placeholder="price in USD" onkeypress="return /[0-9]/i.test(event.key)">
                <span id="warning_span_price" class="warning_span">Lorem ipsum dolor sit amet.</span>
            </div>
                
            <div>
                <label for="productType" class="input_lable">Type switcher:</label>
                <select name="productType" id="productType" name="productType" class="input productType_input">
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
            </div>
        </div>
        
        <div class="props">
            <div id="dvd" class="dvd">
                <label for="size" class="input_lable">Size (MB):</label>
                <div>
                    <input type="number" min='0' id="size" class="input number_input" name="size" placeholder="Size in MB" onkeypress="return /[0-9]/i.test(event.key)">
                    <span id="warning_span_size" class="warning_span">Lorem ipsum dolor sit amet.</span>
                </div>
            </div>

            <div id="book" class="book d-none">
                <label for="weight" class="input_lable">Weight (KG):</label>
                <div>
                    <input type="number" min='0' id="weight" class="input number_input" name="weight" placeholder="Weight in KG" onkeypress="return /[0-9]/i.test(event.key)">
                    <span id="warning_span_weight" class="warning_span">Lorem ipsum dolor sit amet.</span>
                </div>
            </div>

            <div id="furniture" class="furniture d-none">
                <label for="height" class="input_lable">Height (CM):</label>
                <div>
                    <input type="number" min='0' id="height" class="input number_input" name="height" placeholder="Height in CM" onkeypress="return /[0-9]/i.test(event.key)">
                    <span id="warning_span_height" class="warning_span">Lorem ipsum dolor sit amet.</span>
                </div>
                
                <label for="width" class="input_lable">Width (CM):</label>
                <div>
                    <input type="number" min='0' id="width" class="input number_input" name="width" placeholder="Width in CM" onkeypress="return /[0-9]/i.test(event.key)">
                    <span id="warning_span_width" class="warning_span">Lorem ipsum dolor sit amet.</span>
                </div>

                <label for="lenght" class="input_lable">Length (CM):</label>
                <div>
                    <input type="number" min='0' id="lenght" class="input number_input" name="lenght" placeholder="Length in CM" onkeypress="return /[0-9]/i.test(event.key)">
                    <span id="warning_span_lenght" class="warning_span">Lorem ipsum dolor sit amet.</span>
                </div>
            </div>
        </div>
        <span id="warning_span_submit" class="warning_span show"></span>
        <!-- <button  type="submit" class="d-none" id="productFormSubmitBtn" >submit</button> -->
    
</section>
<!-- // from_section -->
</form>
<script src="assets/js/product_Page.js"></script>
</body>
</html>