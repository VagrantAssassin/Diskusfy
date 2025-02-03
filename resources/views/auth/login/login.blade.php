<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="welcome-section">
            <h2>Welcome !</h2>
            <p>Diskusfy adalah tempat untuk berbagi ide, berdiskusi, dan menemukan inspirasi dari komunitas yang penuh semangat.</p>
            <p>Temukan topik yang menarik, berikan pendapat Anda, dan jadilah bagian dari percakapan yang membangun. Kami percaya bahwa setiap suara memiliki nilai dan bersama kita dapat tumbuh lebih baik.</p>
            <p>Mari mulai diskusi dan temukan wawasan baru hari ini!</p>
        </div>
        <div class="login-section">
            <h2>Log in</h2>
            <form>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="justin@gmail.com" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <div class="forgot-password">
                    <a href="/forget">Forgot password?</a>
                </div>

                <button type="submit">Login</button>

                <p class="register-text">Login Memakai <a href="/register">Google!</a>.</p>

                <p class="register-text">Don't have an account? <a href="/register">Register here</a>.</p>
            </form>
        </div>
    </div>
</body>
</html>