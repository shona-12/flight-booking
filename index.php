
<?php
$flights = [
    ["id" => 1, "from" => "Chennai", "to" => "Delhi", "time" => "06:30 AM", "price" => 4500],
    ["id" => 2, "from" => "Mumbai", "to" => "Bangalore", "time" => "10:15 AM", "price" => 3200],
    ["id" => 3, "from" => "Chennai", "to" => "Mumbai", "time" => "02:45 PM", "price" => 3800],
    ["id" => 4, "from" => "Bangalore", "to" => "Delhi", "time" => "07:20 PM", "price" => 5200]
];

$fromSearch = trim($_GET["from"] ?? "");
$toSearch = trim($_GET["to"] ?? "");

$filteredFlights = array_filter($flights, function ($flight) use ($fromSearch, $toSearch) {
    $fromMatch = $fromSearch === "" ||
        stripos($flight["from"], $fromSearch) !== false;

    $toMatch = $toSearch === "" ||
        stripos($flight["to"], $toSearch) !== false;

    return $fromMatch && $toMatch;
});
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SkyBook - Flight Booking</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="hero">

    <div class="hero-content">
        <h1>✈️ SkyBook</h1>

        <p>Fly smarter. Travel farther.</p>

        <span>Find your perfect flight and book your journey with ease.</span>
    </div>

</header>

<section class="search-box">

    <h2>Find Your Flight</h2>

    <form method="GET">

        <div class="search-fields">

            <div>
                <label>From</label>
                <input
                    type="text"
                    name="from"
                    placeholder="e.g. Chennai"
                    value="<?= htmlspecialchars($fromSearch) ?>"
                >
            </div>

            <div>
                <label>To</label>
                <input
                    type="text"
                    name="to"
                    placeholder="e.g. Delhi"
                    value="<?= htmlspecialchars($toSearch) ?>"
                >
            </div>

            <button type="submit">🔍 Search Flights</button>

        </div>

    </form>

</section>

<section class="search">

    <h2>Available Flights</h2>

    <?php if (empty($filteredFlights)): ?>

        <div class="no-results">
            <h3>😕 No flights found</h3>
            <p>Try searching for another destination.</p>
            <a href="index.php">View All Flights</a>
        </div>

    <?php else: ?>

        <?php foreach ($filteredFlights as $flight): ?>

            <div class="flight">

                <div class="flight-info">

                    <span class="flight-label">FLIGHT <?= $flight["id"] ?></span>

                    <h3>
                        <?= htmlspecialchars($flight["from"]) ?>
                        <span class="arrow">✈</span>
                        <?= htmlspecialchars($flight["to"]) ?>
                    </h3>

                    <p>🕐 Departure: <?= htmlspecialchars($flight["time"]) ?></p>

                </div>

                <div class="flight-price">

                    <span>Starting from</span>

                    <strong>
                        ₹<?= number_format($flight["price"]) ?>
                    </strong>

                    <form action="book.php" method="GET">

                        <input
                            type="hidden"
                            name="flight_id"
                            value="<?= $flight["id"] ?>"
                        >

                        <input
                            type="hidden"
                            name="from"
                            value="<?= htmlspecialchars($flight["from"]) ?>"
                        >

                        <input
                            type="hidden"
                            name="to"
                            value="<?= htmlspecialchars($flight["to"]) ?>"
                        >

                        <input
                            type="hidden"
                            name="price"
                            value="<?= $flight["price"] ?>"
                        >

                        <button type="submit">
                            Book Now →
                        </button>

                    </form>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</section>

<footer>
    <p>© 2026 SkyBook Flight Booking</p>
    <p>Safe journeys. Happy travels. ✈️</p>
</footer>

</body>
</html>
