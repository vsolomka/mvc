<h1>Admin settings</h1>

User Permissions:
<table cellspacing="0">
<tr>
<?php
// theader
foreach (array_keys($data[0]) as $field) {
    if (!is_int($field)) {
        echo "<th>$field</th>";
    }
}
?>
</tr>
<?php
// tbody
foreach ($data as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        if (!is_int($key)) {
            echo "<td title=\"$key\">$value</td>";
        }
    }
    echo "</tr>";
}
?>
</table>