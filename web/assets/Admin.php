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
    <li><a href="/admin">/</a></li>
    <li><a href="/admin/actions">Actions</a></li>
    <li><a href="/admin/settings">Settings</a></li>
</ul>
</nav>

<?php
require "$template/$page.php";
?>

</body>
</html>