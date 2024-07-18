<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];

    $query = "INSERT INTO courses (course_name, description) VALUES ('$course_name', '$description')";
    mysqli_query($conn, $query);
}

$courses = mysqli_query($conn, "SELECT * FROM courses");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Courses</h1>
    <form method="POST" action="">
        <label>Course Name:</label>
        <input type="text" name="course_name" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <button type="submit">Add Course</button>
    </form>

    <h2>Course List</h2>
    <table>
        <tr>
            <th>Course Name</th>
            <th>Description</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($courses)): ?>
            <tr>
                <td><?php echo $row['course_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
