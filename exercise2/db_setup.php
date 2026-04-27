<?php
$servername = "localhost";
$username = "root";
$password = ""; // Adjust password if needed

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS shopeasy";
if ($conn->query($sql) === TRUE) {
    echo "Database 'shopeasy' created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select database
$conn->select_db("shopeasy");

// Create table
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price INT NOT NULL,
    availability VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'products' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Check if data exists
$result = $conn->query("SELECT * FROM products");
if ($result->num_rows == 0) {
    // Insert initial data
    $sql = "INSERT INTO products (name, price, availability) VALUES
    ('Laptop', 50000, 'In Stock'),
    ('Smartphone', 20000, 'In Stock'),
    ('Headphones', 2000, 'Limited')";

    if ($conn->query($sql) === TRUE) {
        echo "Initial products inserted successfully.<br>";
    } else {
        echo "Error inserting products: " . $conn->error . "<br>";
    }
} else {
    echo "Products table already populated.<br>";
}

$conn->close();
?>
