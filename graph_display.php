<?php
    ini_set("session.cache_limiter", "must-revalidate");
    session_start();
    $shop_id = $_SESSION['shop_id'];
header('Content-Type: application/json');

// Database connection setup
$host = 'localhost';
$db = 'IMS';
$user = 'root';
$pass = 'MySenseofTime...0';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve filters from GET parameters
$category = $_GET['category'];
$startDate = $_GET['start_date'];
$endDate = $_GET['end_date'];

// Build the SQL query based on the filters
$sql = "SELECT Product.product_name, SUM(Purchase.quantity) AS total_quantity FROM Purchase JOIN Product ON Purchase.product_id=Product.product_id WHERE Product.shop_id = '$shop_id'";
//SELECT Product.product_name, SUM(Purchase.quantity) AS total_quantity FROM Purchase JOIN Product ON Purchase.product_id=Product.product_id WHERE Product.shop_id='823ddc8c92ac39ecc068' GROUP BY Product.product_name ORDER BY total_quantity;
//SELECT product_name, SUM(quantity) AS total_quantity FROM Purchase WHERE 1=1

// Apply category filter if not 'all'
if ($category !== 'all') {
    $sql .= " AND Product.category = '" . $conn->real_escape_string($category) . "'";
    //$sql .= " AND category = '" . $conn->real_escape_string($category) . "'";
}

// Apply date filters if provided
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND Purchase.purchase_date BETWEEN '" . $conn->real_escape_string($startDate) . "' AND '" . $conn->real_escape_string($endDate) . "'";
}

$sql .= " GROUP BY Product.product_name ORDER BY total_quantity DESC";

$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
