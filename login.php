<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="script.js"></script> 
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <!-- Login form -->
        <form id="loginForm" method="POST" action="auth.php">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="Login">
        </form>
        <!-- Sign up form -->
        <h1>Create a new account</h1>
        <form id="signupForm" action="signup.php" method="POST">
            <!-- Signup form fields (username, email, password, etc.) -->
            <!-- Include fields for registration details -->
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="sign_up_username" required>
            <label for="email">
                <i class="fa fa-envelope"></i>
            </label>
            <input type="email" name="email" placeholder="Email" id="sign_up_email" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="sign_up_password" required>
            <input type="submit" value="Sign-up">
        </form>
    </div>
    </div>
</body>
</html>
