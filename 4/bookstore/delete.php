<?php

include "connect.php";

$id = $_GET['id'];
$sql = "DELETE FROM `books` WHERE id = $id";
$result = mysqli_query($con, $sql);

if($result){
    header("Location: index.php?msg=Book has been deleted.");
}else{
    echo "Failed: " . mysqli_error($con);
}

?>