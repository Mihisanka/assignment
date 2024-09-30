<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    .container {
        margin-top: 50px;
    }

    table {
        margin-top: 20px;
    }

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
        <a href="customer_list.php">View List</a>
        <a href="invoice_report.php">Invoice Report</a>
        <a href="invoice_item_report.php">Invoice Item Report</a>

    </div>

    <div class="container mt-5">
        <h2>Item Report</h2>

        <?php
        include 'config.php';

       
        $sql = "SELECT DISTINCT item_name, item_category, item_subcategory, quantity
                FROM item";

        $result = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Category</th>
                            <th>Item Subcategory</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>";

            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['item_name']}</td>
                        <td>{$row['item_category']}</td>
                        <td>{$row['item_subcategory']}</td>
                        <td>{$row['quantity']}</td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No items found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>

</html>