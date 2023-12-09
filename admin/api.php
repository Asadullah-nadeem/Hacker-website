<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
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

// Handle only GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GET request for retrieving user data
    $users = getUsers();

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($users);
} else {
    // Unsupported method
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Method not allowed. Only GET requests are supported."]);
    exit(); // Stop execution for non-GET requests
}
