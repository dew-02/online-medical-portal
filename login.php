<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Medical Site</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <div class="login-section">
        <div class="form-section">
            <fieldset>  
                <img src="images/logo.jpg" id="logo" name="logo" alt="Logo" class="logo">
                <h2>Login to Your Account</h2>
                <form method="post" action="logindetails.php">
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" id="pass" name="pass" placeholder="Password" required minlength="6">
                    </div>
                    <button class="login-button" type="submit" id="btn" name="submit">Login</button><br>
                    <div class="links">
                        <span>Don't have an account? </span><a href="register.php">Create one</a>
                    </div>
                    <div class="links">
                        <a href="loginUpdate.php">Forgot Password?</a>
                    </div>
                </form>
            </fieldset>  
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>   
</body>
</html>
