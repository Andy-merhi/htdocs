<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <h1>Add a Product</h1>
    <form action="" method="POST" enctype="multipart/form-data" id="fileUploadedId">
        <div>
            <label for="productID">Product ID: </label>
            <input type="text" name="prodID" id="productID">
        </div>
        <div>
            <label for="prodName">Name: </label>
            <input type="text" name="prodName" id="prodName">
        </div>
        <div>
            <label for="prodPrice">Price: </label>
            <input type="text" name="prodPrice" id="prodPrice">
        </div>
        <div>
            <label for="prodCat">Category: </label>
            <select name="prodCat" id="prodCat">

            </select>
        </div>
        <div>
            <label for="prodImage">Product Image</label>
            <input type="file" name="prodImage" id="prodImage">
        </div>
        <div>
            <!-- <input type="submit" name="submit" id="submitProd"> -->
            <input type="submit" id="submitProd" value="submit">
            <input type="reset" value="reset" name="submit">
        </div>
    </form>


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

        $(document).ready(function() {});
        // Catch the change event of the select field
        $('#prodCat').change(function() {
            var selectedOption = $(this).val();
            optionSelected = selectedOption;
        });


        $(document).on('click', '#submitProd',
            function() {
                if ($('#productID').val() == "" || $('#prodName').val() == "" || $('#prodPrice').val() == "" || optionSelected == 0) {
                    alert("empty fields");
                } else {
                    // var formData = new FormData();
                    // formData.append('prodImage', $('input[type=file]')[0].files[0]);
                    // alert(filename);
                    // var formData = new FormData(document.getElementById('fileUploadedId'));
                    // var image = formData.get("prodImage")['name'];

                    $prodID = $('#productID').val();
                    $prodName = $('#prodName').val();
                    $prodPrice = $('#prodPrice').val();
                    // $prodImage = filename;
                    alert($prodID + ' ' + $prodName + ' ' + $prodPrice);
                    // $catName = $('#catID').val();
                    $.ajax({
                        type: "POST",
                        url: "save.php",
                        data: {
                            prodID: $prodID,
                            prodName: $prodName,
                            prodPrice: $prodPrice,
                            catName: optionSelected,
                            // prodImage: $prodImage,
                            add: 1
                        },
                        success: function(response) {
                            alert(response);
                            $('#productID').val('');
                            $('#prodName').val('');
                            $('#prodPrice').val('');
                            // alert("product added");

                        },
                        error: function() {
                            alert("error occured while adding an item");
                        }

                    });
                }
            });
    </script>

</body>

</html>