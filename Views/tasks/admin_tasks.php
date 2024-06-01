<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <h1>Liste des tâches</h1>
    <a href="index.php?action=create">Créer une nouvelle tâche</a>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li class="<?php echo $task['completed'] ? 'completed' : ''; ?>">
                <form method="post" action="index.php?action=toggleComplete&id=<?php echo $task['id']; ?>" style="display: inline;">
                    <input type="checkbox" onchange="this.form.submit()" <?php echo $task['completed'] ? 'checked' : ''; ?>>
                </form>
                <?php echo htmlspecialchars($task['title']); ?> - <?php echo htmlspecialchars($task['description']); ?>
                <a href="index.php?action=edit&id=<?php echo $task['id']; ?>">Modifier</a>
                <a href="index.php?action=delete&id=<?php echo $task['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
