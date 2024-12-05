<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Product details</title>
</head>

<body>
    <h1>Choose Products Category</h1>
    <br><br>
    <select name="prodCat" id="prodCat">
    </select>
    <table id="selectedCategoryTable" style="border: 1px solid black"></table>

    <script>
        var optionSelected = 0;

        $(document).ready(function() {
            $.ajax({
                url: 'getCategory.php',
                type: 'GET',
                success: function(response) {
                    $('#prodCat').html(response);
                }
            })
        });

        // $(document).ready(function() {});
        // Catch the change event of the select field
        $('#prodCat').change(function() {
            var selectedOption = $(this).val();
            optionSelected = selectedOption;

            $.ajax({
                url: 'getCategoryInfo.php',
                type: 'POST',
                data: {
                    catID: optionSelected,
                    show: 1
                },
                success: function(response) {
                    $('#selectedCategoryTable').html(response);
                }
            })

        });

        $(document).on('click', '.updatebtn', function() {
            var productId = $(this).closest('tr').find('.productId').text();
            window.location.href = "update.php?productID=" + productId;
        });

        $(document).on('click', '.deletebtn', function() {
            var productID = $(this).closest('tr').find('.productId').text();
            $.ajax({
                type: 'post',
                url: 'delete.php',
                data: {
                    productID: productID,
                    del: 1
                },
                success: function() {
                    alert("product deleted");
                }
            })
        });
    </script>
</body>

</html>