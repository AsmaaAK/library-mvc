<h1>Edit User</h1>
<form method="post" action="/users/update">
    <input type="hidden" name="id" value="<?= $single['id'] ?>">
    <input name="name" value="<?= htmlspecialchars($single['name']) ?>" required>
    <input name="email" value="<?= htmlspecialchars($single['email']) ?>" type="email" required>
    <button>Update</button>
</form>
