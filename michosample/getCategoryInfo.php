<?php
include 'config.php';
if (isset($_POST['show'])) {
    $catID = $_POST['catID'];
    $querySelect = 'SELECT * FROM product where catID = "' . $catID . '"';
    $res = mysqli_query($con, $querySelect);
    echo "<thead>
            <th>product ID</th>  
            <th>Name</th>  
            <th>price</th>  
        </thead>";
    while ($row = mysqli_fetch_array($res)) {
        $productID = $row['productID'];
        $prodName = $row['prodName'];
        $prodPrice = $row['price'];

        echo "
              <tbody>
                  <tr>
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
