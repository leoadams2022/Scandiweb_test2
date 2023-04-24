function getAllProducts(){
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
            if(data !== null){
                viewProducts(data);
            }else{
                console.log(data)
                products_section = document.getElementById('products_section');
                products_section.innerHTML = '<span class="flext_center">No Products found you can add some in the adding page<span>';
            }
        },
        error: function (Xhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage + ' status: '+ textStatus);
        }                                       
    });
}
function viewProducts(data){
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
                    <input type="checkbox" id="delete-checkbox_${i}" class="delete-checkbox" name="delete-checkbox" value="${product.sku}">
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
}
getAllProducts();
function getCheckedBoxesValues(CheckboxName) {
    let checkboxes = document.getElementsByName(CheckboxName);
    let checkboxesCheckedValues = [];
    for (let i=0; i<checkboxes.length; i++) {
       if (checkboxes[i].checked) {
          checkboxesCheckedValues.push(checkboxes[i].value);
       }
    }
    if(checkboxesCheckedValues.length > 0 ){
        return checkboxesCheckedValues;
    }else{
        return null;
    }
}
function massDelete(){
    let skuArr = getCheckedBoxesValues('delete-checkbox');
    if (skuArr !== null){
        $.ajax({
            url: '../private/Controllers/productsList.cont.php',
            type: 'POST', 
            data: {
                request: 'massDelete',
                skuArr: skuArr
            },  
            beforeSend: function() { 
            },
            complete: function() {
            },
            success: function(data, status, xhr){
                data = JSON.parse(data)
                getAllProducts();
            },
            error: function (Xhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
        });
    }
}


  
