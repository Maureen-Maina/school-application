<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $query = "INSERT INTO students (name, age, email) VALUES ('$name', $age, '$email')";
    mysqli_query($conn, $query);
}

$students = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Students</h1>
    <nav>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="staff.php">Staff</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="contacts.php">Contacts</a></li>
        </ul>
    </nav>

    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Age:</label>
        <input type="number" name="age" required><br>
        <label>Email:</label>
        <input type="text" name="email" required><br>
        <button type="submit">Add Student</button>
    </form>

    <h2>Student List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($students)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
