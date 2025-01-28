<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        
        <form method="post" action="<?php echo site_url('auth/login'); ?>">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF token -->
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="<?php echo site_url('auth/register'); ?>">Register here</a></p>
        </div>
    </div>
</body>
</html>