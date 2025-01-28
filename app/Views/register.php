<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo site_url('auth/register'); ?>"> 
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <div class="register-link">
            <p>Already have an account? <a href="<?php echo site_url('auth/login'); ?>">Login here</a></p>
        </div>
    </div>
</body>
</html>