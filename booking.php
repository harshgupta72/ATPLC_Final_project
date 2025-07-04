<?php
// Enable PHP error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $Room_no = mysqli_real_escape_string($db, $_POST['Room_no']);
    $Room_type = mysqli_real_escape_string($db, $_POST['Room_type']);
    $check_in = mysqli_real_escape_string($db, $_POST['check_in']);
    $check_out = mysqli_real_escape_string($db, $_POST['check_out']);

    // Check if email already exists in the book table before inserting
    $check = mysqli_prepare($db, "SELECT email FROM book WHERE email = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);
    if (mysqli_stmt_num_rows($check) > 0) {
        echo "<script>alert('This email has already booked a room.'); window.location.href='booking.php';</script>";
        mysqli_stmt_close($check);
        exit();
    }
    mysqli_stmt_close($check);

    $query = mysqli_prepare($db, "INSERT INTO book(name, email, Room_no, Room_type, check_in, check_out) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($query, "ssssss", $name, $email, $Room_no, $Room_type, $check_in, $check_out);
    $result = mysqli_stmt_execute($query);

    if ($result) {
        echo "<script>
                alert('Booking successful!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Error: " . mysqli_stmt_error($query);
    }
    mysqli_stmt_close($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        section {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .booking-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            text-align: center;
            width: 320px;
            transition: transform 0.3s;
        }

        .booking-container:hover {
            transform: scale(1.03);
        }

        input, select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s;
        }

        input:focus, select:focus {
            border: 2px solid #2193b0;
            outline: none;
        }

        button {
            width: 95%;
            padding: 12px;
            background-color: #2193b0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        button:hover {
            background-color: #19798f;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }
    </style>
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
        <h2>Book a Room</h2>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="Room_no" placeholder="Room Number" required><br>
            
            <select name="Room_type" required>
                <option value="">Select Room Type</option>
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple Room">Triple Room</option>
            </select><br>
            
            <label>Check-In:</label><br>
            <input type="date" name="check_in" required><br>
            
            <label>Check-Out:</label><br>
            <input type="date" name="check_out" required><br>
            
            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</section>

</body>
</html>
