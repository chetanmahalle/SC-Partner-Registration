<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Address Details Page</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&family=Maven+Pro:wght@400..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
  <style>

     .form-section {
      max-width: 1100px;
      margin: 30px auto;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 10px;
      background: #fff;
    }
    .form-section h5 {
      background-color: #fff8c6;
      padding: 10px;
      border-radius: 5px;
    }
    .btn-custom {
      background-color: #fdd835;
      color: #000;
      font-weight: bold;
      width: 100%;
    }

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


   <div class="form-section shadow">
  <h5>Address Details</h5>
  <form id="addressForm">
    <div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Select State <span class="text-danger">*</span></label>
    <select class="form-select state" required>
      <option value="">Select State</option>
      <option value="State 1">State 1</option>
      <option value="State 2">State 2</option>
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">Select District <span class="text-danger">*</span></label>
    <select class="form-select district" required>
      <option value="">Select District</option>
      <option value="District 1">District 1</option>
      <option value="District 2">District 2</option>
    </select>
  </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
    
      <label class="form-label">Enter Pincode <span class="text-danger">*</span></label>
      <input type="text" class="form-control pincode" required placeholder="Enter your postal code">
   
  </div>

      <div class="col-md-6">
    
      <label class="form-label">Land Mark (Optional)</label>
      <input type="text" class="form-control landmark" placeholder="Land Mark">
    
  </div>
</div>

     <div class="row mb-3">
    <div class="col-md-6">
   
      <label class="form-label">Enter Permanent Address <span class="text-danger">*</span></label>
      <input type="text" class="form-control permanent_address" required placeholder="Enter your permanent address">
    
  </div>

     <div class="col-md-6">
    
      <label class="form-label">Enter Office Address</label>
      <input type="text" class="form-control office_address" placeholder="Enter Office Address">
      <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" id="sameAddressCheck">
        <label class="form-check-label" for="sameAddressCheck">
          Same as Permanent Address
        </label>
      </div>
    
  </div>
  </div>

       <div class="row mb-3">
      <div class="col-md-6">
    
  <label class="form-label">Upload SCP Certificate <span class="text-danger">*</span></label>
  <input type="file" class="form-control scp_certificate" id="scp_certificate" name="scp_certificate" required>
  <small class="text-muted">Upload image of original CSC Certificate</small>

</div>

<div class="col-md-6">

  <label class="form-label">Upload a photo of your Office <span class="text-danger">*</span></label>
  <input type="file" class="form-control office_photo" id="office_photo" name="office_photo" required>
  <small class="text-muted">Upload both indoor and outdoor photos of your office.</small>

</div>
</div>

    <button type="submit" class="btn btn-custom address_save">Save & Continue</button>
  </form>
</div>
</div>


  <script>
      $(document).ready(function () {
    $('#addressForm').on('submit', function (e) {
      e.preventDefault();

      var formData = new FormData(); // needed for file uploads

      formData.append("state", $(".state").val());
      formData.append("district", $(".district").val());
      formData.append("pincode", $(".pincode").val());
      formData.append("permanent_address", $(".permanent_address").val());
      formData.append("landmark", $(".landmark").val());
      formData.append("office_address", $(".office_address").val());
      formData.append("scp_certificate", $(".scp_certificate")[0].files[0]);
      formData.append("office_photo", $(".office_photo")[0].files[0]);

      $.ajax({
        type: "POST",
        url: "php/address_detail.php",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {
          $(".address_save").html("Please Wait...");
          $(".address_save").attr("disabled", "disabled");
        },
        success: function (response) {
          $(".address_save").html("Save & Continue");
          $(".address_save").removeAttr("disabled");

          if (response.trim() === "success") {
            window.location.href = "otp.php";
          } 
           else {
            alert("Unexpected response: " + response);
          }
        },
        error: function (xhr, status, error) {
          alert("AJAX Error: " + error);
        }
      });
    });
  });
  </script>
</body>
</html>

