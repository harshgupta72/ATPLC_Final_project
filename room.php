<?php session_start(); ?>
<!DOCTYPE>
<html 
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
    <section id="rooms">
        <h2>Available Rooms</h2>
        <div class="room-container">
            <div class="room">
                <img src="single.jpeg" alt="Room 1">
                <h3>Single Room</h3>
                <p>Perfect for individual stays.</p>
                <button class="btn" onclick="window.location.href='booking.php'">Book Now</button>
            </div>
            <div class="room">
                <img src="double.jpeg" alt="Room 2">
                <h3>Double Room</h3>
                <p>For two people sharing a room.</p>
                <button class="btn" onclick="window.location.href='booking.php'">Book Now</button>
            </div>
            <div class="room">
                <img src="triple.jpeg" alt="Room 3">
                <h3>Triple Room</h3>
                <p>Spacious and ideal for families.</p>
                <button class="btn" onclick="window.location.href='booking.php'">Book Now</button>
            </div>
        </div>
    </section>
	
    <footer>
        <p>&copy; <b> 2025 Tathagat Boys' Hostel. All rights reserved.</b></p>
    </footer>
</body>
</html>