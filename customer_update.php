<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .nav {
        padding: 10px;
        background-color: #f0f0f0;
        text-align: center;
        margin-bottom: 20px;
    }

    .nav a {
        margin: 15px;
        padding: 10px;
        text-decoration: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
    }

    .nav a:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="customer_form.php">Customer Registration</a>
        <a href="item_form.php">Item Registration</a>
        <a href="customer_list.php">View Customer List</a>
        <a href="invoice_report.php">Invoice Report</a>
    </div>

    <div class="container mt-5">
        <h2>Update Customer</h2>
        <?php
        include 'config.php';

       
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];

            
            $sql = "SELECT * FROM customer WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $customer = mysqli_fetch_assoc($result);

            
            if ($customer) {
                ?>
        <form method="POST" action="customer_update_process.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" value="<?php echo $customer['title']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $customer['first_name']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name:</label>
                <input type="text" class="form-control" name="middle_name"
                    value="<?php echo $customer['middle_name']; ?>">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $customer['last_name']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="contact_no" class="form-label">Contact Number:</label>
                <input type="text" class="form-control" name="contact_no" value="<?php echo $customer['contact_no']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="district" class="form-label">District:</label>
                <input type="text" class="form-control" name="district" value="<?php echo $customer['district']; ?>"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update Customer</button>
        </form>
        <?php
            } else {
                echo "<p>Customer not found.</p>";
            }
        } else {
            echo "<p>Invalid ID.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>

</html>