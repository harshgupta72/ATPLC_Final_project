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
                <?php if(isset($_SESSION['user_name'])): ?>
                    <li><a href="#" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; cursor: default; text-decoration: none;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                    <li><a href="logout.php" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; text-decoration: none;">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
	
    <section id="facilities">       
	<h2 style="text-align:center;background-color:#d6e8b0;">Our Facilities</h2>

	<div class="fac-container">
        <div>
		 <img src="wifi.png" alt="Free Wi-Fi">
		 <h3>Free Wi-Fi</h3>
		</div>
		<div>
		<img src="security.png" alt="24 Hr security">
		<h3>24 Hr security</h3>
		</div>
		<div>
		<img src="Laundry.jpeg" alt="Laundry">
		<h3>Laundry</h3>
		</div>
	
	
		<div>
		<img src="mess.jpeg" alt="Mess facilities">
		<h3>mess facilities</h3>
		</div>
		<div>
		<img src="medical.png" alt="Medical room">
		<h3>medical room</h3>
		</div>
		<div>
		<img src="sports.jpeg" alt="Sports">
		<h3>Sports</h3>
		</div>
	</div>
    </section>
	
    <footer>
        <p>&copy; <b> 2025 Tathagat Boys' Hostel. All rights reserved.</b></p>
    </footer>
</body>
</html>