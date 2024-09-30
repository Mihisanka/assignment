<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Item Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    </div>
    <div class="container">
        <h2>Invoice Item Report</h2>


        <form method="POST" action="invoice_item_report.php">
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'config.php';
            $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
            $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

            
            $sql = "SELECT i.invoice_no, i.date, i.customer, itm.item_name, itm.item_code, itm.item_category, im.unit_price
                    FROM invoice i
                    JOIN invoice_master im ON i.invoice_no = im.invoice_no
                    JOIN item itm ON im.item_id = itm.id
                    WHERE i.date BETWEEN '$start_date' AND '$end_date'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Invoiced Date</th>
                                <th>Customer Name</th>
                                <th>Item Name</th>
                                <th>Item Code</th>
                                <th>Item Category</th>
                                <th>Item Unit Price</th>
                            </tr>
                        </thead>
                        <tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['invoice_no']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['customer']}</td>
                            <td>{$row['item_name']}</td>
                            <td>{$row['item_code']}</td>
                            <td>{$row['item_category']}</td>
                            <td>{$row['unit_price']}</td>
                          </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<p>No results found for the selected date range.</p>";
            }

            mysqli_close($conn);
        }
        ?>
    </div>
</body>

</html>