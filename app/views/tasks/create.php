<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Create New Task</h1>
        <form action="<?php echo URLROOT; ?>/tasks/create" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" required>
            
            <label for="description">Description</label>
            <textarea name="description" required></textarea>
            
            <label for="category">Category</label>
            <input type="text" name="category">
            
            <label for="priority">Priority</label>
            <select name="priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            
            <input type="submit" value="Create Task">
        </form>
    </div>
</body>
</html>
