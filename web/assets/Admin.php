<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page: <?php echo "$template/$page"; ?></title>
    <link rel="stylesheet" href="/web/css/main.css?87">
</head>
<body>

<nav>
<a href="/">/</a>
<ul class="menu">
    <li><a href="/admin">Home</a></li>
    <li><a href="/admin/actions">Actions</a></li>
    <li><a href="/admin/settings">Settings</a></li>
</ul>
</nav>

<?php
require "$template/$page.php";
?>

</body>
</html>