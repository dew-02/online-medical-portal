<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/fAQ.css">

    <style>

        .faq-container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow:light green;
        }

        .faq-item {
            margin-bottom: 20px;
        }

        .faq-question {
            width: 100%;
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 15px;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
            outline:none;
            transition: background-color 0.3s;
            border-radius: 4px;
        }

        .faq-question:hover {
            background-color: #0056b3;
        }

        .faq-answer {
            display: none;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 3px solid #007BFF;
            margin-top: 10px;
            border-radius: 4px;
        }

        .faq-answer p, .faq-answer ul, .faq-answer ol {
            margin: 0;
            padding: 0;
            list-style:none;
        }

        .faq-answer ul {
            padding-left: 10px;
            list-style: circle;
        }

        .faq-answer ol {
            padding-left: 10px;
            list-style: decimal;
        }

        .faq-answer li {
            margin-bottom: 10px;
            
        }

        @media (max-width: 600px) {
            .faq-question {
                font-size: 14.5px;
                padding: 10px;
            }

            .faq-answer {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<center>
   <h1>Frequently Asked</h1>
</center>
    
<div class="faq-container">
    <div class="faq-item">
        <button class="faq-question" onclick="toggleAnswer(this)">Question 1 : How can I pay my bills?</button>
        <div class="faq-answer">
            <p>You can pay your bills through our online portal, via phone, or by mail.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question" onclick="toggleAnswer(this)">Question 2 : How do I get technical support for issues with my Patient Portal?</button>
        <div class="faq-answer">
            <p>You can get technical support by calling our support line or using the help section on the portal.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question" onclick="toggleAnswer(this)">Question 3 : How can I access my test results?</button>
        <div class="faq-answer">
            <p>Test results are available in the “Results” section of the patient portal.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question" onclick="toggleAnswer(this)">Question 4 : How can I get technical support for issues with my patient portal?</button>
        <div class="faq-answer">
            <p>You can get technical support by calling our support line or using the help section on the portal.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question" onclick="toggleAnswer(this)">Question 5 : I am a caregiver. How do I access my family member's account?</button>
        <div class="faq-answer">
            <p>The medical portal will verify the submitted documents and the legitimacy of your request. This process may take a few days.</p>
            <p>Once verified, you will receive instructions on how to access the account. This might include login credentials or a secure link.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question" onclick="toggleAnswer(this)">Question 6 : Can I download my health records to send to another healthcare provider?</button>
        <div class="faq-answer">
            <p>
                <ol>
                    <li>Access the online medical portal by logging in with your username and password.</li>
                    <li>Locate the section of the portal where your health records are stored. This is often labeled as Medical Records.</li>
                    <li>Browse through your records and select the specific documents or data you need to download. This might include test results, visit summaries, medication lists, and more.</li>
                </ol>
            </p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question" onclick="toggleAnswer(this)">Question 7 : I'm having trouble connecting my health information to an app. Can you help?</button>
        <div class="faq-answer">
            <p>
                <ul>
                    <li>Update the App</li>
                    <li>Follow the App's Instructions</li>
                </ul>
            </p>
        </div>
    </div>
</div>
<script src="js/fAQ.js"></script>

<?php include 'footer.php'; ?> 

</body>
</html>
