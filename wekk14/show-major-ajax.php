<?php
include "config.php";
if(isset($_POST['show'])){        
    $html="<table border=1><thead>
            <th>Code </th>
            <th>Description</th>
            <th>Action</th></thead>
            <tbody>";
    $sql1=mysqli_query($con,"select * from major");
    while($urow=mysqli_fetch_array($sql1)){
        $code=$urow['code'];
        $desc=$urow['description'];
         $html.="<tr>
                    <td>$code</td>
                    <td>$desc</td>
                    <td>
                        <button value='$code' class='edit'>Edit</button> | <button class='delete'  value='$code'>Delete</button>  
                    </td>
                </tr>";
        }
    $html.="</tbody></table>";
    echo $html;
}
?>
