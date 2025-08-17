<h1>Edit Book</h1>

<form action="/books/edit/<?= $book['id'] ?>" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn" value="<?= htmlspecialchars($book['isbn']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="total_copies" class="form-label">Total Copies</label>
        <input type="number" class="form-control" id="total_copies" name="total_copies" value="<?= htmlspecialchars($book['total_copies']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="available_copies" class="form-label">Available Copies</label>
        <input type="number" class="form-control" id="available_copies" name="available_copies" value="<?= htmlspecialchars($book['available_copies']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="published_date" class="form-label">Published Date</label>
        <input type="date" class="form-control" id="published_date" name="published_date" value="<?= htmlspecialchars($book['published_date']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/books" class="btn btn-secondary">Cancel</a>
</form>