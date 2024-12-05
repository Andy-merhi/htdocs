<?php
include 'config.php';
if (isset($_POST['show'])) {
    $querySelect = 'SELECT * FROM phones';
    $res = mysqli_query($con, $querySelect);
    echo "<thead>
            <th>Product ID</th>  
            <th>Name</th>  
            <th>Price</th>  
            <th>Price</th>
            <th>Image</th>
        </thead>";


    while ($row = mysqli_fetch_array($res)) {
        $image = $row['imagePath'];
        $productID = $row['PhoneID'];
        $prodName = $row['PhoneName'];
        $prodPrice = $row['Price'];
        $madein = $row['MadeIN'];

        echo "
              <tbody>
                  <tr>
                    <td class='productId'>$productID</td>
                    <td>$prodName </td>
                    <td>$prodPrice</td>
                    <td>$madein</td>
                    <td><img src= '$image' alt='Phone Image' width = '80' height = '60'></td>
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
    <script src="jquery-3.7.1.min.js"></script>
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
