<?php
include 'config.php';
if (isset($_POST['show'])) {
    $catID = $_POST['catID'];
    $querySelect = 'SELECT * FROM product where CatID = "' . $catID . '"';
    $res = mysqli_query($con, $querySelect);
    echo "<thead>
            <th>Image</th>
            <th>Product ID</th>  
            <th>Name</th>  
            <th>Price</th>  
        </thead>";


    while ($row = mysqli_fetch_array($res)) {
        $image = $row['imagePath'];
        $productID = $row['ProductID'];
        $prodName = $row['ProdName'];
        $prodPrice = $row['Price'];

        echo "
              <tbody>
                  <tr>
                    <td><img src= '$image' alt='Product Image' width = '80' height = '60'></td>
                    <td class='productId'>$productID</td>
                    <td>$prodName</td>
                    <td>$prodPrice</td>
                    <td><button type='submit' class='updatebtn' id='updatebtn'>Update</button></td>
                    <td><button type='submit' class='deletebtn' id='deletebtn'>Delete</button></td>
                  </tr>
              </tbody>
            ";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <style>
    th,
    td {
          border: 1px solid black;
          text-align: center;
        }
   </style>
</body>
</html>
