<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

   
    $sql = "DELETE FROM customer WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Customer deleted successfully!";
        header("Location: customer_list.php"); 
        exit();
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid ID.";
}
?>