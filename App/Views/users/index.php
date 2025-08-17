<h1>Users</h1>
<a href="/users/create">Add User</a>
<table border="1" cellpadding="5">
    <tr><th>Name</th><th>Email</th><th>Actions</th></tr>
    <?php foreach($users as $u): ?>
    <tr>
        <td><?= htmlspecialchars($u['name']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td>
            <a href="/users/<?= $u['id'] ?>/edit">Edit</a>
            <form method="post" action="/users/delete" style="display:inline;">
                <input type="hidden" name="id" value="<?= $u['id'] ?>">
                <button>Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
