<!DOCTYPE html>
<html>
<head>
    <title>ShopEasy - Products</title>
</head>

<body>

<header>
    <h1>Our Products</h1>
    <nav>
        <a href="index.php">Home</a> |
        <a href="products.php">Products</a> |
        <a href="checkout.php">Checkout</a>
    </nav>
    <hr>
</header>

<section>
    <article>
        <h2>Electronics</h2>

        <table border="1" cellpadding="10">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Availability</th>
            </tr>
            <?php
            // Connect to database
            $conn = @new mysqli("localhost", "root", "", "shopeasy");
            
            if ($conn->connect_error) {
                echo "<tr><td colspan='3'>Database connection failed. <a href='db_setup.php'>Click here to initialize DB</a>.</td></tr>";
            } else {
                $sql = "SELECT name, price, availability FROM products";
                $result = $conn->query($sql);
                
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>₹" . number_format($row["price"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["availability"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No products found.</td></tr>";
                }
                $conn->close();
            }
            ?>
        </table>
    </article>
</section>

<section>
    <h3>Product Demo Video</h3>
    <video width="320" controls>
        <source src="sample.mp4" type="video/mp4">
        Your browser does not support video.
    </video>
</section>

<footer>
    <hr>
    <p>Browse more categories soon!</p>
</footer>

</body>
</html>
