<?php
// Enable PHP error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("conn.php");
session_start();

// Restrict access to view_booking.php so only logged-in users can view their bookings
if (!isset($_SESSION['user_name'])) {
    echo "<script>alert('Please login to view your bookings.'); window.location.href='login.php';</script>";
    exit();
}

// For demo: show all bookings for the logged-in user (by email) or all if not logged in
$email = '';
if (isset($_SESSION['user_email'])) {
    $email = $_SESSION['user_email'];
}

$query = $email ? mysqli_prepare($db, "SELECT * FROM book WHERE email = ?") : mysqli_prepare($db, "SELECT * FROM book");
if ($email) {
    mysqli_stmt_bind_param($query, "s", $email);
}
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="room.php">Rooms</a></li>
            <li><a href="facilities.php">Facilities</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="tel:+91-9523315572">Call me</a></li>
            <li><a href="mailto:harshgupta0704@gmail.com">E-mail</a></li>
            <?php if(isset($_SESSION['user_name'])): ?>
                <li><a href="#" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; cursor: default; text-decoration: none;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                <li><a href="logout.php" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; text-decoration: none;">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<section>
    <div class="booking-container">
        <h2>My Bookings</h2>
        <!-- Removed the booking table and section as per user request -->
    </div>
</section>
</body>
</html>
