<?php
session_start();
include 'DBConn.php';

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM tblAdmin WHERE email='$email'");

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])){
            $_SESSION['admin'] = true;
            header("Location: admin.php");
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "Admin not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<style>
.admin-container {
    background: white;
    width: 420px;
    margin: 120px auto;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
}

.admin-container h2 {
    margin-bottom: 20px;
}

.admin-container input {
    width: 90%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
}

.error {
    color: red;
    margin-top: 10px;
}
</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="admin-container">

<h2>Admin Login 🔐</h2>

<form method="POST">

<input type="email" name="email" placeholder="Admin Email" required>
<input type="password" name="password" placeholder="Password" required>

<input type="submit" value="Login" class="btn">

</form>

<p class="error"><?php echo $error; ?></p>

</div>

<footer>
    <p>© 2026 Pastimes | Admin Access 💜</p>
</footer>

</body>
</html>