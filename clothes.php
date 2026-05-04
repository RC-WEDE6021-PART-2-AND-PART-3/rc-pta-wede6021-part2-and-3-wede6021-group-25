<?php
session_start();
include 'DBConn.php';

// CHECK LOGIN STATUS
$isLoggedIn = false;

if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    $isLoggedIn = true;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Shop | Pastimes</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
.shop-title {
    text-align: center;
    margin-top: 30px;
    font-size: 32px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    padding: 40px;
}

.card {
    background: white;
    border-radius: 15px;
    padding: 15px;
    text-align: center;
    transition: 0.3s;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.card:hover {
    transform: translateY(-5px);
}

.card img {
    width: 100%;
    border-radius: 10px;
}

.price {
    font-size: 18px;
    margin: 10px 0;
}
</style>

<script>
function addToCart(price) {

    let isLoggedIn = <?php echo $isLoggedIn ? 1 : 0; ?>;

    if (isLoggedIn === 0) {
        alert("Join Pastimes 💜 to continue shopping and save your items.");
        window.location = "register.php";
        return;
    }

    alert("Item added to cart 💜\nPrice: R" + price);
}
</script>

</head>

<body>

<?php include 'navbar.php'; ?>

<h2 class="shop-title">Shop Our Collection ✨</h2>

<div class="grid">

<?php
$result = $conn->query("SELECT * FROM tblClothes");

while($row = $result->fetch_assoc()){
echo "
<div class='card'>
    <img src='images/".$row['image']."'>
    <h3>".$row['itemName']."</h3>
    <p class='price'>R".$row['price']."</p>
    <button class='btn' onclick='addToCart(".$row['price'].")'>Add to Cart</button>
</div>
";
}
?>

</div>

<footer>
    <p>© 2026 Pastimes | Shop Sustainably 💜</p>
</footer>

</body>
</html>