<?php
session_start();
include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $query = "INSERT INTO staff (name, position, salary) VALUES ('$name', '$position', $salary)";
    mysqli_query($conn, $query);
}

$staff = mysqli_query($conn, "SELECT * FROM staff");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Staff</h1>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Position:</label>
        <input type="text" name="position" required><br>
        <label>Salary:</label>
        <input type="number" step="0.01" name="salary" required><br>
        <button type="submit">Add Staff</button>
    </form>

    <h2>Staff List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($staff)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['position']; ?></td>
                <td><?php echo $row['salary']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
