<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page: <?php echo "$template/$page"; ?></title>
    <link rel="stylesheet" href="/web/css/main.css">
</head>
<body>

<nav>
<ul class="menu">
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/gallery">Gallery</a></li>
</ul>
<a href="/admin">/admin</a>
</nav>

<?php
require "$template/$page.php";
?>

</body>
</html>
