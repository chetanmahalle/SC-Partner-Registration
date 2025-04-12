<?php
session_start();
require("db.php");

if (!isset($_SESSION['user_data'])) {
    echo "unauthorized";
    exit;
}

$email = $_SESSION['user_data']['email'];
$entered_otp = $_POST['otp'] ?? '';

// Step 1: Fetch OTP and timestamp
$stmt = $conn->prepare("SELECT otp, created_at FROM signup WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($stored_otp, $created_at);
$stmt->fetch();
$stmt->close();

if (!$stored_otp || !$created_at) {
    echo "otp_not_found";
    exit;
}

// Step 2: Match OTP
if ($entered_otp != $stored_otp) {
    echo "invalid_otp";
    exit;
}

// Step 3: Check expiry (5 mins = 300 seconds)
$otp_time = strtotime($created_at);
if (time() - $otp_time > 300) {
    echo "otp_expired";
    exit;
}

// Step 4: Success
echo "otp_verified";
?>
