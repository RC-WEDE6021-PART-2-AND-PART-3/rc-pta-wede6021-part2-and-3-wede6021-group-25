<!DOCTYPE html>
<html>
<head>
<title>Pastimes</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>

/* HERO */
.hero {
    text-align: center;
    padding: 120px 20px;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 10px;
}

.hero p {
    font-size: 18px;
    margin-bottom: 20px;
}

/* SECTION */
.section {
    background: white;
    margin: 40px;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
}

/* IMAGE GRID */
.featured {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.featured img {
    width: 200px;
    border-radius: 15px;
}

</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<!-- HERO -->
<div class="hero">
    <h1>Pastimes 💜</h1>
    <p>Reimagine your closet sustainably</p>
    <a href="clothes.php"><button class="btn">Shop Now</button></a>
</div>

<!-- ABOUT -->
<div class="section">
    <h2>About Pastimes</h2>
    <p>
        Pastimes is a second-hand clothing platform that promotes sustainable fashion.
        Buy and sell pre-loved clothes while reducing waste and embracing unique styles.
    </p>
</div>

<!-- FEATURED -->
<div class="section">
    <h2>Featured Styles ✨</h2>

    <div class="featured">
        <img src="images/jacket.png">
        <img src="images/dress.png">
        <img src="images/hoodie.png">
    </div>
</div>

<!-- WHY CHOOSE US -->
<div class="section">
    <h2>Why Choose Us?</h2>
    <p>
        ✔ Affordable fashion  
        ✔ Sustainable shopping  
        ✔ Unique pre-loved styles  
    </p>
</div>

<footer>
    <p>© 2026 Pastimes | Sustainable Fashion 💜</p>
</footer>

</body>
</html>