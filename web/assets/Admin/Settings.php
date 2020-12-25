<h1>Admin settings</h1>

User Permissions:
<?php
foreach ($data as $key => $value) {
    $class = $value? "green": "red";
    echo "<p class=\"permission $class\">$key</p>";
}