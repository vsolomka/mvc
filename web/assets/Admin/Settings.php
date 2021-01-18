<h1>Admin settings</h1>

User Permissions:
<p>
<table cellspacing="0">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Created at</th>
    <th>Updated at</th>
    <th>Delete</th>
</tr>
<?php
// tbody
foreach ($data as $row) {
    echo <<<TR
<tr>
    <td>{$row["id"]}</td>
    <td>
        <form method="post" action="/admin/settings/update">
        <input type="hidden" name="id" value="{$row["id"]}"/>
        <input type="text" name="name" value="{$row["name"]}" class="editable">
        <button type="submit" class="update">&#10004;</button>
        </form>
    </td>
    <td>{$row["created_at"]}</td>
    <td>{$row["updated_at"]}</td>
    <td>
        <a href="/admin/settings/remove?id={$row["id"]}"><button class="delete">&times;</button></a>
    </td>

</tr>
TR;
}
?>
</table>
</p>
<p>
    <form method="post" action="/admin/settings/add">
    <input type="text" name="name">
    <button type="submit" class="addnew">&plus; Add new</button>
</form>
</p>