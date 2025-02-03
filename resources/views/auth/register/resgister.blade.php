<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h2>Register</h2>
            <form id="register-form" action="#" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit" class="register-btn">Register</button>

                <p class="signin-text"><a href="/login">Sign in</a></p>

                <button type="button" class="google-btn"><span>G</span> SIGN UP WITH GOOGLE</button>
                <button type="button" class="facebook-btn"><span>f</span> SIGN UP WITH FACEBOOK</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/register.js') }}" type="module"></script>
</body>
</html>
