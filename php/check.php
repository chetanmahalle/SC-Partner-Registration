<?php
session_start();
require("db.php");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Check if email or password is missing
if (empty($email) || empty($password)) {
    echo "missing_fields";
    exit;
}

// Prepare and execute query to fetch user details
$stmt = $conn->prepare("SELECT id, email, password, otp_verified FROM signup WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if user exists and password is correct
if (!$user || !password_verify($password, $user['password'])) {
    echo "invalid"; // Invalid login details
    exit;
}

// Check if OTP is verified
if ($user['otp_verified'] != 1) {
    echo "otp_not_verified"; // OTP not verified yet
    exit;
}

// Set session data for the user
$_SESSION['user_data'] = [
    'id' => $user['id'],
    'email' => $user['email']
];

// Success response
echo "success";
?>
