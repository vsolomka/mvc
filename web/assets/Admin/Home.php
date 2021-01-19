<h1>Admin Home</h1>

<table>
<?php

foreach ($data as $row) {
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