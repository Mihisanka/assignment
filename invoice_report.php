<!-- invoice_report.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
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
        <a href="invoice_item_report.php">Invoice Item Report</a>
        <a href="item_report.php"> Item Report</a>
    </div>

    <div class="container mt-5">
        <h2>Invoice Report</h2>


        <form method="POST" action="invoice_report.php" class="mb-4">
            <div class="row mb-3">
                <div class="col">
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <div class="col">
                    <label for="end_date" class="form-label">End Date:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>


        <?php
        include 'config.php';

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
            $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

          
            $sql = "SELECT invoice_no, date, customer, item_count, amount
                    FROM invoice
                    WHERE date BETWEEN '$start_date' AND '$end_date'";

            $result = mysqli_query($conn, $sql);

          
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Item Count</th>
                                <th>Invoice Amount</th>
                            </tr>
                        </thead>
                        <tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['invoice_no']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['customer']}</td>
                            <td>{$row['item_count']}</td>
                            <td>{$row['amount']}</td>
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