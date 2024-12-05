<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <title>update page</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="updatedName">New Name: </label>
            <input type="text" name="updatedName" id="updatedName">
        </div>
        <div>
            <label for="updatedPrice">New Price: </label>
            <input type="text" name="updatedPrice" id="updatedPrice">
        </div>
        <div>
            <input type="submit" id="updateSubmit">
        </div>
    </form>
    <script>
        // $(document).ready(function() {
        $(document).on('click', '#updateSubmit', function() {
            $newprodName = $('#updatedName').val();
            $newprodPrice = $('#updatedPrice').val();
            var urlParams = new URLSearchParams(window.location.search);
            var productID = urlParams.get('productID');
            if ($newprodName == "" || $newprodPrice == "") {
                alert("empty fields");
            } else {
                $.ajax({
                    type: 'post',
                    url: 'updateAjax.php',
                    data: {
                        productID: productID,
                        updatedName: $newprodName,
                        updatedPrice: $newprodPrice,
                        update: 1
                    },
                    success: function() {
                        alert("product updated!");
                    }
                });
            }
        });
        // });
    </script>
</body>

</html>