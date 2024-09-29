<?php
include 'config.php';  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];  
    $district = $_POST['district'];

    
    $sql = "INSERT INTO customer (title, first_name, middle_name ,last_name, contact_no, district) 
            VALUES ('$title', '$first_name', '$middle_name', '$last_name', '$contact_no', '$district')";

    if (mysqli_query($conn, $sql)) {
        echo "Customer registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);  
}
?>