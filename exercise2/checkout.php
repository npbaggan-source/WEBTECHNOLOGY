<?php
session_start();

$nameErr = $emailErr = $paymentErr = "";
$name = $email = $phone = $payment = $card = "";
$orderMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
            $isValid = false;
        }
    }

    if (empty($_POST["payment"])) {
        $paymentErr = "Payment method is required";
        $isValid = false;
    } else {
        $payment = htmlspecialchars($_POST["payment"]);
    }

    $phone = isset($_POST["phone"]) ? htmlspecialchars(trim($_POST["phone"])) : "";
    $card = isset($_POST["card"]) ? htmlspecialchars(trim($_POST["card"])) : "";

    if ($isValid) {
        $_SESSION["user_name"] = $name;
        $orderMsg = "Order placed successfully! Check the Home page.";
        $name = $email = $phone = $payment = $card = "";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ShopEasy - Checkout</title>
</head>

<body>

<header>
    <h1>Checkout</h1>
    <nav>
        <a href="index.php">Home</a> |
        <a href="products.php">Products</a> |
        <a href="checkout.php">Checkout</a>
    </nav>
    <hr>
</header>

<section>
    <h2>Billing Details</h2>

    <?php if(!empty($orderMsg)) echo "<h3 style='color:green;'>$orderMsg</h3>"; ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <fieldset>
            <legend>Personal Information</legend>

            Name: <br>
            <input type="text" name="name" value="<?php echo $name; ?>" required>
            <span style="color:red;"><?php echo $nameErr;?></span><br><br>

            Email: <br>
            <input type="email" name="email" value="<?php echo $email; ?>" required>
            <span style="color:red;"><?php echo $emailErr;?></span><br><br>

            Phone: <br>
            <input type="tel" name="phone" value="<?php echo $phone; ?>"><br><br>
        </fieldset>

        <fieldset>
            <legend>Payment Method</legend>
            <span style="color:red;"><?php echo $paymentErr;?></span><br>

            <input type="radio" name="payment" value="Credit Card" <?php if($payment=="Credit Card") echo "checked";?>> Credit Card <br>
            <input type="radio" name="payment" value="Debit Card" <?php if($payment=="Debit Card") echo "checked";?>> Debit Card <br>
            <input type="radio" name="payment" value="UPI" <?php if($payment=="UPI") echo "checked";?>> UPI <br><br>

            Card Number: <br>
            <input type="number" name="card" value="<?php echo $card; ?>"><br><br>
        </fieldset>

        <label>Order Progress:</label>
        <progress value="70" max="100"></progress><br><br>

        <input type="submit" value="Place Order">

    </form>
</section>

<section>
    <h3>Customer Support Audio</h3>
    <audio controls>
        <source src="sample.mp3" type="audio/mpeg">
        Your browser does not support audio.
    </audio>
</section>

<footer>
    <hr>
    <p>Thank you for shopping with ShopEasy!</p>
</footer>

</body>
</html>
