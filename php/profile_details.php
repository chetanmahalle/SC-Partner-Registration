<?php
session_start();  // Start the session
require("db.php");  // Your database connection

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Clean and get POST data
    $first_name   = trim($_POST['first_name'] ?? '');
    $middle_name  = trim($_POST['middle_name'] ?? '');
    $last_name    = trim($_POST['last_name'] ?? '');
    $mobile_no    = trim($_POST['mobile_no'] ?? '');
    $email_input  = trim($_POST['email'] ?? '');
    $scp_id       = trim($_POST['scp_id'] ?? '');
    $password     = $_POST['password'] ?? '';
    $password_c   = $_POST['password_c'] ?? '';

    // Validate passwords match
    if ($password !== $password_c) {
        echo "password_mismatch";
        exit;
    }

    // Check for duplicate email
    if (!empty($email_input)) {
        $query = "SELECT * FROM signup WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email_input);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "User matched";
            exit;
        }
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare insert query
    $insert = "INSERT INTO signup (first_name, middle_name, last_name, mobile_no, email, scp_id, password) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insert);

    $stmt->bind_param("sssssss", $first_name, $middle_name, $last_name, $mobile_no, $email_input, $scp_id, $hashed_password);

    if ($stmt->execute()) {
        // Store user data in session for next steps
        $_SESSION['user_data'] = [
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'mobile_no' => $mobile_no,
            'email' => $email_input,
            'scp_id' => $scp_id,
        ];
        echo "success";
    } else {
        echo "Execute failed: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
