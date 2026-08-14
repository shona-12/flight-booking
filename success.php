<?php

$name = trim($_POST["name"] ?? "Passenger");
$email = trim($_POST["email"] ?? "");
$from = $_POST["from"] ?? "";
$to = $_POST["to"] ?? "";
$price = (float)($_POST["price"] ?? 0);
$passengers = (int)($_POST["passengers"] ?? 1);

if ($passengers < 1) {
    $passengers = 1;
}

$total = $price * $passengers;

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Confirmed - SkyBook</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header class="small-header">

    <h1>✈️ SkyBook</h1>
    <p>Your journey is booked!</p>

</header>

<div class="success">

    <div class="success-icon">
        🎉
    </div>

    <h2>Booking Confirmed!</h2>

    <p>
        Thank you,
        <strong><?= htmlspecialchars($name) ?></strong>.
    </p>

    <?php if ($email !== ""): ?>

        <p>
            Confirmation details will be sent to
            <strong><?= htmlspecialchars($email) ?></strong>.
        </p>

    <?php endif; ?>

    <hr>

    <p>
        <strong>Flight</strong>
    </p>

    <h2>
        <?= htmlspecialchars($from) ?>
        ✈
        <?= htmlspecialchars($to) ?>
    </h2>

    <p>
        Passengers:
        <strong><?= htmlspecialchars($passengers) ?></strong>
    </p>

    <h3>
        Total:
        ₹<?= number_format($total) ?>
    </h3>

    <a href="index.php">
        Book Another Flight
    </a>

</div>

</body>
</html>
