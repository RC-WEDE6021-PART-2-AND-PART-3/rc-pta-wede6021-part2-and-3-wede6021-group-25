<?php
include 'DBConn.php';

// DROP TABLE
$conn->query("DROP TABLE IF EXISTS tblUser");

// CREATE TABLE
$conn->query("CREATE TABLE tblUser (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    isVerified BOOLEAN DEFAULT 0
)");

// READ FILE
$file = fopen("userData.txt", "r");

while (($line = fgets($file)) !== false) {

    $data = explode(",", trim($line));

    $name = $data[0];
    $email = $data[1];
    $password = password_hash($data[2], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO tblUser(name,email,password)
                  VALUES('$name','$email','$password')");
}

fclose($file);

echo "Table created and data loaded from file";
?>