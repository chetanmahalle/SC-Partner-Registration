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


    <div class="form-section mt-3">
      <h5>Profile Details</h5>
      <form id="registration-form">
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">First Name <span>*</span></label>
            <input type="text" class="form-control first_name" placeholder="First Name" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Middle Name <span>*</span></label>
            <input type="text" class="form-control middle_name" placeholder="Middle name" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Last Name <span>*</span></label>
            <input type="text" class="form-control last_name" placeholder="Last name" required>
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Mobile number <span>*</span></label>
            <input type="text" class="form-control mobile_no" placeholder="Enter 10 digit mobile number" maxlength="10" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">SCP ID number <span>*</span></label>
            <input type="text" class="form-control scp_id" placeholder="Enter your 12 digit CSC ID number" maxlength="12" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Email ID (Optional)</label>
            <input type="email" class="form-control email" placeholder="Enter email id here">
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Choose Password <span>*</span></label>
            <div class="input-group">
              <input type="password" class="form-control password" id="password" placeholder="Choose password" minlength="12" required>
              <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                <i class="fas fa-eye"></i>
              </button>
            </div>
            <small class="text-primary">Passwords must be at least 12 characters long.</small>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label">Confirm Password <span>*</span></label>
            <div class="input-group">
              <input type="password" class="form-control" id="confirmPassword" placeholder="Re-Enter password" minlength="12" required>
              <button class="btn btn-outline-secondary" type="button" id="togglePassword2">
                <i class="fas fa-eye"></i>
              </button>
            </div>
            <small class="text-primary">Please re-enter your password here</small>
          </div>
        </div>
        <button type="submit" class="btn btn-save mt-3 profile_details">Save & Continue</button>
      </form>
    </div>
  </div>

  <script>
    $('#togglePassword1').on('click', function () {
      const input = $('#password');
      const type = input.attr('type') === 'password' ? 'text' : 'password';
      input.attr('type', type);
      $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });

    $('#togglePassword2').on('click', function () {
      const input = $('#confirmPassword');
      const type = input.attr('type') === 'password' ? 'text' : 'password';
      input.attr('type', type);
      $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });
  </script>

  <script>
      $(document).ready(function(){
        $("#registration-form").submit(function(e){
               e.preventDefault();

             $.ajax({
   type: "POST",
   url: "php/profile_details.php",
   data: {
       first_name: $(".first_name").val(),
       middle_name: $(".middle_name").val(),
       last_name: $(".last_name").val(),
       mobile_no: $(".mobile_no").val(),
       email: $(".email").val(),
       scp_id: $(".scp_id").val(),
       password: $("#password").val(),
       password_c: $("#confirmPassword").val()
   }, // ✅ this comma was missing
   beforeSend: function() {
       $(".profile_details").html("Please Wait.....");
       $(".profile_details").attr("disabled", "disabled");
   },
   success: function(response) {
       $(".profile_details").html("Save & Continue");
       $(".profile_details").removeAttr("disabled");

       if (response.trim() === "success") {
           window.location.href = "address_details.php";
       } else if (response.trim() === "User matched") {
           alert("User Already Exists");
           window.location.href = "login.php";
       } else if (response.trim() === "password_mismatch") {
           alert("Password and confirm password should be same");
       } else {
           alert("Unexpected response: " + response);
       }
   }
});

        });
      });
  </script>
</body>
</html>

