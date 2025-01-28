<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="<?php echo base_url('css/search.css'); ?>"> <!-- Link to your CSS file -->

</head>
<body>
    <h1>Search Images</h1>
    <form action="<?= site_url('search/results') ?>" method="post">
        <input type="text" name="query" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>