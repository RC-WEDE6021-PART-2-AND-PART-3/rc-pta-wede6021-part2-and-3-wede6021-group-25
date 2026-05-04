<?php
include 'DBConn.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($email) && !empty($password)) {

        $check = $conn->query("SELECT * FROM tblUser WHERE email='$email'");

        if ($check->num_rows > 0) {
            $error = "Email already exists.";
        } else {

            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $conn->query("INSERT INTO tblUser(name,email,password,isVerified)
                          VALUES('$name','$email','$hashed',0)");

            echo "<script>
                alert('Welcome $name 💜! Please wait for admin verification.');
                window.location='login.php';
            </script>";
        }

    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register | Pastimes</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>

.register-container {
    background: white;
    width: 400px;
    margin: 120px auto;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
}

.register-container h2 {
    margin-bottom: 20px;
}

.register-container input {
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

<div class="register-container">

    <h2>Join Pastimes 💜</h2>

    <form method="POST">

        <input type="text" name="name" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" value="Register" class="btn">

    </form>

    <p class="error"><?php echo $error; ?></p>

    <p>Already have an account? <a href="login.php">Login</a></p>

</div>

<footer>
    <p>© 2026 Pastimes | Join Us 💜</p>
</footer>

</body>
</html>