<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Medical Site</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <div class="signup-section">
        <div class="form-section">
            <fieldset>  
                <img src="images/logo.jpg" id="logo" name="logo" alt="Logo" class="logo">
                <h2>Create Your Account</h2>
                <form method="post" action="registerdetails.php">
                    <div class="input-group">
                        <input type="text" id="fname" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="input-group">
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                    </div>
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" id="pass" name="pass" placeholder="Password" required minlength="6">
                    </div>
                    <div class="input-group">
                        <input type="password" id="cpass" name="cpass" placeholder="Confirm Password" required minlength="6">
                    </div>
                    <button class="sign-button" type="submit" id="btn" name="submit">Create Account</button><br>
                    <div class="links">
                        <span>Already have an account? </span><a href="login.php">Log in</a>
                    </div>
                </form>
            </fieldset>  
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>   
</body>
</html>
