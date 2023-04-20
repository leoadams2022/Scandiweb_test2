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
                <button class='btn add_btn'>ADD</button>
                <button class='btn delete_btn'>MASS DELETE</button>
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

<script>
$.ajax({
    url: '../private/Controllers/productsList.cont.php',
    type: 'POST', 
    data: {
        request: 'getAllProducts'
    },  
    beforeSend: function() { 
    },
    complete: function() {
    },
    success: function(data, status, xhr){
        data = JSON.parse(data)
        products_section = document.getElementById('products_section');
        products_section.innerHTML = '';
        data.forEach(function(product, i){
            
            let productProp,productPropValue,productPropValueUnit;
            if(product.type === 'dvd'){
                productProp = 'Size';
                productPropValue = product.size
                productPropValueUnit = 'MB';
            }else if(product.type === 'book'){
                productProp = 'Weight';
                productPropValue = product.weight
                productPropValueUnit = 'KG';
            }else if(product.type === 'furniture'){
                productProp = 'Dimensions';
                productPropValue = product.dimensions_h +'x'+ product.dimensions_w +'x'+ product.dimensions_l;
                productPropValueUnit = ' ';
            }
            let productDiv = ` 
                <div class="product_div">
                    <div class="delete_div">
                        <input type="checkbox" id="delete-checkbox_${i}" class="delete-checkbox">
                        <label for="delete-checkbox_${i}" class="delete-checkbox-label">Delete</label>
                    </div>
                    <div class="product_img_div">
                        <img class='' src="assets/images/${product.type}.png" alt="${product.type} product">
                    </div>
                    <div class="product_props ">
                            <span class="">${product.name}</span>
                            <span><span class="">${product.price}</span> $</span> 
                    </div>
                    <div class="product_props ">
                            <span>Type: <span class="">${product.type}</span><span>
                    </div>
                    <div class="product_props ">
                            <span class=''>${productProp}: <span class="">${productPropValue}</span> <span class=""> ${productPropValueUnit}</span></span>
                    </div>
                    <div class="product_props ">
                            <span>SKU: <span class="">${product.sku}</span></span>
                    </div>
                </div>
            `
            products_section.innerHTML += productDiv;
        });
    },
    error: function (Xhr, textStatus, errorMessage) {
        console.log('Error' + errorMessage + ' status: '+ textStatus);
    }                                       
});
</script>
</body>
</html>