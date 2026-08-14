<?php

$name = $_POST["name"] ?? "Passenger";
$from = $_POST["from"] ?? "";
$to = $_POST["to"] ?? "";
$price = $_POST["price"] ?? 0;
$passengers = $_POST["passengers"] ?? 1;

$total = $price * $passengers;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmed - SkyBook</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>✈️ SkyBook</h1>
</header>

<div class="success">

    <h2>🎉 Booking Confirmed!</h2>

    <p>Thank you, <strong><?= htmlspecialchars($name) ?></strong>.</p>

    <p>
        <?= htmlspecialchars($from) ?>
        →
        <?= htmlspecialchars($to) ?>
    </p>

    <p>
        Passengers: <?= htmlspecialchars($passengers) ?>
    </p>

    <h3>
        Total: ₹<?= number_format($total) ?>
    </h3>

    <a href="index.php">Book Another Flight</a>

</div>

</body>
</html>
