<h1>Admin Home</h1>

<?php
use Components\Orm\Connector;

$db_connector = new Connector("vsolomka_db");
$db_handler = $db_connector->connect();

$result = $db_handler->query("SELECT * FROM user_permission");
foreach ($result as $row) {
    var_export($row);
    echo "<br/>", PHP_EOL;
}