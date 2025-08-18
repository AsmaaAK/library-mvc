<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .page-title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .book-form {
            width: 450px;
            margin: 20px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .book-form input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        .book-form input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* أزرار */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #777;
            color: white;
            margin-left: 10px;
        }
        .btn-secondary:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <h1 class="page-title">Add New Book</h1>

    <form action="/library-mvc/public/books" method="POST" class="book-form">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" required>
        </div>

        <div class="form-group">
            <label for="available_copies">Available Copies</label>
            <input type="number" id="available_copies" name="copies" required>
        </div>

        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="date" id="published_date" name="published_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/library-mvc/public/books" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>
