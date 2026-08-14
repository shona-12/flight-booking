<?php

$from = $_GET["from"] ?? "";
$to = $_GET["to"] ?? "";
$price = $_GET["price"] ?? 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Flight - SkyBook</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>✈️ SkyBook</h1>
</header>

<div class="booking">

    <h2>Complete Your Booking</h2>

    <p>
        <strong>Flight:</strong>
        <?= htmlspecialchars($from) ?>
        →
        <?= htmlspecialchars($to) ?>
    </p>

    <p>
        <strong>Price:</strong>
        ₹<?= number_format((float)$price) ?>
    </p>

    <form action="success.php" method="POST">

        <input type="hidden" name="from"
               value="<?= htmlspecialchars($from) ?>">

        <input type="hidden" name="to"
               value="<?= htmlspecialchars($to) ?>">

        <input type="hidden" name="price"
               value="<?= htmlspecialchars($price) ?>">

        <label>Passenger Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Number of Passengers</label>
        <input type="number" name="passengers"
               min="1" max="10" required>

        <button type="submit">Confirm Booking</button>

    </form>

</div>

</body>
</html>
