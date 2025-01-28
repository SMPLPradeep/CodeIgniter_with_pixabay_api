<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>"> <!-- Link to your CSS file -->
</head>
<body>

<div class="dashboard-container">
    <aside class="sidebar">
        <nav>
            <a href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
            <a href="<?php echo site_url('profile'); ?>">Profile</a>
            <a href="<?php echo site_url('search'); ?>">Search</a>
        </nav>
    </aside>

    <main class="main-content">
        <div class="welcome-message">
            <h1>Welcome, <?php echo $user['name']; ?></h1>
            <h5>Your Profile Picture:</h5>
            <img src="<?= base_url('upload_users_profile/' . esc($user['profile_picture'])); ?>" alt="Profile Picture" style="width: 150px; height: auto;">
            <p>Email: <?= $user['email']; ?></p>
        </div>
    </main>
</div>

</body>
</html>