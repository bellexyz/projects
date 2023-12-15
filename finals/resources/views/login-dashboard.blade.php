<!-- resources/views/login-dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login-dashboard.css') }}">

    <title>Login Dashboard</title>
</head>
<body>
    
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="input-container">
            <input type="email" name="email" required>
            <span class="placeholder-text">Email</span>
        </div>
    
        <!-- Password input field -->
        <div class="input-container">
            <input type="password" name="password" required>
            <span class="placeholder-text">Password</span>
        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>
