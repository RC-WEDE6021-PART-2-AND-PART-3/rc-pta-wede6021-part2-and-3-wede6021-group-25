<?php
include 'DBConn.php';

// DROP TABLES
$conn->query("DROP TABLE IF EXISTS tblUser");
$conn->query("DROP TABLE IF EXISTS tblAdmin");
$conn->query("DROP TABLE IF EXISTS tblClothes");

// CREATE USER TABLE
$conn->query("CREATE TABLE tblUser (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    isVerified BOOLEAN DEFAULT 0
)");

// CREATE ADMIN TABLE
$conn->query("CREATE TABLE tblAdmin (
    adminID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(255)
)");

// CREATE CLOTHES TABLE
$conn->query("CREATE TABLE tblClothes (
    itemID INT AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(100),
    price DECIMAL(10,2),
    image VARCHAR(255)
)");

// INSERT ADMIN
$adminPass = password_hash("admin123", PASSWORD_DEFAULT);
$conn->query("INSERT INTO tblAdmin(email,password)
VALUES('admin@pastimes.com','$adminPass')");

echo "All tables created successfully";
?>