<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

   
    $sql = "DELETE FROM item WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "item deleted successfully!";
        header("Location: item_list.php"); 
        exit();
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid ID.";
}
?>