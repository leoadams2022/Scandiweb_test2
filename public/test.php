<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/Bootstrap_v5.3.css">
    <!-- bootstrap  -->
    <script src="assets/js/Bootstrap_v5.3.js"></script>
    <!-- jQuery  -->
    <script src="assets/js/jQuery.js"></script>
</head>
<body>
<div id="testoutput"></div>    

<script>
    // $.get("../private/Controllers/test.cont.php", function(data, status){
    //     console.log(data);
    //     $('#testoutput').html(data);
    // });
    $.post("../private/Controllers/test.cont.php", {'type': 'book'}, function(data){
        console.log('data= ' ,data);
        $('#testoutput').html(data);
    });
</script>

</body>
</html>