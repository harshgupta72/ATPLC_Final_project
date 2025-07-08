<?php
require("conn.php");  // Database connection file

$sql = "SELECT * FROM book ORDER BY check_in DESC";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking History</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }
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
<h2>Booking History</h2>

<table>
    <tr>
       
        <th>Name</th>
        <th>Email</th>
        <th>Room No</th>
        <th>Room Type</th>
        <th>Check-in</th>
        <th>Check-out</th>
    </tr>

    <?php
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                   
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['Room_no']}</td>
                    <td>{$row['Room_type']}</td>
                    <td>{$row['check_in']}</td>
                    <td>{$row['check_out']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No bookings found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
