<h1>Add New Book</h1>

<form action="/library-mvc/books" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" required>
    </div>
   
    
    <div class="mb-3">
        <label for="available_copies" class="form-label">Available Copies</label>
        <input type="number" class="form-control" id="available_copies" name="copies" required>
    </div>
    <div class="mb-3">
        <label for="published_date" class="form-label">Published Date</label>
        <input type="date" class="form-control" id="published_date" name="published_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="/books" class="btn btn-secondary">Cancel</a>
</form>