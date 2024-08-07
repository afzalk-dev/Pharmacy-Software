<?php

include("constant/connect.php");
$id=$_POST['id'];
$sqlqr = "select * from product where product_id='$id'";
$result = mysqli_query($connect, $sqlqr);
while($row = mysqli_fetch_assoc($result))
{
    $arr = $row;
    echo json_encode($arr);
}

?>