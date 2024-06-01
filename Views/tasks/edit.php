<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier une tâche</title>
</head>
<body>
    <h1>Modifier la tâche</h1>
    <form method="post" action="index.php?action=edit&id=<?php echo $task['id']; ?>">
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($task['description']); ?></textarea>
        <br>
        <label for="category">Catégorie:</label>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($task['category']); ?>">
        <br>
        <label for="priority">Priorité:</label>
        <select id="priority" name="priority">
            <option value="low" <?php echo $task['priority'] == 'low' ? 'selected' : ''; ?>>Faible</option>
            <option value="medium" <?php echo $task['priority'] == 'medium' ? 'selected' : ''; ?>>Moyenne</option>
            <option value="high" <?php echo $task['priority'] == 'high' ? 'selected' : ''; ?>>Élevée</option>
        </select>
        <br>
        <label for="completed">Complétée:</label>
        <input type="checkbox" id="completed" name="completed" <?php echo $task['completed'] ? 'checked' : ''; ?>>
        <br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
