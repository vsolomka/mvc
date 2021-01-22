<h1>Users:</h1>

<table cellspacing="0">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email address</th>
    <th>Password</th>
    <th>Permission level</th>
    <th>Created at</th>
    <th>Updated at</th>
    <th><a href="/admin/user/add" title="Add new"><i class="fas fa-plus"></i></a></th>
</tr>
<?php

foreach ($data["users"] as $row) {
    echo <<<TR
    <tr>
        <td>{$row["id"]}</td>
        <td>{$row["first_name"]} {$row["last_name"]}</td>
        <td>{$row["email"]}</td>
        <td>{$row["password"]}</td>
        <td>{$data["permissions"][$row["id_user_permissions"]]}</td>
        <td>{$row["created_at"]}</td>
        <td>{$row["updated_at"]}</td>
        <td>
            <a href="/admin/user/edit?id={$row["id"]}" title="Edit"><i class="far fa-edit"></i></a>
            <a href="/admin/user/remove?id={$row["id"]}" title="Delete"><i class="far fa-trash-alt"></i></a>
        </td>
    
    </tr>
TR;
}

?>
</table>