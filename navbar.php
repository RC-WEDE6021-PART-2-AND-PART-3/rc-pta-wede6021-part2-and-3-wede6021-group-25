<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #A084CA;
    padding: 15px 20px;
    color: white;
    position: relative;
}

.logo {
    font-size: 28px;
    font-weight: 700;
}

.menu-icon {
    font-size: 24px;
    cursor: pointer;
}

.nav-links {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 60px;
    right: 20px;
    background: #A084CA;
    padding: 10px;
    border-radius: 10px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    padding: 10px;
}

.nav-links a:hover {
    background: #8C6BB1;
    border-radius: 8px;
}
</style>

<div class="navbar">
    <div class="logo">Pastimes 💜</div>

    <div class="menu-icon" onclick="toggleMenu()">☰</div>

    <div id="menu" class="nav-links">
        <a href="index.php">Home</a>
        <a href="clothes.php">Shop</a>

        <?php if(isset($_SESSION['userID'])): ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>

        <a href="adminLogin.php">Admin</a>
    </div>
</div>

<script>
function toggleMenu() {
    let menu = document.getElementById("menu");
    menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
}
</script>