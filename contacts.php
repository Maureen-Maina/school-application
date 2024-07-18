<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    mysqli_query($conn, $query);
}

$contacts = mysqli_query($conn, "SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Contacts</h1>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Message:</label>
        <textarea name="message" required></textarea><br>
        <button type="submit">Add Contact</button>
    </form>

    <h2>Contact List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($contacts)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['message']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
