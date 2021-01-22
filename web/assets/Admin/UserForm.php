<div class="message <?php echo $data["fields"]["message-type"]; ?>"><?php echo $data["fields"]["message"]; ?></div>

<?php if (isset($data["fields"]["id"])): ?>
<form method="post" action="/admin/user/update">
    <input type="hidden" name="id" value="<?php echo $data["fields"]["id"] ?? "0"; ?>"/>
    <input type="text" name="first_name" value="<?php echo $data["fields"]["first_name"]; ?>" placeholder="First name" />
    <input type="text" name="last_name" value="<?php echo $data["fields"]["last_name"]; ?>" placeholder="Last name" />
    <input type="text" name="email" value="<?php echo $data["fields"]["email"]; ?>" placeholder="Email address" />
    <input type="text" name="password" value="" placeholder="Password" />
    <select name="id_user_permissions">
    <?php foreach ($data["permissions"] as $pid => $pname): ?>
        <option value="<?php echo $pid; ?>"<?php if ($pid == $data["fields"]["id_user_permissions"]) echo " selected"; ?>><?php echo $pname;?></option>
    <?php endforeach; ?>
    </select>
    <button type="submit" name="submit">&nbsp; &#10004; &nbsp;</button>
</form>
<?php else: ?>
<p>
    <a href="/admin/user">Back to the list of users</a>
</p>
<?php endif; ?>