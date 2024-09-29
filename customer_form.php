<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
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
        <a href="customer_list.php">View List</a>
        <a href="invoice_report.php">Invoice Report</a>
    </div>

    <div class="container mt-5">
        <h1>Register a New Customer</h1>


        <form method="POST" action="customer_insert.php">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <select class="form-select" name="title" required>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr">Dr</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>

            <div class="mb-3">
                <label for="middle_name" class="form-label">Middle Name:</label>
                <input type="text" class="form-control" name="middle_name" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>

            <div class="mb-3">
                <label for="contact_no" class="form-label">Contact Number:</label>
                <input type="text" class="form-control" name="contact_no" required>
            </div>

            <div class="mb-3">
                <label for="district" class="form-label">District:</label>
                <input type="text" class="form-control" name="district" required>
            </div>

            <button type="submit" class="btn btn-primary">Register Customer</button>
        </form>
    </div>

</body>

</html>