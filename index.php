<?php
$flights = [
    ["id" => 1, "from" => "Chennai", "to" => "Delhi", "time" => "06:30 AM", "price" => 4500],
    ["id" => 2, "from" => "Mumbai", "to" => "Bangalore", "time" => "10:15 AM", "price" => 3200],
    ["id" => 3, "from" => "Chennai", "to" => "Mumbai", "time" => "02:45 PM", "price" => 3800],
    ["id" => 4, "from" => "Bangalore", "to" => "Delhi", "time" => "07:20 PM", "price" => 5200]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>SkyBook - Flight Booking</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>✈️ SkyBook</h1>
    <p>Book your next journey with us</p>
</header>

<section class="search">
    <h2>Available Flights</h2>

    <?php foreach ($flights as $flight): ?>

        <div class="flight">

            <div>
                <h3>
                    <?= htmlspecialchars($flight["from"]) ?>
                    →
                    <?= htmlspecialchars($flight["to"]) ?>
                </h3>

                <p>Departure: <?= htmlspecialchars($flight["time"]) ?></p>
            </div>

            <div>
                <strong>₹<?= number_format($flight["price"]) ?></strong>

                <form action="book.php" method="GET">
                    <input type="hidden" name="flight_id"
                           value="<?= $flight["id"] ?>">

                    <input type="hidden" name="from"
                           value="<?= htmlspecialchars($flight["from"]) ?>">

                    <input type="hidden" name="to"
                           value="<?= htmlspecialchars($flight["to"]) ?>">

                    <input type="hidden" name="price"
                           value="<?= $flight["price"] ?>">

                    <button type="submit">Book Now</button>
                </form>
            </div>

        </div>

    <?php endforeach; ?>

</section>

<footer>
    <p>© 2026 SkyBook Flight Booking</p>
</footer>

</body>
</html>
