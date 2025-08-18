<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        /* العنوان */
        .page-title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* الفورم */
        .user-form {
            width: 400px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .user-form input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s;
        }

        .user-form input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* زر الحفظ */
        .btn-save {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-save:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1 class="page-title">Add User</h1>

    <form method="post" action="/users" class="user-form">
        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" name="name" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" name="email" placeholder="Email" type="email" required>
        </div>

        <button class="btn-save">Save</button>
    </form>

</body>
</html>
