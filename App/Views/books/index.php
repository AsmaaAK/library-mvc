<div class="d-flex justify-content-between mb-4">
    <h1>Books</h1>
    <div>
        <a href="/books/create" class="btn btn-primary">Add New Book</a>
        <a href="/books/search" class="btn btn-secondary">Search Books</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Available</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($books as $book): ?>
    <li><?php echo $book['title']; ?> - <?php echo $book['author']; ?></li>
        <tr>
            <td><?= htmlspecialchars($book['id']) ?></td>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= htmlspecialchars($book['isbn']) ?></td>
            <td><?= htmlspecialchars($book['available_copies']) ?>/<?= htmlspecialchars($book['total_copies']) ?></td>
            <td>
                <a href="/books/edit/<?= $book['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/books/borrow/<?= $book['id'] ?>" class="btn btn-sm btn-info">Borrow</a>
                <form action="/books/delete/<?= $book['id'] ?>" method="POST" style="display:inline;">
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>