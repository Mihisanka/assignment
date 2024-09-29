<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
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
    <!-- Navigation Bar -->
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="customer_form.php">Customer Registration</a>
        <a href="item_form.php">Item Registration</a>
        <a href="customer_list.php">View Customer List</a>
        <a href="invoice_report.php">Invoice Report</a>
    </div>

    <h1>Invoice Report</h1>
    <form method="post" action="invoice_report.php">
        Start Date: <input type="date" name="start_date" required><br>
        End Date: <input type="date" name="end_date" required><br>
        <input type="submit" value="Generate Report">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'config.php';  

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

       
        $sql = "SELECT invoice_number, invoice_date, customer_name, customer_district, COUNT(item_id) as item_count, SUM(invoice_amount) as total_amount 
                FROM invoice 
                WHERE invoice_date BETWEEN '$start_date' AND '$end_date' 
                GROUP BY invoice_number";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Invoices from $start_date to $end_date</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>District</th>
                        <th>Item Count</th>
                        <th>Total Amount</th>
                    </tr>";

            
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["invoice_number"] . "</td>
                        <td>" . $row["invoice_date"] . "</td>
                        <td>" . $row["customer_name"] . "</td>
                        <td>" . $row["customer_district"] . "</td>
                        <td>" . $row["item_count"] . "</td>
                        <td>" . $row["total_amount"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No invoices found for the selected date range.";
        }

       
        mysqli_close($conn);
    }
    ?>
</body>

</html>