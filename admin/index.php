<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

// Database configuration
$host = 'sql107.infinityfree.com';
$username = 'if0_35587165';
$password = 'Lj0VRCmxEx';
$database = 'if0_35587165_asddas';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert data into the database
function insertData($name, $age)
{
    global $conn;

    $stmt = $conn->prepare("INSERT INTO userss (name, age) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $age);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to retrieve data from the database
function getUsers()
{
    global $conn;

    $result = $conn->query("SELECT * FROM userss");

    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return array();
    }
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Insert data into the database
    if (insertData($name, $age)) {
        echo "Data added successfully!";
    } else {
        echo "Error adding data.";
    }
}

// Get users from the database
$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD App with Bootstrap</title>

    <!-- Include Bootstrap CSS (CDN link) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Home Page</h2>
        </div>
        <div class="card-body">

            <!-- Add User Form -->
            <h3>Add User</h3>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" id="age" name="age" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>

            <!-- Display Users -->
            <h3 class="mt-4">Users</h3>
            <ul class="list-group">
                <?php foreach ($users as $user): ?>
                    <li class="list-group-item"><?php echo $user['name'] . ', ' . $user['age'] . ' years old'; ?></li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>

    <!-- Logout link -->
    <div class="mt-4">
        <p> Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="index.php?logout='1'" class="btn btn-danger">Logout</a> </p>
    </div>

</div>

<!-- Include Bootstrap JS (CDN link) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
