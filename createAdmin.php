<?php
include 'DBConn.php';

// CREATE TABLE IF NOT EXISTS
$createTable = "CREATE TABLE IF NOT EXISTS tblAdmin (
    adminID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
)";

if ($conn->query($createTable) === TRUE) {

    // CHECK IF ADMIN ALREADY EXISTS
    $check = $conn->query("SELECT * FROM tblAdmin WHERE email='admin@pastimes.com'");

    if ($check->num_rows == 0) {

        $hashedPassword = password_hash("admin123", PASSWORD_DEFAULT);

        $insert = "INSERT INTO tblAdmin (email, password)
                   VALUES ('admin@pastimes.com', '$hashedPassword')";

        if ($conn->query($insert) === TRUE) {
            echo "✅ Admin created successfully";
        } else {
            echo "❌ Error inserting admin: " . $conn->error;
        }

    } else {
        echo "⚠️ Admin already exists (no duplicate created)";
    }

} else {
    echo "❌ Error creating table: " . $conn->error;
}
?>