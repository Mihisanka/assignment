<?php
include 'config.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $item_code = mysqli_real_escape_string($conn, $_POST['item_code']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $item_category = (int)$_POST['item_category']; 
    $item_subcategory = (int)$_POST['item_subcategory'];
    $quantity = (int)$_POST['quantity']; 
    $unit_price = (float)$_POST['unit_price']; 

    
    $sql = "INSERT INTO item (item_code, item_name, item_category, item_subcategory, quantity, unit_price)
            VALUES ('$item_code', '$item_name', $item_category, $item_subcategory, $quantity, $unit_price)";

   
    if (mysqli_query($conn, $sql)) {
        echo "Item registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);  
}
?>