# Sport-Warehouse

Sport-Warehouse is a web application built with PHP that serves as an online platform for managing a sports warehouse. It provides features for managing products, tracking inventory, processing orders, and generating reports. This project aims to simplify the management of a sports warehouse and improve overall efficiency.

## Features

- **Product management:** Add, update, and delete products with details such as name, description, price, and quantity.
- **Inventory tracking:** Keep track of product quantities and receive notifications for low stock levels.
- **Order processing:** Process customer orders, track their status, and update inventory accordingly.
- **User management:** Manage user accounts with different roles (admin, staff) and permissions.
- **Reporting:** Generate reports on sales, inventory, and other relevant data.

## Installation

1. **Clone the repository:**
2. **Import the database:**
- Create a new MySQL database.
- Import the database schema from the `database/sport_warehouse.sql` file.

3. **Configure the database connection:**
- Open the `config/config.php` file.
- Update the database credentials with your own.

4. **Start a local development server:**
- If you have PHP installed, you can use the built-in development server:
  ```
  php -S localhost:8000
  ```
  Replace `8000` with the desired port number.

5. **Open your browser:**

Open your web browser and visit `http://localhost:8000` to access the application.

## Usage

1. **Sign up or log in:**

Sign up for a new account or log in to your existing account.

2. **Manage products:**

Depending on your role (admin or staff), you can perform various tasks related to product management. This includes adding new products, updating existing products, and deleting products. Each product can have details such as name, description, price, and quantity.

3. **Track inventory:**

Keep track of product quantities in the inventory. Receive notifications when the stock levels of certain products are running low. This helps in ensuring that you have sufficient stock to fulfill orders.

4. **Process orders:**

Process customer orders by updating their status and managing inventory accordingly. Track the status of each order, whether it's pending, in progress, or completed. Update the inventory quantities based on the products ordered.

5. **Generate reports:**

Generate reports on sales, inventory, and other relevant data. This provides insights into the performance of your sports warehouse and helps in making informed business decisions.

