<html>
<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">


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
        <form id="signupForm" action="signup.php" method="POST">
            <!-- Signup form fields (username, email, password, etc.) -->
            <!-- Include fields for registration details -->
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <!-- Add a submit button -->
            <button type="submit">Sign Up</button>
        </form>
    </div>
    </div>
</body>

</html>