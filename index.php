<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
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
                 <li><a href="booking_history.php">Booking History</a></li>
                <?php if(isset($_SESSION['user_name'])): ?>
                    <li><a href="#" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; cursor: default; text-decoration: none;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                    <li><a href="logout.php" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; text-decoration: none;">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section id="home" class="hero">
        <div class="hero-text">
            <img style="float:left;margin-top:-10px;" src="college.jpg" alt="College building">
            <h1>Welcome to Tathagat Boys' Hostel</h1>
            <p>Comfortable, affordable, and secure living experience.</p>
            <a href="room.php" class="btn" id="viewRoomsBtn">View Available Rooms</a>
        </div>
    </section>

    <div style="background-color:#97c4aa;">
        <img id="heroimg" src="hostel.jpg" alt="hostel pic" style="cursor:pointer;">
    </div>

    <footer>
        <p>&copy; <b> 2025 Tathagat Boys' Hostel. All rights reserved.</b></p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
