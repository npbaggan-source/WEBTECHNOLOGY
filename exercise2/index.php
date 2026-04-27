<?php
session_start();

$lastVisitMsg = "Welcome to ShopEasy for the first time!";
if (isset($_COOKIE['last_visit'])) {
    $lastVisitMsg = "Your last visit was on: " . $_COOKIE['last_visit'];
}
setcookie('last_visit', date("Y-m-d H:i:s"), time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html>
<head>
    <title>ShopEasy - Home</title>
    <meta charset="UTF-8">
</head>

<body>

<header>
    <h1>🛒 ShopEasy Online Store</h1>
    <nav>
        <a href="index.php">Home</a> |
        <a href="products.php">Products</a> |
        <a href="checkout.php">Checkout</a>
    </nav>
    <hr>
</header>

<section>
    <h2>Welcome to ShopEasy<?php if(isset($_SESSION['user_name'])) echo ", " . htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    <p>Your one-stop online shopping destination.</p>
    <p style="font-weight: bold; color: #007bff;"><?php echo $lastVisitMsg; ?></p>

    <figure>
        <img src="https://via.placeholder.com/600x200" alt="Store Banner">
        <figcaption>Best Deals Everyday!</figcaption>
    </figure>
</section>

<section>
    <h3>Special Offer</h3>
    <details>
        <summary>Click to View Offer</summary>
        <p>Flat 20% discount on all electronics!</p>
    </details>
</section>

<aside>
    <h3>Customer Satisfaction</h3>
    <label>Rating:</label>
    <meter value="4.5" min="0" max="5"></meter>
</aside>

<footer>
    <hr>
    <p>&copy; 2026 ShopEasy. All rights reserved.</p>
</footer>

</body>
</html>
