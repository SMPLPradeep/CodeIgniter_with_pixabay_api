<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="<?php echo base_url('css/profile.css'); ?>"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error'); ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>
        
        <form method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= esc($user['name']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= esc($user['email']); ?>" required>
            
            <label for="profile_picture">Profile Picture:</label>
            <?php if (!empty($user['profile_picture'])): ?>
                <div>
                    <img src="<?= esc($user['profile_picture']); ?>" alt="Profile Picture" style="width: 100px; height: auto;">
                </div>
            <?php endif; ?>
            <input type="file" name="profile_picture" id="profile_picture">
            
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" placeholder="Leave blank to keep current password">
            
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Leave blank to keep current password">
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>