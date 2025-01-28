<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="<?php echo base_url('css/search.css'); ?>"> <!-- Link to your CSS file -->

</head>
<body>
    <h1>Search Results</h1>
    <a href="<?= site_url('search') ?>">Back to Search</a>
    <ul>
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $result): ?>
                <li>
                    <img src="<?= esc($result->webformatURL); ?>" alt="<?= esc($result->tags); ?>" style="width: 200px;">
                    <p><?= esc($result->tags); ?></p>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </ul>
</body>
</html>