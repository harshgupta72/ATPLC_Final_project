<?php
session_start();
require("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($db, "SELECT password FROM stud WHERE name = ?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_password);
    if (mysqli_stmt_fetch($stmt)) {
        if ($password === $db_password) {
            $_SESSION['user_name'] = $name;
            echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid username or password.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href='login.php';</script>";
        exit();
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
        a.hve:hover {
            color: red;
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
            <li><a href="booking_history.php">Booking History</a></li>
            <?php if(isset($_SESSION['user_name'])): ?>
                <li><a href="#" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; cursor: default; text-decoration: none;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                <li><a href="logout.php" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; text-decoration: none;">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<section>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>If you are a new user.</p><a class="hve" href="signup.html">(Signup Now)</a>
    </div>
</section>

</body>
</html>
