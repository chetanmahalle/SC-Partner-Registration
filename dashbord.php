<?php
session_start();
require("php/db.php");

// Check login
if (!isset($_SESSION['user_data'])) {
    die("User not logged in");
}

$email = $_SESSION['user_data']['email'];

$query = "SELECT first_name, last_name, district, mobile_no FROM signup WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $district, $mobile_number);
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
  <title>SC Partner Registration</title>
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
    .form-section {
      background-color: white;
      border-radius: 8px;
      padding: 20px 30px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .form-section h5 {
      background-color: #fff9c4;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 4px;
    }
    .form-label > span {
      color: red;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #4caf50;
    }
    .btn-save {
      width: 100%;
      background-color: #fdd835;
      font-weight: bold;
    }
    .input-group-text {
      background: none;
      border: none;
    }

        body{
          font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      background: white;
      max-width: 1200px;
      margin: 40px auto;
      border: 1px solid #ccc;
      border-top: 8px solid #5ca86c;
      padding: 20px 30px;
    }
    .tabs {
      display: flex;
      border-bottom: 2px solid #ccc;
      margin-bottom: 20px;
    }
    .tab {
      padding: 10px 20px;
      cursor: pointer;
      background: #eaeaea;
      border-right: 1px solid #ccc;
    }
    .tab.active {
      background: #5ca86c;
      color: white;
      font-weight: bold;
    }
    .form-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .form-group {
      flex: 0 0 48%;
    }
    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }
    .form-group input[type="text"],
    .form-group input[type="date"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }
    .form-group input[type="file"] {
      margin-top: 5px;
    }
    .radio-group, .checkbox-group {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-top: 6px;
    }
    .section {
      margin-bottom: 20px;
    }
    .yellow-btn {
      display: block;
      width: 100%;
      background: #f0cf40;
      color: black;
      font-weight: bold;
      font-size: 16px;
      padding: 12px;
      text-align: center;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .required {
      color: red;
    }
    input[disabled] {
      background-color: #f2f2f2;
    }

    .custom-tabs {
      margin: 0 auto;
      align-items: center;
      border: 1px solid #c7c7c7;
      border-radius: 8px;
      overflow: hidden;
      display: flex;
      max-width: 1200px;
      justify-content: space-around;
      text-align: center;
    }
    .custom-tabs button {
      border: none;
      background: none;
      padding: 10px 24px;
      font-weight: 500;
      color: #333;
      transition: 0.3s;
    }
    .custom-tabs button.active {
      background-color: #4caf50;
      color: white;
      font-weight: 600;
    }
    .custom-tabs button:not(:last-child) {
      border-right: 1px solid #ccc;
    }

    .form-control {
      background-color: #f2f2f2;
      border: 1px solid #ccc;
    }
    .form-check-label {
      margin-right: 20px;
    }
    .btn-yellow {
      background-color: #f0cd28;
      color: black;
      font-weight: 600;
    }
    .btn-yellow:hover {
      background-color: #e6be00;
    }
    .card {
      border: none;
      border-radius: 0;
      padding: 30px;
    }

     .form-control {
      background-color: #f2f2f2;
      border: 1px solid #ccc;
    }
    .form-check-label {
      font-weight: 500;
    }
    .btn-yellow {
      background-color: #f0cd28;
      color: black;
      font-weight: 600;
    }
    .btn-yellow:hover {
      background-color: #e6be00;
    }
    .card {
      border: none;
      border-radius: 0;
      padding: 30px;
    }
    .form-check-description {
      font-weight: normal;
      font-size: 0.9rem;
      color: #666;
    }
    .tab-btn {
      border-radius: 0;
      border: 1px solid #ccc;
      padding: 6px 16px;
      font-weight: 600;
    }
    .tab-active {
      background-color: #43a047;
      color: white;
      border: none;
    }

     .form-control {
      background-color: #f2f2f2;
      border: 1px solid #ccc;
    }
    .btn-yellow {
      background-color: #f0cd28;
      color: black;
      font-weight: 600;
    }
    .btn-yellow:hover {
      background-color: #e6be00;
    }
    .card {
      border: none;
      border-radius: 0;
      padding: 30px;
    }
    .tab-btn {
      border-radius: 0;
      border: 1px solid #ccc;
      padding: 6px 16px;
      font-weight: 600;
    }
    .tab-active {
      background-color: #43a047;
      color: white;
      border: none;
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
      <b><?= htmlspecialchars($first_name) ?> <?= htmlspecialchars($last_name) ?></b><br>
      <small><?= htmlspecialchars($district) ?></small><br>
      <small><?= htmlspecialchars($mobile_number) ?></small>
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
    <a href="#">Dashboard</a>
    <a href="#" class="active">Farmer Registration</a>
    <a href="#">Check Enrollment Status</a>
    <a href="#">FAQs</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Help & Support</a>
    <a href="#">Contact Info</a>
  </div>

  <div class="content">
    <div class="header r border-0 d-flex justify-content-center mt-0">
    <h6 class="text-center m-0">Farmer Registration Form</h6>
</div>

     
    <div class="custom-tabs mt-4 row" id="tabMenu">
    <button class="tab-btn active col-md-3" data-tab="profile">Profile Details</button>
    <button class="tab-btn col-md-3" data-tab="address">Address Details</button>
    <button class="tab-btn col-md-3" data-tab="farmer">Farmer Details</button>
    <button class="tab-btn col-md-3" data-tab="land">Land Verification</button>
  </div>


  <div class="tab-content">
  <!-- Profile Tab -->
  <div class="tab-pane active" id="profile">
    <div class="container">
      <form id="farmer-registration-form">
        <div class="form-row">
          <div class="form-group">
            <label>First Name <span class="required">*</span></label>
            <input type="text" placeholder="First Name" name="first_name" id="first_name">
          </div>
          <div class="form-group">
            <label>Middle Name <span class="required">*</span></label>
            <input type="text" placeholder="Middle name" name="middle_name" id="middle_name">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Last Name <span class="required">*</span></label>
            <input type="text" placeholder="Last name" name="last_name" id="last_name">
          </div>
          <div class="form-group">
            <label>Mobile number <span class="required">*</span></label>
            <input type="text" placeholder="Enter 10 digit mobile number" id="mobile_no" name="mobile_no">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Date of Birth <span class="required">*</span></label>
            <input type="text" placeholder="dd/mm/yy" id="dob" name="dob">
          </div>
          <div class="form-group">
            <label>Gender <span class="required">*</span></label>
            <div class="radio-group">
              <label><input type="radio" id="male" name="gender" value="Male"> Male</label>
              <label><input type="radio" id="female" name="gender" value="Female"> Female</label>
              <label><input type="radio" id="other" name="gender" value="Other"> Other</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="section col-md-6">
            <label>New Business</label>
            <div class="radio-group">
              <label><input type="radio" id="yes" name="new_business" value="Yes"> Yes</label>
              <label><input type="radio" id="no" name="new_business" value="No"> No</label>
            </div>
          </div>

          <div class="section col-md-6">
            <label for="f_photo">Upload Farmer Photograph <span class="required">*</span></label><br>
            <input type="file" id="f_photo" name="f_photo" accept="image/*">
            <small class="text-muted">Upload a clear passport-sized farmer photo</small>
          </div>
        </div>

        <button type="submit" class="yellow-btn send_data">Save & Continue</button>
      </form>
    </div>
  </div>

  <!-- Address Tab -->
  <div class="tab-pane d-none active" id="address">
    <div class="container my-5">
      <form id="addressForm">
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="state" class="form-label">State <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state" required>
          </div>
          <div class="col-md-6">
            <label for="district" class="form-label">District <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="district" name="district" placeholder="Enter your District" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="taluka" class="form-label">Sub District/ Taluka <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="taluka" name="taluka" placeholder="Enter your Taluka" required>
          </div>
          <div class="col-md-6">
            <label for="village" class="form-label">Enter Village <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="village" name="village" placeholder="Enter your Village" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="pincode" class="form-label">Enter Pincode <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter your postal code" required>
          </div>
          <div class="col-md-6">
            <label for="street" class="form-label">Enter Street Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="street" name="street" placeholder="House no., area, street." required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Residential Type</label><br>
          <input type="radio" class="form-check-input" id="rural" name="residence" value="Rural">
          <label for="rural">Rural</label>
          <input type="radio" class="form-check-input" id="urban" name="residence" value="Urban">
          <label for="urban">Urban</label>
        </div>

        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-yellow btn-lg">Save & Continue</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Farmer Tab -->
  <div class="tab-pane d-none active" id="farmer">
    <div class="container my-4">
      <form id="farmerForm">
        <div class="mb-3">
          <label class="form-label">Farmer Type (Farms In Acre) <span class="text-danger">*</span></label>
          <div class="form-check"><input class="form-check-input" type="checkbox" id="traditional"><label class="form-check-label" for="traditional">Traditional</label></div>
          <div class="form-check"><input class="form-check-input" type="checkbox" id="small"><label class="form-check-label" for="small">Small</label></div>
          <div class="form-check"><input class="form-check-input" type="checkbox" id="medium"><label class="form-check-label" for="medium">Medium</label></div>
          <div class="form-check"><input class="form-check-input" type="checkbox" id="large"><label class="form-check-label" for="large">Large</label></div>
          <div class="form-check"><input class="form-check-input" type="checkbox" id="commercial"><label class="form-check-label" for="commercial">Commercial</label></div>
        </div>

        <div class="mb-3">
          <label for="cropsGrown" class="form-label">Crops Grown</label>
          <select class="form-control" id="cropsGrown" name="cropsGrown">
            <option>Eg. vegetables, fruits, nuts, etc.</option>
          </select>
        </div>

        <div class="row mb-3 ps-2">
          <div class="col-6 col-md-2 form-check"><input class="form-check-input" type="checkbox" id="rice"><label class="form-check-label" for="rice">Rice</label></div>
          <div class="col-6 col-md-2 form-check"><input class="form-check-input" type="checkbox" id="wheat"><label class="form-check-label" for="wheat">Wheat</label></div>
          <div class="col-6 col-md-2 form-check"><input class="form-check-input" type="checkbox" id="soybean"><label class="form-check-label" for="soybean">Soybean</label></div>
          <div class="col-6 col-md-2 form-check"><input class="form-check-input" type="checkbox" id="orange"><label class="form-check-label" for="orange">Orange</label></div>
          <div class="col-6 col-md-2 form-check"><input class="form-check-input" type="checkbox" id="mangoes"><label class="form-check-label" for="mangoes">Mangoes</label></div>
          <div class="col-6 col-md-2 form-check"><input class="form-check-input" type="checkbox" id="cotton"><label class="form-check-label" for="cotton">Cotton</label></div>
        </div>

        <div class="mb-4">
          <label for="market" class="form-label">Where do you sell?</label>
          <select class="form-control" id="market" name="market">
            <option>Eg. market, mandi, busari</option>
          </select>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-yellow btn-lg">Save & Continue</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Land Verification Tab -->
  <div class="tab-pane d-none active" id="land">
    <div class="container my-4">
      <form id="landVerificationForm">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">State <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="land_state" name="land_state" placeholder="Enter your state">
          </div>
          <div class="col-md-6">
            <label class="form-label">District <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="land_district" name="land_district" placeholder="Enter your District">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Sub District/ Taluka <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="land_taluka" name="land_taluka" placeholder="Enter your Taluka">
          </div>
          <div class="col-md-6">
            <label class="form-label">Enter Village <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="land_village" name="land_village" placeholder="Enter your Village">
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-6">
            <label class="form-label">Survey No. <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="survey_no" name="survey_no" placeholder="Enter your survey no.">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Sub - Survey No. <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="sub_survey_no" name="sub_survey_no" placeholder="Enter your sub - survey no.">
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label">Select Owner Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="owner_name" name="owner_name" placeholder="Eg. Chetan Mahalle">
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-yellow btn-lg">Save & Continue</button>
        </div>
      </form>
    </div>
  </div>
</div>
  </div>
</div>

  <script>
$(document).ready(function() {
  $('#landVerificationForm').on('submit', function(e) {
    e.preventDefault();

    let gender = $('#male').is(':checked') ? 'Male' :
                 $('#female').is(':checked') ? 'Female' :
                 $('#other').is(':checked') ? 'Other' : '';

    let business = $('#yes').is(':checked') ? 'Yes' :
                   $('#no').is(':checked') ? 'No' : '';

    let farmer_types = [];
    $('#farmerForm input[type="checkbox"]:checked').each(function () {
      let id = $(this).attr('id');
      if (!["rice", "wheat", "soybean", "orange", "mangoes", "cotton"].includes(id)) {
        farmer_types.push(id);
      }
    });

    let crops = [];
    $('#farmerForm input[type="checkbox"]:checked').each(function () {
      let id = $(this).attr('id');
      if (["rice", "wheat", "soybean", "orange", "mangoes", "cotton"].includes(id)) {
        crops.push(id);
      }
    });

    let residence = $('#rural').is(':checked') ? 'Rural' :
                    $('#urban').is(':checked') ? 'Urban' : '';

    $.ajax({
      type: 'POST',
      url: 'php/farmer_details.php',
      data: {
        first_name: $('#first_name').val(),
        middle_name: $('#middle_name').val(),
        last_name: $('#last_name').val(),
        mobile_no: $('#mobile_no').val(),
        dob: $('#dob').val(),
        gender: gender,
        new_business: business,

        state: $('#state').val(),
        district: $('#district').val(),
        taluka: $('#taluka').val(),
        village: $('#village').val(),
        pincode: $('#pincode').val(),
        street: $('#street').val(),
        residence: residence,

        farmer_type: farmer_types.join(','),
        crops: crops.join(','),
        cropsGrown: $('#cropsGrown').val(),
        market: $('#market').val(),

        land_state: $('#landVerificationForm input[placeholder="Enter your state"]').val(),
        land_district: $('#landVerificationForm input[placeholder="Enter your District"]').val(),
        land_taluka: $('#landVerificationForm input[placeholder="Enter your state"]').eq(1).val(),
        land_village: $('#landVerificationForm input[placeholder="Enter your District"]').eq(1).val(),
        survey_no: $('#landVerificationForm input[placeholder="Enter you survey no."]').val(),
        sub_survey_no: $('#landVerificationForm input[placeholder="Enter your sub - survey no."]').val(),
        owner_name: $('#landVerificationForm input[placeholder="Eg. Chetan Mahalle"]').val()
      },
      beforeSend: function () {
        $('.btn-yellow').text('Saving...').attr('disabled', true);
      },
      success: function (response) {
        $('.btn-yellow').text('Save & Continue').removeAttr('disabled');
        if (response.trim() === 'success') {
          alert('Farmer details saved successfully!');
        } else {
          alert('Error: ' + response);
        }
      },
      error: function (xhr) {
        $('.btn-yellow').text('Save & Continue').removeAttr('disabled');
        alert('AJAX Error: ' + xhr.status + ' - ' + xhr.statusText);
      }
    });
  });

   $(".tab-btn").click(function () {
        $(".tab-btn").removeClass("active");
        $(this).addClass("active");

        let tabId = $(this).data("tab");
        $(".tab-pane").addClass("d-none");
        $("#" + tabId).removeClass("d-none");
      });

    $('#addressForm').on('submit', function(e) {
      e.preventDefault();
      // You can process form data here
      alert('Form submitted!');
    });
});
</script>

</body>
</html>

