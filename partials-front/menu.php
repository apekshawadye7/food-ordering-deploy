<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css">
</head>

<body>
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="<?php echo SITEURL; ?>">
                <img src="<?php echo SITEURL; ?>images/logo.png" alt="Restaurant Logo" class="img-responsive">
            </a>
        </div>

        <div class="menu text-right">
            <ul>
                <li><a href="<?php echo SITEURL; ?>">HOME</a></li>
                <li><a href="<?php echo SITEURL; ?>categories.php">CATEGORIES</a></li>
                <li><a href="<?php echo SITEURL; ?>foods.php">FOODS</a></li>
                <li><a href="<?php echo SITEURL; ?>contact.php">CONTACT</a></li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</section>
