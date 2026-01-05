🏥 #Online Medical Portal#

A comprehensive web-based medical portal system built with PHP, MySQL, HTML, CSS, and JavaScript.
This platform provides a complete solution for managing medical appointments, prescriptions, test bookings, and patient records in a healthcare facility.

🎯 Overview

The Online Medical Portal is a full-featured healthcare management system designed to streamline medical services for patients and administrators.

Patients can book doctor appointments, order medicines, schedule medical tests, download reports, and manage health records online.

Administrators manage users, appointments, prescriptions, and all portal operations through a comprehensive dashboard.

Vision:
"To be the foremost and preferred online medical portal in the country, serving the Nation to build a healthier community."

Mission:
Provide the best healthcare services with quality care, serving 100+ patients, 50+ doctors, 20+ branches, and maintaining 50+ awards.

✨ Features
For Patients

User Registration & Authentication ✅

Email validation, password hashing, session-based login

Profile management with image upload

Doctor Appointment Booking ✅

Browse 12+ doctors

Select date, time, and disease type

View doctor profiles

Pharmacy Services ✅

Upload prescriptions

Order and track medicines

Edit/Delete prescription orders

Medical Test Booking ✅

Book tests (Blood, X-Ray, MRI, etc.)

Select preferred date and time

Report Management ✅

Download and submit medical reports

Payment Gateway ✅

Secure payments, multiple options, bill summary

Profile Management ✅

Update info, upload profile picture, delete account

For Administrators

Admin Dashboard ✅

Centralized interface, quick module access

User Management ✅

View, update, delete users

Manage credentials

Appointment Management ✅

Manage patient appointments and doctor schedules

Pharmacy Management ✅

View and process prescription orders

Test Booking Management ✅

Manage test schedules and bookings

Report Management ✅

Manage patient reports and downloads

Admin Account Management ✅

Add/manage admins with domain-restricted emails

🛠 Technology Stack
Category	Technology
Backend	PHP 7.4+
Database	MySQL
Web Server	Apache/Nginx
Frontend	HTML5, CSS3, JavaScript
Icons	Font Awesome 6
Development Tools	XAMPP/WAMP, phpMyAdmin
📁 Project Structure
Online Medical Portal/
├── Core PHP Files
│   ├── home.php, login.php, register.php, loginConfig.php ...
├── User Features
│   ├── patient.php, patientprocess.php, chanelingDoc.php ...
├── Admin Features
│   ├── admin.php, adminUsers.php, adminDoctor.php ...
├── Styling (CSS/)
│   ├── home.css, login.css, register.css, admin.css ...
├── JavaScript (js/)
│   ├── home.js, login.js, admin.js ...
├── Assets
│   ├── images/, profile_images/, uploads/
└── Components
    ├── header.php, footer.php

🗄️ Database Schema

Main tables:

Table	Key Columns
users	id, fname, lname, email, password, gender, birthday, city, address, phone, profile_image
admin	id, full_name, email, password, gender, phone, city
patient_appointments	id, first_name, last_name, doctor_name, booking_date, disease_type
prescriptions	id, fullName, gmail, nic, filePath
testbookings	id, name, email, test_type, preferred_date
Doctorsfees	name, service_charge, doctor_price

Note: Contact messages table stores patient inquiries.

🚀 Installation & Setup

Clone the repository:

git clone https://github.com/your-username/online-medical-portal.git


Move to web server root (htdocs for XAMPP)

Create Database:

Database name: online_medical_portal

Import schema if SQL provided

Configure Database:

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "online_medical_portal";


Set permissions:

uploads/ and profile_images/ writable

Start Apache & MySQL

Access site: http://localhost/medical-portal/home.php

👥 User Roles

Patients – Book appointments, order medicines, manage profile

Administrators – Full access to all modules, manage users and data

🔒 Security Features

Password hashing & verification

Session-based authentication

Role-based access control

SQL injection prevention

Input validation and XSS prevention

📸 Screenshots

(Add images in /screenshots folder and link as below)

![Home Page](screenshots/home.png)
![Admin Dashboard](screenshots/admin.png)
![Doctor Booking](screenshots/doctor.png)

🔮 Future Enhancements

Real payment gateway integration

Email & SMS notifications

Real-time chat support

Mobile app version

Advanced analytics dashboard

🤝 Contributing

Fork the repo

Create a feature branch: git checkout -b feature/YourFeature

Commit changes: git commit -m "Add feature"

Push branch: git push origin feature/YourFeature

Open a Pull Request
