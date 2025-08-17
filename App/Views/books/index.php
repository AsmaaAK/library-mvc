<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 20px;
    color: #333;
}


h1 {
    text-align: center;
    margin-bottom: 20px;
}

/* أزرار Add و Search */
.button-group a {
    text-decoration: none;
    padding: 10px 20px;
    margin-left: 5px;
    border-radius: 5px;
    font-weight: bold;
    transition: 0.3s;
    color: #fff;
}

.btn-primary {
    background-color: #4CAF50;
}

.btn-primary:hover {
    background-color: #45a049;
}

.btn-secondary {
    background-color: #2196F3;
}

.btn-secondary:hover {
    background-color: #1976D2;
}

/* جدول الكتب */
table {
    width: 90%;
    margin: 0 auto 20px auto;
    border-collapse: collapse;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    background-color: #fff;
}

table th, table td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #4CAF50;
    color: white;
}

/* تظليل الصفوف عند المرور بالماوس */
table tbody tr:hover {
    background-color: #f1f1f1;
}

/* أزرار Edit, Borrow, Delete داخل الجدول */
.action-btn {
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 0.9em;
    margin-right: 3px;
    color: #fff;
    transition: 0.3s;
}

.btn-edit {
    background-color: #FFA500;
}

.btn-edit:hover {
    background-color: #e69500;
}

.btn-borrow {
    background-color: #2196F3;
}

.btn-borrow:hover {
    background-color: #1976D2;
}

.btn-delete {
    background-color: #f44336;
    border: none;
    cursor: pointer;
}

.btn-delete:hover {
    background-color: #d32f2f;
}

/* رسالة إذا لم توجد كتب */
.no-books {
    text-align: center;
    color: #777;
    font-style: italic;
    margin-top: 20px;
}
</style>

<div class="d-flex justify-content-between mb-4" style="display:flex; justify-content:space-between; margin-bottom:20px;">
    <h1>Books</h1>
    <div class="button-group">
        <a href="/library-mvc/books/create" class="btn-primary">Add New Book</a>
        <a href="/library-mvc/books/search" class="btn-secondary">Search Books</a>
    </div>
</div>

<?php if (!empty($books) && is_array($books)): ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Available</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($books as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= $book['title'] ?></td>
            <td><?= $book['author']?></td>
            <td><?= $book['copies_available'] ?></td>
            <td>
                <a href="/library-mvc/books/edit/<?= $book['id'] ?>" class="action-btn btn-edit">Edit</a>
                <a href="/library-mvc/books/borrow/<?= $book['id'] ?>" class="action-btn btn-borrow">Borrow</a>
                <form action="/library-mvc/books/delete/<?= $book['id'] ?>" method="POST" style="display:inline;">
                    <button type="submit" class="action-btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p class="no-books">No books available.</p>
<?php endif; ?>
