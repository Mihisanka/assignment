<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);

    
    $sql = "UPDATE customer SET title='$title', first_name='$first_name', middle_name='$middle_name', last_name='$last_name', contact_no='$contact_no', district='$district' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Customer updated successfully!";
        header("Location: customer_list.php"); 
    } else {
        echo "Error updating customer: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>