<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    margin: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}
form {
    width: 90%;
    max-width: 600px;
    margin: 0 auto 20px auto;
    display: flex;
}

form input[type="text"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    font-size: 1em;
}

form button {
    padding: 10px 20px;
    border: none;
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    cursor: pointer;
    border-radius: 0 5px 5px 0;
    transition: 0.3s;
}

form button:hover {
    background-color: #45a049;
}

/* الجدول */
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

table tbody tr:hover {
    background-color: #f1f1f1;
}

/* زر العودة */
.back-btn {
    display: inline-block;
    margin: 0 auto;
    padding: 10px 20px;
    background-color: #2196F3;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: 0.3s;
}

.back-btn:hover {
    background-color: #1976D2;
}

/* رسالة إذا لم توجد نتائج */
.no-books {
    text-align: center;
    color: #777;
    font-style: italic;
    margin-top: 20px;
}
</style>

<h1>Search Books</h1>

<form action="/books/search" method="GET">
    <input type="text" name="search" placeholder="Search by title, author or ISBN" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <button type="submit">Search</button>
</form>

<?php if (isset($books) && !empty($books)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars($book['id']) ?></td>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td><?= htmlspecialchars($book['isbn']) ?></td>
                <td><?= htmlspecialchars($book['available_copies']) ?>/<?= htmlspecialchars($book['total_copies']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="no-books">No books found for your search.</p>
<?php endif; ?>

<div style="text-align:center;">
    <a href="/books" class="back-btn">Back to Books</a>
</div>
