<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Task List</h1>
        <a href="<?php echo URLROOT; ?>/tasks/create">Create New Task</a>
        <ul>
            <?php foreach($data['tasks'] as $task): ?>
                <li>
                    <?php echo $task->title; ?>
                    <a href="<?php echo URLROOT; ?>/tasks/edit/<?php echo $task->id; ?>">Edit</a>
                    <a href="<?php echo URLROOT; ?>/tasks/delete/<?php echo $task->id; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
