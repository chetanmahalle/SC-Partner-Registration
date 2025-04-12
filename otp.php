<?php
session_start();
require("php/db.php");

// Check login
if (!isset($_SESSION['user_data'])) {
    die("User not logged in");
}

$email = $_SESSION['user_data']['email'];
$query = "SELECT mobile_no FROM signup WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($mobile_number);
$stmt->fetch();
$stmt->close();
$conn->close();

// Format: Show first 6 digits, mask last 4
$masked_number = substr($mobile_number, 0, 6) . "XXXX";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Otp Page</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&family=Maven+Pro:wght@400..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
  <style>

    .logo-box {
      display: flex;
      align-items: center;
    }
    .logo-block {
      width: 50px;
      height: 50px;
      background-color: #3f3f3f;
    }
    .logo-divider {
      width: 2px;
      height: 40px;
      background-color: #198754;
      margin: 0 10px;
    }
    .logo-text {
      font-weight: 600;
      color: #198754;
    }
    .icon-box {
      text-align: center;
      position: relative;
    }
    .icon-box i {
      font-size: 22px;
      color: #3f3f3f;
    }
    .icon-box .badge-dot {
      position: absolute;
      top: -4px;
      right: 10px;
      width: 10px;
      height: 10px;
      background-color: red;
      border-radius: 50%;
    }
    .login-box {
      border: 1px solid #bbb;
      border-radius: 8px;
      padding: 5px 10px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .login-icon {
      width: 40px;
      height: 40px;
      background-color: #bbb;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-icon i {
      color: white;
      font-size: 20px;
    }
    .login-info {
      line-height: 1.1;
    }
    .login-info b {
      font-size: 14px;
    }
    .login-info small {
      font-size: 12px;
    }
    .login-dropdown {
      background-color: #28a745;
      border: none;
      border-radius: 5px;
      padding: 5px 8px;
      color: white;
      font-size: 18px;
    }
       
    body {
      background-color: #f2f2f2;
    }
    .sidebar {
      width: 240px;
      background-color: #4caf50;
      color: white;
      position: fixed;
      top: 0;
      bottom: 0;
      padding-top: 80px;
    }
    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: white;
      text-decoration: none;
    }
    .sidebar a.active,
    .sidebar a:hover {
      background-color: white;
      color: #4caf50;
    }
    .header {
      background-color: white;
      padding: 10px 20px;
      border-bottom: 2px solid #4caf50;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .header .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .header .menu-icons {
      display: flex;
      align-items: center;
      gap: 20px;
    }
    .header .menu-icons i {
      font-size: 20px;
      cursor: pointer;
    }

    .content {
      margin-left: 240px;
      padding: 30px;
    }
    .form-step {
      font-weight: bold;
      text-align: right;
    }

     body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .otp-box {
      max-width: 1200px;
      margin: 60px auto;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
      padding: 20px;
    }
    .otp-alert {
      background-color: #fff9c4;
      border-radius: 5px;
      padding: 10px 15px;
      font-weight: 600;
    }
    .otp-bold {
      font-weight: 700;
    }
    .otp-subtext {
      font-size: 18px;
      font-weight: 500;
      margin-top: 15px;
    }
    .change-link {
      font-size: 14px;
      color: #007bff;
      text-decoration: underline;
      margin-top: 5px;
      display: inline-block;
      cursor: pointer;
    }
    .save-btn {
      background-color: #fdd835;
      color: #000;
      font-weight: 600;
      font-size: 18px;
      border: none;
      border-radius: 0;
      padding: 12px;
    }
    .save-btn:hover {
      background-color: #c0a000;
    }

    /* Change the scrollbar track (background) */
::-webkit-scrollbar {
  width: 12px; /* Width of the scrollbar */
  height: 12px; /* Height of horizontal scrollbar */
}

::-webkit-scrollbar-track {
  background-color: #f1f1f1; /* Track color */
  border-radius: 10px; /* Round the edges */
}

/* Change the scrollbar thumb (the draggable part) */
::-webkit-scrollbar-thumb {
  background-color: #4caf50; /* Thumb color */
  border-radius: 10px; /* Round the thumb edges */
}

/* Change the scrollbar thumb on hover */
::-webkit-scrollbar-thumb:hover {
  background-color: #45a049; /* Slightly darker shade on hover */
}

   
  </style>
</head>
<body>
  
  <!-- Header Section -->
<div class="header d-flex justify-content-between align-items-center mb-0">
  <div class="logo-box">
    <div class="logo-block"></div>
    <div class="logo-divider"></div>
    <div class="logo-text">Logo</div>
  </div>
  <div class="d-flex gap-4">
    <div class="icon-box">
      <i class="fas fa-comment-dots"></i>
      <div class="badge-dot"></div>
      <div class="text-muted">Messages</div>
    </div>
    <div class="icon-box">
      <i class="fas fa-bell"></i>
      <div class="badge-dot"></div>
      <div class="text-muted">Announcements</div>
    </div>
  </div>
  <div class="login-box">
    <div class="login-icon"><i class="fas fa-user"></i></div>
    <div class="login-info">
      <b>Login</b><br>
      <small>Login as SC Partner</small>
    </div>
    <button class="login-dropdown"><i class="fas fa-chevron-down"></i></button>
  </div>
</div>

<!-- You can continue the rest of the form here below this line -->

  <div class="sidebar">
    <div class="text-start mt-3 ms-3">
  <div class="d-flex align-items-center">
    <i class="fas fa-arrow-left me-2"></i>
    <h5 class="mb-0">Back</h5>
  </div>
</div>
<hr>
    <a href="#">CSC Guide</a>
    <a href="#" class="active">Register as SC Partner</a>
    <a href="#">FAQs</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Help & Support</a>
    <a href="#">Contact Info</a>
  </div>

  <div class="content">
    <div class="header border-0 d-flex justify-content-center mt-0">
    <h6 class="text-center m-0">SC Partner Registration Form</h6>
</div>



<div class="header border-0 d-flex justify-content-end align-items-center gap-2 mt-3">
  <div class="form-step">Step: 1 of 3</div>
  <i class="fas fa-arrow-left"></i>
  <i class="fas fa-arrow-right"></i>
</div>

   
    <div class="otp-box">
    <div class="otp-alert mb-3">
      <span class="otp-bold">We will send OTP on your registered mobile number</span>
    </div>

<div class="otp-subtext">
  Your Registered mobile number– <span class="otp-bold"><?= htmlspecialchars($masked_number) ?></span>
</div>


    <div>
      <span class="change-link">Change Registered mobile number</span>
    </div>

    <div class="mt-4">
      <button class="btn save-btn w-100 send" id="sendOtpBtn">Save & Continue</button>
    </div>
  </div>
</div>

 <script>
  $(document).ready(function () {
    $("#sendOtpBtn").on("click", function () {
      // Optional: Disable button while processing
      $(this).text("Please Wait...").attr("disabled", true);

      $.ajax({
        type: "POST",
        url: "php/otp_g.php",
        data: {}, // Nothing needed if session is already set
        success: function (response) {
          $("#sendOtpBtn").text("Save & Continue").removeAttr("disabled");

          // Trim and check response
          const trimmed = response.trim().toLowerCase();
          if (trimmed === "success") {
            window.location.href = "verify_otp.php"; // Change to your OTP verification page
          } else {
            alert("Something went wrong: " + response);
          }
        },
        error: function (xhr, status, error) {
          $("#sendOtpBtn").text("Save & Continue").removeAttr("disabled");
          alert("AJAX Error: " + error);
        }
      });
    });
  });
</script>

</body>
</html>

