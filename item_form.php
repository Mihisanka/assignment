<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Registration</title>
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

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding-top: 30px;
    }
    </style>
</head>

<body>

    <div class="nav">
        <a href="index.php">Home</a>
        <a href="customer_form.php">Customer Registration</a>
        <a href="customer_list.php">View List</a>
        <a href="invoice_report.php">Invoice Report</a>
    </div>

    <div class="container mt-5">
        <h2>Item Registration</h2>
        <form method="POST" action="item_insert.php">
            <div class="mb-3">
                <label for="item_code" class="form-label">Item Code:</label>
                <input type="text" class="form-control" name="item_code" required>
            </div>

            <div class="mb-3">
                <label for="item_name" class="form-label">Item Name:</label>
                <input type="text" class="form-control" name="item_name" required>
            </div>

            <div class="mb-3">
                <label for="item_category" class="form-label">Category:</label>
                <select class="form-select" name="item_category" required>
                    <option value="1">Electronics</option>
                    <option value="2">Furniture</option>
                    <option value="3">Clothing</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="item_subcategory" class="form-label">Sub Category:</label>
                <select class="form-select" name="item_subcategory" required>
                    <option value="1">Mobile</option>
                    <option value="2">Laptop</option>
                    <option value="3">Chair</option>
                    <option value="4">Shirt</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>

            <div class="mb-3">
                <label for="unit_price" class="form-label">Unit Price:</label>
                <input type="number" class="form-control" name="unit_price" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Register Item</button>
        </form>
    </div>

</body>

</html>