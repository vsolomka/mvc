<h1>Admin Home</h1>

<table>
<?php
use Components\Orm\Connector;

$db_connector = new Connector("vsolomka_db");
$db_handler = $db_connector->connect();

$result = $db_handler->query("SELECT * FROM users");
foreach ($result as $row) {
    echo "<tr>";
    foreach ($row as $field => $value) {
        if (!is_int($field)) {
            echo "<td>$value</td>";
        }
    }
    echo "</tr>", PHP_EOL;
}

?>
</table>