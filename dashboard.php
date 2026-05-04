<?php
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard | Pastimes</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
.dashboard-container {
    width: 80%;
    margin: 40px auto;
    text-align: center;
}

.welcome {
    font-size: 28px;
    margin-bottom: 20px;
}

.card {
    background: white;
    padding: 30px;
    border-radius: 20px;
    margin-bottom: 30px;
}

table {
    margin: auto;
    border-collapse: collapse;
    width: 60%;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
}

th {
    background: #A084CA;
    color: white;
}

.actions {
    margin-top: 20px;
}

.actions a {
    margin: 10px;
}
</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="dashboard-container">

    <div class="welcome">
        Welcome back, <?php echo $_SESSION['name']; ?> 💜
    </div>

    <!-- USER INFO -->
    <div class="card">
        <h3>Your Details</h3>

        <table>
            <tr>
                <th>User ID</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION['userID']; ?></td>
                <td><?php echo $_SESSION['email']; ?></td>
            </tr>
        </table>
    </div>

    <!-- ACTIONS -->
    <div class="card">
        <h3>Quick Actions</h3>

        <div class="actions">
            <a href="clothes.php"><button class="btn">Browse Shop</button></a>
            <a href="logout.php"><button class="btn">Logout</button></a>
        </div>
    </div>

</div>

<footer>
    <p>© 2026 Pastimes | Your Dashboard 💜</p>
</footer>

</body>
</html>