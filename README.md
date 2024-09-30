## Assignment: ERP System - Reports and Data Management

### Overview

This project is a simple ERP system developed using PHP and MySQL. The system allows users to manage customers, items, invoices, and generate various reports. The main reports included in the system are:

- Invoice Item Report
- Invoice Report
- Item Report

The system supports creating, updating, deleting, and searching records in the database. Each report allows for filtering data by a date range and displays relevant details based on the selected report.

### Prerequisites

Before running this project, ensure you have the following installed:

- **XAMPP or any other local PHP server**
- **PHP 7.0 or higher**
- **MySQL 5.7 or higher**
- A web browser (Google Chrome, Firefox, etc.)

### Project Structure

```
├── index.php                # Home page
├── customer_form.php         # Form to register new customers
├── customer_list.php         # Displays a list of customers
├── item_form.php             # Form to register new items
├── item_report.php           # Generates a report for items
├── invoice_item_report.php   # Generates a report for invoice items
├── invoice_report.php        # Generates a report for invoices
├── customer_update_process.php # Processes customer updates
├── config.php                # Database connection configuration
└── README.md                 # Project documentation
```

### Database Structure

You need to set up the following tables in your MySQL database for the project to work:

1. **Customer Table (`customer`)**

   - `id`: INT (Primary Key)
   - `first_name`: VARCHAR(100)
   - `last_name`: VARCHAR(100)
   - `district`: VARCHAR(100)
   - `contact_no`: VARCHAR(15)

2. **Item Table (`item`)**

   - `id`: INT (Primary Key)
   - `item_code`: VARCHAR(50)
   - `item_name`: VARCHAR(100)
   - `item_category`: VARCHAR(100)
   - `item_subcategory`: VARCHAR(100)
   - `quantity`: INT
   - `unit_price`: DECIMAL(10, 2)

3. **Invoice Table (`invoice`)**

   - `id`: INT (Primary Key)
   - `invoice_no`: VARCHAR(50)
   - `date`: DATE
   - `time`: TIME
   - `customer`: VARCHAR(100)
   - `item_count`: INT
   - `amount`: DECIMAL(10, 2)

4. **Invoice Master Table (`invoice_master`)**
   - `id`: INT (Primary Key)
   - `invoice_no`: VARCHAR(50)
   - `item_id`: INT (Foreign Key to `item`)
   - `quantity`: INT
   - `unit_price`: DECIMAL(10, 2)
   - `amount`: DECIMAL(10, 2)

### Installation and Setup

1. Clone this repository or download the files to your local machine.
2. Move the files to your XAMPP or any local server's `htdocs` folder.
3. Create a MySQL database called `assignment` (or update the database name in `config.php`).
4. Run the following SQL queries to create the necessary tables:

```sql
CREATE TABLE customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    district VARCHAR(100),
    contact_no VARCHAR(15)
);

CREATE TABLE item (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_code VARCHAR(50),
    item_name VARCHAR(100),
    item_category VARCHAR(100),
    item_subcategory VARCHAR(100),
    quantity INT,
    unit_price DECIMAL(10, 2)
);

CREATE TABLE invoice (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(50),
    date DATE,
    time TIME,
    customer VARCHAR(100),
    item_count INT,
    amount DECIMAL(10, 2)
);

CREATE TABLE invoice_master (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(50),
    item_id INT,
    quantity INT,
    unit_price DECIMAL(10, 2),
    amount DECIMAL(10, 2)
);
```

5. Open your web browser and navigate to `http://localhost/your-project-folder`.

### How to Use the System

- **Customer Registration**: Go to the customer registration form and fill in the details to add a new customer.
- **Item Registration**: Use the item form to register new items in the system.
- **Invoice Item Report**: Select a date range to search for invoice items and view details such as invoice number, customer name, item name, and unit price.
- **Invoice Report**: Select a date range to search for invoices and view details such as invoice number, customer, item count, and total amount.
- **Item Report**: View a list of items with their categories, subcategories, and available quantity.

### Screenshots (Optional)

You can include screenshots of your system's UI here.

### Known Issues

- None

### Future Improvements

- Add validation for input fields.
- Enhance the UI for a more modern look.
- Include pagination for large datasets in reports.

### Author

Mihisanka Sandudeeptha
+94779410681
mihisankasandudeeptha@gmail.com
[GitHub](https://github.com/mihisanka),https://github.com/Mihisanka/assignment
