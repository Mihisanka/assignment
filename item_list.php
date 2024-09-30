<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
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
        <a href="invoice_report.php">Invoice Report</a>
    </div>

    <div class="container mt-5">
        <?php
            include 'config.php';  
            $sql = "SELECT * FROM `item` ORDER BY `id` ASC"; // Assuming 'item' is the table name
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<h1>Item List</h1>";
                echo "<table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>";
    
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["item_code"] . "</td>
                            <td>" . $row["item_name"] . "</td>
                            <td>" . $row["item_category"] . "</td>
                            <td>" . $row["item_subcategory"] . "</td>
                            <td>" . $row["quantity"] . "</td>
                            <td>" . number_format($row["unit_price"], 2) . "</td>
                            <td>
                                <a href='item_update.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Update</a>
                                <a href='item_delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                            </td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "0 items found.";
            }

            mysqli_close($conn);
        ?>

        <a href='customer_list.php' class='btn btn-primary btn-sm'>Back </a>

    </div>

</body>

</html>