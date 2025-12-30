<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            text-align: center;
            padding: 10px 0;
        }

        footer button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        footer button:hover {
            background-color: #0056b3;
        }

        #privacyForm {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: white;
            padding: 20px;
            overflow-y: auto;
            display: none;
        }

        #privacyForm h2 {
            margin-bottom: 15px;
            text-align: center;
        }

        #privacyForm p {
            margin-bottom: 15px;
            font-size: 14px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <center><h1 style="color: blue;">Privacy Note</h1></center>

    <h4>
    <p>
        At MediCare, your privacy is of utmost importance to us, and we are fully committed to protecting your personal and health-related information. In accordance with the Health Insurance Portability and Accountability Act (HIPAA) and other relevant privacy regulations, we ensure that all information you provide to us, whether through our website, in person, or via other communication channels, is securely stored and handled with strict confidentiality.
    </p>
    <p>
        We collect personal and medical information solely for the purpose of providing high-quality medical care, improving patient outcomes, and enhancing the overall experience within our healthcare facility. This may include details such as your name, contact information, medical history, and any other data necessary for your treatment and care. We may also use your information to improve our services, respond to your inquiries, and communicate important updates regarding your health.
    </p>
    <p>
        Rest assured, we do not sell, trade, or share your personal information with any third party without your explicit consent unless required by law or for specific healthcare-related purposes, such as coordinating with other healthcare providers involved in your care, processing insurance claims, or complying with government-mandated reporting. We take all reasonable precautions to safeguard your data, including employing advanced encryption technologies and access controls to protect against unauthorized access, disclosure, or misuse.
    </p>
    <p>
        You have the right to access, update, or request the removal of your personal information at any time, in compliance with legal and regulatory standards. Should you have any questions or concerns regarding how your information is handled, or if you wish to exercise your rights, please do not hesitate to contact our privacy officer.
    </p>
    <p>
        By using our services and engaging with MediCare, you acknowledge that you understand and agree to our privacy practices as outlined in this notice. We encourage you to review our full Privacy Policy for additional details about our data protection measures, and how your personal information is managed and secured.
    </p>
    </h4>
    <?php include 'footer.php'; ?>

    <script>
       
        document.addEventListener('DOMContentLoaded', function() {
            var footerButton = document.querySelector('footer button');
            var privacyForm = document.getElementById('privacyForm');

            footerButton.addEventListener('click', function() {
                privacyForm.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
