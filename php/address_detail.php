<?php
session_start();
require("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Check if user is logged in
    if (!isset($_SESSION['user_data'])) {
        echo "not_logged_in";
        exit();
    }

    // 2. Sanitize and get POST data
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $permanent_address = mysqli_real_escape_string($conn, $_POST['permanent_address']);
    $landmark = mysqli_real_escape_string($conn, $_POST['landmark']);
    $office_address = mysqli_real_escape_string($conn, $_POST['office_address']);

    // 3. File upload setup
    $upload_dir = "uploads/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $scp_cert_path = null;
    $office_photo_path = null;

    // Upload SCP Certificate
    if (!empty($_FILES['scp_certificate']['name'])) {
        $scp_cert_name = basename($_FILES['scp_certificate']['name']);
        $scp_cert_path = $upload_dir . time() . "_scp_" . $scp_cert_name;
        move_uploaded_file($_FILES['scp_certificate']['tmp_name'], $scp_cert_path);
    }

    // Upload Office Photo
    if (!empty($_FILES['office_photo']['name'])) {
        $office_photo_name = basename($_FILES['office_photo']['name']);
        $office_photo_path = $upload_dir . time() . "_office_" . $office_photo_name;
        move_uploaded_file($_FILES['office_photo']['tmp_name'], $office_photo_path);
    }

    // 4. Build UPDATE query
    $sql = "UPDATE signup SET 
                state = ?, 
                district = ?, 
                pincode = ?, 
                address = ?, 
                land_mark = ?, 
                office_address = ?";

    if ($scp_cert_path !== null) {
        $sql .= ", scp_certificate = ?";
    }

    if ($office_photo_path !== null) {
        $sql .= ", office_photo = ?";
    }

    $sql .= " WHERE email = ?";

    // 5. Prepare statement
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "prepare_failed: " . $conn->error;
        exit();
    }

    // 6. Bind parameters dynamically
    $params = [$state, $district, $pincode, $permanent_address, $landmark, $office_address];
    $types = "ssssss";

    if ($scp_cert_path !== null) {
        $params[] = $scp_cert_path;
        $types .= "s";
    }

    if ($office_photo_path !== null) {
        $params[] = $office_photo_path;
        $types .= "s";
    }

    $params[] = $_SESSION['user_data']['email'];
    $types .= "s";

    $stmt->bind_param($types, ...$params);

    // 7. Execute and return response
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "db_error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
