<?php
session_start();
require("db.php");

// Check if user is logged in
if (!isset($_SESSION['user_data'])) {
    echo "User not logged in";
    exit;
}

// Get the user ID from session
$user_id = $_SESSION['user_data']['id'];

// Dynamically create table name for each user
$table_name = "farmers_" . intval($user_id) . "_profile_full";

// Collect POST data (same names as frontend)
$fields = [
    'first_name', 'middle_name', 'last_name', 'mobile_no', 'dob', 'gender', 'new_business',
    'state', 'district', 'taluka', 'village', 'pincode', 'street', 'residence',
    'farmer_type', 'crops', 'cropsGrown', 'market',
    'land_state', 'land_district', 'land_taluka', 'land_village', 'survey_no', 'sub_survey_no', 'owner_name'
];

// Sanitize and collect the data
$data = [];
foreach ($fields as $field) {
    $data[$field] = trim($_POST[$field] ?? '');  // Handle missing fields gracefully
}

// Create table if it doesn't exist
$create_sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    middle_name VARCHAR(100),
    last_name VARCHAR(100),
    mobile_no VARCHAR(15),
    dob VARCHAR(20),
    gender VARCHAR(10),
    new_business VARCHAR(10),
    state VARCHAR(100),
    district VARCHAR(100),
    taluka VARCHAR(100),
    village VARCHAR(100),
    pincode VARCHAR(10),
    street VARCHAR(255),
    residence VARCHAR(50),
    farmer_type TEXT,
    crops TEXT,
    cropsGrown VARCHAR(255),
    market VARCHAR(100),
    land_state VARCHAR(100),
    land_district VARCHAR(100),
    land_taluka VARCHAR(100),
    land_village VARCHAR(100),
    survey_no VARCHAR(100),
    sub_survey_no VARCHAR(100),
    owner_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the table creation query
if (!$conn->query($create_sql)) {
    echo "Table creation failed: " . $conn->error;
    exit;
}

// Prepare the SQL insert query
$placeholders = implode(",", array_fill(0, count($fields), "?"));
$columns = implode(",", $fields);
$insert_sql = "INSERT INTO `$table_name` ($columns) VALUES ($placeholders)";

// Prepare the statement for insertion
$stmt = $conn->prepare($insert_sql);
if (!$stmt) {
    echo "Prepare failed: " . $conn->error;
    exit;
}

// Bind the parameters dynamically based on the type of data (all string values)
$types = str_repeat("s", count($fields));  // Assuming all fields are strings
$stmt->bind_param($types, ...array_values($data));

// Execute the query
if ($stmt->execute()) {
    echo "success";  // Data inserted successfully
} else {
    echo "Insert failed: " . $stmt->error;  // Handle insertion errors
}

// Clean up and close connections
$stmt->close();
$conn->close();
?>
