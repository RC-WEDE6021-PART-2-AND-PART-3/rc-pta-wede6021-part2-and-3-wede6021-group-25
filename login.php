<?php
session_start();
include 'DBConn.php';

$error = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        $result = $conn->query("SELECT * FROM tblUser WHERE email='$email'");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {

                if ($row['isVerified'] == 1) {

                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];

                    echo "<script>
                        alert('User ".$row['name']." is logged in💜!');
                        window.location='dashboard.php';
                    </script>";
                    exit();

                } else {
                    $error = "Account not verified yet. Please wait for admin approval.";
                }

            } else {
                $error = "Incorrect password.";
            }

        } else {
            $error = "User not found.";
        }

    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login | Pastimes</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>

.login-container {
    background: white;
    width: 400px;
    margin: 120px auto;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
}

.login-container h2 {
    margin-bottom: 20px;
}

.login-container input {
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

<div class="login-container">

    <h2>Welcome Back 💜</h2>

    <form method="POST">

        <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" value="Login" class="btn">

    </form>

    <p class="error"><?php echo $error; ?></p>

    <p>Don't have an account? <a href="register.php">Register</a></p>

</div>

<footer>
    <p>© 2026 Pastimes | Login 💜</p>
</footer>

</body>
</html>