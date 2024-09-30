<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    $item_code = mysqli_real_escape_string($conn, $_POST['item_code']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $item_category = mysqli_real_escape_string($conn, $_POST['item_category']);
    $item_subcategory = mysqli_real_escape_string($conn, $_POST['item_subcategory']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $unit_price = mysqli_real_escape_string($conn, $_POST['unit_price']);
    
    
    $sql = "UPDATE item SET item_code='$item_code', item_name='$item_name', item_category='$item_category', item_subcategory='$item_subcategory', quantity='$quantity', unit_price='$unit_price' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: item-list.php"); 
    } else {
        echo "Error updating item: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}