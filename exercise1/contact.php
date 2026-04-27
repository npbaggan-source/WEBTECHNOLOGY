<?php
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = htmlspecialchars(trim($_POST["message"]));
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $successMsg = "Thank you, $name! Your message has been received.";
        $name = $email = $message = "";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Me</title>
</head>
<body>

<h1>Contact Me</h1>

<hr>

<a href="index.html">Home</a> |
<a href="about.html">About Me</a> |
<a href="projects.html">Projects</a> |
<a href="contact.php">Contact</a>

<hr>

<p>Email: nihal@example.com</p>
<p>Phone: 9876543210</p>

<h2>Send a Message</h2>

<?php if(!empty($successMsg)) { echo "<p style='color:green'>$successMsg</p>"; } ?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <br>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $nameErr;?></span><br><br>

    Email: <br>
    <input type="email" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $emailErr;?></span><br><br>

    Message: <br>
    <textarea name="message" rows="4" cols="30"><?php echo $message; ?></textarea>
    <span style="color:red;"><?php echo $messageErr;?></span><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
