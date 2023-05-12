function cancelAdding(){
    document.getElementById("product_form").reset();
    typeSwitch(productType.value)
    validateName(name)
    validateNumbers(price,'warning_span_price')
    validateNumbers(size,'warning_span_size')
    validateNumbers(weight,'warning_span_weight')
    validateNumbers(height,'warning_span_height')
    validateNumbers(width,'warning_span_width')
    validateNumbers(lenght,'warning_span_lenght')
    let warningSpan =  document.getElementById('warning_span_submit');
    warningSpan.innerText = '';
    // window.location.href = "Product_List.php"
}


const element = document.querySelector('#product_form');
element.addEventListener('submit', event => {
  
//   console.log(event)
saveProduct(event)

  
});
function saveProduct(event){
    /**
     * make sure all input values are good done
     * 
     * make sure SKU is not Dup 
     * 
     * add the product to DB and Go back to 
     */
    event.preventDefault();
    const productFormData = new FormData(event.target);
    const FormObj = {};
    productFormData.forEach((value, key) => (FormObj[key] = value));
    let warningSpan =  document.getElementById('warning_span_submit');
    if(validateFormInput(FormObj) == true){
        warningSpan.innerText = '';
        let saveBtn = document.getElementById('save_btn');
        let cancelBtn = document.getElementById('cancel_btn');
        $.ajax({
            url: '../private/Controllers/productsPage.cont.php',
            type: 'POST', 
            data: {
                request: 'skuDup',
                sku: FormObj['sku'].toUpperCase()
            },  
            beforeSend: function() { 
                saveBtn.disabled = true;
                cancelBtn.disabled = true;
            },
            complete: function() {
                
            },
            success: function(data, status){
                let skuDup = JSON.parse(data)
                // console.log('skuDup: ',skuDup)
                if(skuDup == true){
                    warningSpan.innerText = 'The SKU you proviede is already takern';
                    saveBtn.disabled = false;
                    cancelBtn.disabled = false;
                }else{
                    warningSpan.innerText = '';
                    addProduct()
                }
            },
            error: function (Xhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
        });
        function addProduct(){
            $.ajax({
                url: '../private/Controllers/productsPage.cont.php',
                type: 'POST', 
                data: {
                    request: 'addProduct',
                    FormObj: FormObj,
                    productType: FormObj['productType']//methodName
                },  
                beforeSend: function() { 
                },
                complete: function() {
                    saveBtn.disabled = false;
                    cancelBtn.disabled = false;
                },
                success: function(data, status){
                    saveBtn.disabled = false;
                    cancelBtn.disabled = false;
                    let response = JSON.parse(data)
                   console.log(response)
                },
                error: function (Xhr, textStatus, errorMessage) {
                    console.log('Error' + errorMessage + ' status: '+ textStatus);
                }                                       
            });
        }
    }else{
        let errorArr = validateFormInput(FormObj);
        warningSpan.innerText = '';
        errorArr.forEach((errorMsg) => {
            if(errorMsg != true){
               warningSpan.innerHTML += errorMsg+'<br>';
            }
        });
    }
    
    
   
}

function validateFormInput(FormObj){
    const {sku,name,price,productType,size,weight,height,width,lenght} = FormObj;
    let res = {"sku": null,"name": null,"price": null,"size": null,"weight": null,"height": null,"width": null,"lenght": null};
    // sku
    let sukRegex = /^[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]+-[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]+-[A-Za-z0-9][A-Za-z0-9][A-Za-z0-9][A-Za-z0-9]+$/i;
    if(sku.length > 0 && useRegex(sku,sukRegex)){res['sku'] = true}else{res['sku'] = 'please provied a vailde SKU'}
    // name
    let nameRegex = /^[A-Za-z\s]*$/;
    if(name.length > 0 && name.length < 16 && useRegex(name,nameRegex)){res['name'] = true}else{res['name'] = 'please provied a vailde name'}
    // number
    function validateNums(num,fieldName){
        let numbersRegex = /^\d+$/;
        if(num.length > 0 && Number(num) > 0 && useRegex(num,numbersRegex)){return true;}else{return 'please provied a vailde '+fieldName;}
    }

    res['price'] = validateNums(price,'price');
    res['size'] = validateNums(size,'size');
    res['weight'] = validateNums(weight,'weight');
    res['height'] = validateNums(height,'height');
    res['width'] = validateNums(width,'width');
    res['lenght'] = validateNums(lenght,'lenght');

    if(productType == 'dvd'){
        if(res['sku'] == true && res['name'] == true && res['price'] == true && res['size'] == true){
            return true;
        }else{
            return [res['sku'], res['name'] , res['price'] , res['size']];
        }
    }else if(productType == 'book'){
        if(res['sku'] == true && res['name'] == true && res['price'] == true && res['weight'] == true){
            return true;
        }else{
            return [res['sku'], res['name'] , res['price'] , res['weight']];
        }
    }else if(productType == 'furniture'){
        if(res['sku'] == true && res['name'] == true && res['price'] == true && res['height'] == true && res['width'] == true && res['lenght'] == true){
            return true;
        }else{
            return [res['sku'], res['name'] , res['price'] , res['height'] , res['width'] , res['lenght']];
        }
    }    
}
let productType = document.getElementById('productType')
productType.addEventListener('change', () => {
    typeSwitch(productType.value)
    let warningSpan =  document.getElementById('warning_span_submit');
        warningSpan.innerText = '';
});
function typeSwitch(productTypeValue){
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
}
function useRegex(value,regex) {
    return regex.test(value);
}
let sku = document.getElementById('sku')
sku.addEventListener('keyup', function(e){
    var skuStr = this.value.split("-").join("");
    if (skuStr.length > 0) {
        skuStr = skuStr.match(new RegExp('.{1,4}', 'g')).join("-");
    }
    this.value = skuStr;
})

let name = document.getElementById('name')
name.addEventListener('keyup', () => {
    validateName(name)
})
function validateName(name){
    let warningSpan = document.getElementById('warning_span_name')
    if(name.value.length >= 2 && name.value.length < 16){
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
}
function validateNumbers(input,warningSpanId){
        let warningSpan = document.getElementById(warningSpanId)
        // console.log(input.value.length)
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
}
let price = document.getElementById('price')
price.addEventListener('keyup', () => {validateNumbers(price,'warning_span_price') })
let size = document.getElementById('size')
size.addEventListener('keyup', () => {validateNumbers(size,'warning_span_size') })
let weight = document.getElementById('weight')
weight.addEventListener('keyup', () => {validateNumbers(weight,'warning_span_weight') })
let height = document.getElementById('height')
height.addEventListener('keyup', () => {validateNumbers(height,'warning_span_height') })
let width = document.getElementById('width')
width.addEventListener('keyup', () => {validateNumbers(width,'warning_span_width') })
let lenght = document.getElementById('lenght')
lenght.addEventListener('keyup', () => {validateNumbers(lenght,'warning_span_lenght') })