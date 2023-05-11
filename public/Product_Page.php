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
    <form id="product_form" method="post" action="">
        <div class="basic_info">
            <div>
                <label for="sku" class="input_lable">SKU:</label>
                <input type="text" id="sku" class="input text_input" name="sku" placeholder="XX00-XX-X00X">
                <span id="warning_span_sku" class="warning_span">Lorem ipsum dolor sit amet.</span>
            </div>
            <div>
                <label for="name" class="input_lable">Name:</label>
                <input type="text" id="name" class="input text_input" name="name">
                <span id="warning_span_name" class="warning_span">Lorem ipsum dolor sit amet.</span>
            </div>
            <div>
                <label for="price" class="input_lable">Price:</label>
                <input type="number" min='0' id="price" class="input number_input" name="price" onkeypress="return /[0-9]/i.test(event.key)">
                <span id="warning_span_price" class="warning_span">Lorem ipsum dolor sit amet.</span>
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
        <span id="warning_span_sku" class="warning_span">Lorem ipsum dolor sit amet.</span>
        
    </form>
</section>
<!-- // from_section -->

<script>

let productType = document.getElementById('productType')
productType.addEventListener('change', () => {
    let productTypeValue = productType.value;
    let dvdDiv = document.getElementById('dvd')
    ,bookDiv = document.getElementById('book')
    ,furnitureDiv = document.getElementById('furniture');
    if(productTypeValue == 'dvd'){
        dvdDiv.classList.remove('d-none')
        bookDiv.classList.add('d-none')
        furnitureDiv.classList.add('d-none')
    }else if(productTypeValue == 'book'){
        dvdDiv.classList.add('d-none')
        bookDiv.classList.remove('d-none')
        furnitureDiv.classList.add('d-none')
    }else if(productTypeValue == 'furniture'){
        dvdDiv.classList.add('d-none')
        bookDiv.classList.add('d-none')
        furnitureDiv.classList.remove('d-none')  
    }
});
function useRegex(value,regex) {
    return regex.test(value);
}
let sku = document.getElementById('sku')
sku.addEventListener('keyup', () => {
    let warningSpan = document.getElementById('warning_span_sku')
    if(sku.value.length > 11){
        // XX00-XX-X00X
        let regex = /[A-Za-z][A-Za-z]\d\d-[A-Za-z][A-Za-z]-[A-Za-z]\d\d[A-Za-z]/i;
        if(useRegex(sku.value,regex)){
            sku.classList.remove('invalid')
            warningSpan.classList.remove('show')
        }else{
            sku.classList.add('invalid')
            warningSpan.innerText = 'invalid SKU format Ex: XX00-XX-X00X'
            warningSpan.classList.add('show')
        }
    }else{
        sku.classList.remove('invalid')
        warningSpan.classList.remove('show')
    }
})
let name = document.getElementById('name')
name.addEventListener('keyup', () => {
    let warningSpan = document.getElementById('warning_span_name')
    if(name.value.length > 2 && name.value.length < 16){
        let regex = /^[A-Za-z\s]*$/;
        if(useRegex(name.value,regex)){
            name.classList.remove('invalid')
            warningSpan.classList.remove('show')
        }else{
            name.classList.add('invalid')
            warningSpan.innerText = 'Use Only Letters and Spaces for the Name Please '
            warningSpan.classList.add('show')
        }
    }else if(name.value.length == 1 || name.value.length > 15){
        name.classList.add('invalid')
        warningSpan.innerText = 'Name must be between 2 to 15 characters'
        warningSpan.classList.add('show')
    }else{
        name.classList.remove('invalid')
        warningSpan.classList.remove('show')
    }
})
function validateNumbers(inputFieldnId,warningSpanId){
    let input = document.getElementById(inputFieldnId)
    input.addEventListener('keyup', () => {
        let warningSpan = document.getElementById(warningSpanId)
        if(input.value != ''){
            let regex = /^\d+$/;
            if(useRegex(input.value,regex)){
                if(Number(input.value) > 0){
                    input.classList.remove('invalid')
                    warningSpan.classList.remove('show')
                }else{
                    input.classList.add('invalid')
                    warningSpan.innerText = 'must by more than 0'
                    warningSpan.classList.add('show')
                }
            }else {
                input.classList.add('invalid')
                warningSpan.innerText = 'Use Only Numbers for Please'
                warningSpan.classList.add('show')
            }
        }else{
            input.classList.remove('invalid')
            warningSpan.classList.remove('show')
        }
    })
}
validateNumbers('price','warning_span_price')
validateNumbers('size','warning_span_size')
validateNumbers('weight','warning_span_weight')
validateNumbers('height','warning_span_height')
validateNumbers('width','warning_span_width')
validateNumbers('lenght','warning_span_lenght')


</script>
</body>
</html>