<?php
session_start();
require("db.php"); // your DB connection file

if (!isset($_SESSION['user_data'])) {
    echo "unauthorized";
    exit;
}

$email = $_SESSION['user_data']['email'];
$v = 1;

// Step 1: Get mobile number
$query = "SELECT mobile_no FROM signup WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($mobile_number);
$stmt->fetch();
$stmt->close();

if (!$mobile_number) {
    echo "mobile_not_found";
    exit;
}

// Step 2: Generate OTP
$otp = rand(100000, 999999);

// Step 3: Save OTP in session
$_SESSION['otp'] = $otp;
$_SESSION['otp_created_at'] = time();

// Step 4: Update OTP in database
$otp_verified = 1;
$update = $conn->prepare("UPDATE signup SET otp = ?, created_at = NOW(), otp_verified = ? WHERE email = ?");
$update->bind_param("sis", $otp, $otp_verified, $email);
$update->execute();


if ($update->affected_rows === 0) {
    // If no row was updated, the email might not exist — optional fallback
    echo "no_record_to_update";
    $update->close();
    exit;
}
$update->close();

// Step 5: Send SMS using Fast2SMS API
$api_key = "YOUR_FAST2SMS_API_KEY"; // Replace with your actual key
$sender_id = "FSTSMS";
$message = "Your OTP is $otp. Please do not share it with anyone.";
$route = "p";
$numbers = $mobile_number;

$postData = array(
    'sender_id' => $sender_id,
    'message' => $message,
    'language' => 'english',
    'route' => $route,
    'numbers' => $numbers,
);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($postData),
    CURLOPT_HTTPHEADER => array(
        "authorization: $api_key",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "sms_error: $err";
} else {
    // You can decode response if needed
    echo "success";
}
?>
