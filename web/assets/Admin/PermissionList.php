<h1>User Permissions:</h1>
<p>
<table cellspacing="0">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Created at</th>
    <th>Updated at</th>
    <th><a href="/admin/permission/add" title="Add new"><i class="fas fa-plus"></i></a></th>
</tr>
<?php
// tbody
foreach ($data as $row) {
    echo <<<TR
<tr>
    <td>{$row["id"]}</td>
    <td>{$row["name"]}</td>
    <td>{$row["created_at"]}</td>
    <td>{$row["updated_at"]}</td>
    <td>
        <a href="/admin/permission/edit?id={$row["id"]}" title="Edit"><i class="far fa-edit"></i></a>
        <a href="/admin/permission/remove?id={$row["id"]}" title="Delete"><i class="far fa-trash-alt"></i></a>
    </td>

</tr>
TR;
}
?>
</table>
</p>
