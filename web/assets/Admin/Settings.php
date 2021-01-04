<h1>Admin settings</h1>

User Permissions:
<table>
<?php
foreach ($data as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<td title=\"$key\">$value</td>";
    }
    echo "<tr>";
}
?>
</table>