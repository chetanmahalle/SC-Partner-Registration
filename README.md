# SC-Partner-Registration

## Features

- SCP Registration (Name, Email, Password, Phone)
- SCP Login (Email, Password)
- OTP verification system
- Multi-tab Farmer Registration Form:
  - Profile Details
  - Address Details
  - Farmer Information
  - Land Verification
- AJAX-based form submission
- Session management and redirection based on OTP verification

## Technologies Used

- PHP (Backend)
- MySQL (Database: `scpartner`)
- HTML/CSS(bootstrap)/JS (Frontend, all files in root directory)
- jQuery (for AJAX and dynamic UI)

## Folder & File Structure

All PHP, CSS, and JS files are placed in the root folder.

### Main Files:
- `profile.php`
- `address_details.php`
- `otp.php`
- `login.php`
- `dashboard.php`

### Backend Scripts:
- `profile_details.php` - Handles profile form submission
- `address_detail.php` - Handles address form submission
- `otp_g.php` - Sends and verifies OTP
- `check.php` - Handles login verification
- `farmer_details.php` - Submits final farmer data


🛠️ Setup Instructions

1. Clone the Repository


git clone https://github.com/chetanmahalle/SC-Partner-Registration.git
cd SC-Partner-Registration

2. Move to XAMPP Directory
   
Move the entire project folder to your XAMPP htdocs directory:

C:\xampp\htdocs\sc-partner

3. Start XAMPP
Open XAMPP Control Panel and start:

Apache

MySQL

4. Create the Database

Go to http://localhost/phpmyadmin

Click New and create a database named:

scpartner

Import the SQL file (if available) to create the required tables.



5. Open the Project in Browser

Open your browser and visit:

http://localhost/SWP Task/profile.php

6. Create an SCP Account


Sample Api Requests- 

 1. Login (login.php)

URL: http://localhost/SWP Task/login.php

Method: POST

Body:

{
  "email": "scp@example.com",
  "password": "yourpassword"
}

2. Generate OTP (otp_g.php)

URL: http://localhost/SWP Task/php/otp_g.php

Method: POST

Body:

{
 
}



3. Farmer Profile Details (profile_details.php)

URL: http://localhost/SWP Task/php/profile_details.php

Method: POST

Body:

{
  "first_name": "Chetan",
  "middle_name": "Sunil",
  "last_name": "Mahalle",
  "mobile_no": "95116xxxxx",
  "dob": "1990-06-15",
  "gender": "male",
  "new_business": "yes"
}

 4. Farmer Address Details (address_detail.php)

URL: http://localhost/SWP Task/php/address_detail.php

Method: POST

Body:

{
  "state": "Maharashtra",
  "district": "Nagpur",
  "taluka": "Hingna",
  "village": "Kumbhari",
  "pincode": "440023",
  "street": "Main Road",
  "residence": "permanent"
}


 5. Full Farmer Registration (farmer_details.php)

URL: http://localhost/SWP Task/php/farmer_details.php

Method: POST

Body:


{
  "first_name": "Chetan",
  "middle_name": "Sunil",
  "last_name": "Mahalle",
  "mobile_no": "9876543210",
  "dob": "1990-06-15",
  "gender": "male",
  "new_business": "yes",
  "state": "Maharashtra",
  "district": "Nagpur",
  "taluka": "Hingna",
  "village": "Kumbhari",
  "pincode": "440023",
  "street": "Main Road",
  "residence": "permanent",
  "farmer_type": "Organic",
  "crops": "Wheat,Rice",
  "cropsGrown": "Wheat,Rice",
  "market": "Local Mandi",
  "land_state": "Maharashtra",
  "land_district": "Nagpur",
  "land_taluka": "Hingna",
  "land_village": "Kumbhari",
  "survey_no": "123",
  "sub_survey_no": "1A",
  "owner_name": "Chetan Mahalle"
}
