<?php
// Enable PHP error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if ($name === '' || $email === '' || $password === '') {
        echo "<script>alert('All fields are required.'); window.location.href='signup.php';</script>";
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address.'); window.location.href='signup.php';</script>";
        exit();
    }

    // Check if email already exists (case-insensitive)
    $check = mysqli_prepare($db, "SELECT email FROM stud WHERE LOWER(email) = LOWER(?)");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);
    if (mysqli_stmt_num_rows($check) > 0) {
        echo "<script>alert('Email already registered. Please login.'); window.location.href='login.php';</script>";
        exit();
    }
    mysqli_stmt_close($check);

    // Store password as plain text (not recommended for production)
    $query = "INSERT INTO stud (name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            echo "<script>alert('Signup successful!'); window.location.href='login.php';</script>";
            exit();
        } else {
            echo "<script>alert('Signup failed: " . addslashes(mysqli_stmt_error($stmt)) . "'); window.location.href='signup.php';</script>";
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Signup failed: Could not prepare statement.'); window.location.href='signup.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
        a.hv:hover {
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
            <?php if(isset($_SESSION['user_name'])): ?>
                <li><a href="#" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; cursor: default; text-decoration: none;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                <li><a href="logout.php" style="background: none; color: #fff; font-weight: bold; border-radius: 4px; padding: 8px 16px; text-decoration: none;">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<section>
    <div class="signup-container">
        <h2>Signup</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
        <p>If you already have an account.</p>
        <a class="hv" href="login.php">(Login Now)</a>
    </div>
</section>

</body>
</html>
