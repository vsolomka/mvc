<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page: <?php echo "$template/$page"; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="/web/css/main.css?7">
</head>
<body>

<nav>
<a href="/">/</a>
<ul class="menu">
    <li><a href="/admin">Home</a></li>
    <li><a href="/admin/user">Users</a></li>
    <li><a href="/admin/permission">User permissions</a></li>
</ul>
</nav>
<main>
<?php
require "$template/$page.php";
?>
</main>

</body>
</html>