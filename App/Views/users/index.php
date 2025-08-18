<h1 style="text-align:center; color:#333; font-family:Arial, sans-serif;">Users</h1>

<div style="width:90%; margin:20px auto; text-align:right;">
    <a href="/library-mvc/public/users/create" style="
        background-color:#4CAF50; 
        color:white; 
        padding:10px 20px; 
        text-decoration:none; 
        border-radius:5px;
        font-weight:bold;
        transition:0.3s;
    " 
    onmouseover="this.style.backgroundColor='#45a049'" 
    onmouseout="this.style.backgroundColor='#4CAF50'">
        Add User
    </a>
</div>

<table style="
    width:90%; 
    margin:0 auto; 
    border-collapse:collapse; 
    font-family:Arial, sans-serif;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
">
    <tr style="background-color:#4CAF50; color:white; text-align:center;">
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php if (!empty($users) && is_array($users)): ?>
        <?php foreach($users as $u): ?>
            <tr style="text-align:center; border-bottom:1px solid #ddd;">
                <td><?= htmlspecialchars($u['name']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td>
                    <a href="/users/<?= $u['id'] ?>/edit" style="
                        background-color:#2196F3; 
                        color:white; 
                        padding:5px 10px; 
                        text-decoration:none; 
                        border-radius:3px;
                        margin-right:5px;
                        font-size:0.9em;
                        transition:0.3s;
                    " 
                    onmouseover="this.style.backgroundColor='#1976D2'" 
                    onmouseout="this.style.backgroundColor='#2196F3'">
                        Edit
                    </a>
                    <form method="post" action="/users/delete" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $u['id'] ?>">
                        <button type="submit" style="
                            background-color:#f44336; 
                            color:white; 
                            padding:5px 10px; 
                            border:none; 
                            border-radius:3px;
                            font-size:0.9em;
                            cursor:pointer;
                            transition:0.3s;
                        " 
                        onmouseover="this.style.backgroundColor='#d32f2f'" 
                        onmouseout="this.style.backgroundColor='#f44336'">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3" style="text-align:center; padding:20px; color:#777;">No users found</td>
        </tr>
    <?php endif; ?>
</table>
