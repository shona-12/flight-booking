<?php

$from = $_GET["from"] ?? "";
$to = $_GET["to"] ?? "";
$price = (float)($_GET["price"] ?? 0);
$flightId = $_GET["flight_id"] ?? "";

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Flight - SkyBook</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header class="small-header">

    <h1>✈️ SkyBook</h1>
    <p>Complete your journey</p>

</header>

<div class="booking">

    <div class="booking-title">

        <span>FLIGHT <?= htmlspecialchars($flightId) ?></span>

        <h2>Complete Your Booking</h2>

        <p>You're one step away from your journey.</p>

    </div>

    <div class="selected-flight">

        <div>

            <small>ROUTE</small>

            <h3>
                <?= htmlspecialchars($from) ?>
                ✈
                <?= htmlspecialchars($to) ?>
            </h3>

        </div>

        <div>

            <small>PRICE / PERSON</small>

            <h3>₹<?= number_format($price) ?></h3>

        </div>

    </div>

    <form action="success.php" method="POST">

        <input
            type="hidden"
            name="from"
            value="<?= htmlspecialchars($from) ?>"
        >

        <input
            type="hidden"
            name="to"
            value="<?= htmlspecialchars($to) ?>"
        >

        <input
            type="hidden"
            name="price"
            value="<?= htmlspecialchars($price) ?>"
        >

        <label>Passenger Name</label>

        <input
            type="text"
            name="name"
            placeholder="Enter passenger name"
            required
        >

        <label>Email Address</label>

        <input
            type="email"
            name="email"
            placeholder="Enter your email"
            required
        >

        <label>Number of Passengers</label>

        <input
            type="number"
            name="passengers"
            min="1"
            max="10"
            value="1"
            required
        >

        <button type="submit">
            Confirm Booking ✈️
        </button>

    </form>

    <a class="back-link" href="index.php">
        ← Back to flights
    </a>

</div>

</body>
</html>
