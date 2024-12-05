<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <title>Document</title>
</head>
<body>

<table id="selectedCategoryTable" style="border: 2px solid black;"></table>


    <SCript>
        
        $(document).on('click', '#showPhone', function() {
    $.ajax({
        url: 'showphonestable.php',
        type: 'POST',
        data: {
            show: 1
        },
        success: function(response) {
            $('#selectedCategoryTable').html(response);
        }
    })
});
    </SCript>
</body>
</html>
