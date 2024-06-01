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

    <!-- Search bar -->
    <form action="index.php?action=search" method="GET">
        <label for="search">Rechercher une tâche:</label>
        <input type="text" id="search" name="search">
        <button type="submit">Rechercher</button>
    </form>

    <!-- Filter dropdown list -->
    <form action="index.php?action=filter" method="GET">
        <label for="filter">Filtrer par priorité:</label>
        <select id="filter" name="filter">
            <option value="">Toutes</option>
            <option value="low">Faible</option>
            <option value="medium">Moyenne</option>
            <option value="high">Élevée</option>
        </select>
        <button type="submit">Filtrer</button>
    </form>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li class="<?php echo $task['completed'] ? 'completed' : ''; ?>">
                <?php echo htmlspecialchars($task['title']); ?> - <?php echo htmlspecialchars($task['description']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
