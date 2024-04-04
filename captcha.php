<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CAPTCHA Example</title>
<style>
    .captcha-container {
        margin-bottom: 20px;
    }
    .captcha-input {
        margin-right: 10px;
    }
</style>
</head>
<body>
<h1>Just to check if you are not a robot</h1>
<form id="myForm" action="index.php" method="post">
    <div class="captcha-container">
        <label for="captcha">CAPTCHA: </label>
        <input type="text" id="captcha" name="captcha" class="captcha-input">
        <span id="captchaText"></span>
    </div>
    <button type="submit">Submit</button>
</form>

<script>
    // Generate a random CAPTCHA code
    function generateCaptcha() {
        var captcha = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        for (var i = 0; i < 6; i++) {
            captcha += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return captcha;
    }

    // Populate the CAPTCHA text and store it in session storage
    var captchaText = generateCaptcha();
    document.getElementById('captchaText').textContent = captchaText;
    sessionStorage.setItem('captcha', captchaText);

    // Validate the CAPTCHA on form submission
    document.getElementById('myForm').addEventListener('submit', function(event) {
        var userInput = document.getElementById('captcha').value;
        var storedCaptcha = sessionStorage.getItem('captcha');
        if (userInput !== storedCaptcha) {
            alert('CAPTCHA incorrect!');
            event.preventDefault(); // Prevent form submission
        }
    });
</script>

</body>
</html>