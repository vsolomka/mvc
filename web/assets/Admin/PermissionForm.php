<div class="message <?php echo $data["message-type"]; ?>"><?php echo $data["message"]; ?></div>

<?php if (isset($data["id"])): ?>
<form method="post" action="/admin/permission/update">
    <input type="hidden" name="id" value="<?php echo $data["id"]; ?>"/>
    <input type="text" name="name" value="<?php echo $data["name"]; ?>" placeholder="Permission name" />
    <button type="submit">&nbsp; &#10004; &nbsp;</button>
</form>
<?php else: ?>
<p>
    <a href="/admin/permission">Back to the list of permissions</a>
</p>
<?php endif ;?>
