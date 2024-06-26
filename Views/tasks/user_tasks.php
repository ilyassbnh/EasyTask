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
    <link rel="stylesheet" href="../../Css/style.css">
</head>
<body>
    <h1>Liste des tâches</h1>

    <!-- Search bar -->
    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="tasks">
        <label for="search">Rechercher:</label>
        <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit">Rechercher</button>
    </form>

    <!-- Filter dropdown list -->
    <form action="index.php" method="GET">
        <input type="hidden" name="action" value="tasks">
        <label for="filter">Filtrer par priorité:</label>
        <select id="filter" name="filter">
            <option value="">Toutes</option>
            <option value="low" <?php echo isset($_GET['filter']) && $_GET['filter'] == 'low' ? 'selected' : ''; ?>>Faible</option>
            <option value="medium" <?php echo isset($_GET['filter']) && $_GET['filter'] == 'medium' ? 'selected' : ''; ?>>Moyenne</option>
            <option value="high" <?php echo isset($_GET['filter']) && $_GET['filter'] == 'high' ? 'selected' : ''; ?>>Élevée</option>
        </select>
        <button type="submit">Filtrer</button>
    </form>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li class="<?php echo $task['completed'] ? 'completed' : ''; ?>">
                <form action="index.php" method="GET" style="display:inline;">
                    <input type="hidden" name="action" value="markComplete">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <input type="checkbox" name="completed" <?php echo $task['completed'] ? 'checked' : ''; ?> onchange="this.form.submit()">
                    <?php echo htmlspecialchars($task['title']); ?> - <?php echo htmlspecialchars($task['description']); ?>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <form action="index.php?action=logout" method="POST" style="display:inline;">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
<style>
/* General styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

h1 {
    color: #333;
    text-align: center;
    margin-top: 20px;
}

form {
    margin: 20px auto;
    text-align: left;
    max-width: 400px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

label {
    display: block;
    margin-top: 10px;
}

input[type="text"],
input[type="password"],
input[type="number"],
textarea,
select,
button {
    width: calc(100% - 22px);
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

button:hover {
    background-color: #45a049;
}

a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

p {
    text-align: center;
}

.error {
    color: red;
    text-align: center;
}

/* Task list styles */
ul {
    list-style-type: none;
    padding: 0;
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

li {
    padding: 15px;
    border-bottom: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

li:last-child {
    border-bottom: none;
}

li.completed {
    text-decoration: line-through;
    color: #999;
}

li form {
    margin: 0;
}

li a {
    margin-left: 10px;
}

/* Header and Logout Button */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #4CAF50;
    color: white;
}

header h1 {
    margin: 0;
}

header nav form {
    display: inline;
}

.logout-button {
    background-color: #f44336;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    color: white;
    transition: background-color 0.3s ease;
}

.logout-button:hover {
    background-color: #e53935;
}

/* Responsive styles */
@media (max-width: 600px) {
    body {
        padding: 10px;
    }

    form {
        max-width: 100%;
        padding: 15px;
    }

    ul {
        max-width: 100%;
        padding: 0;
    }

    li {
        flex-direction: column;
        align-items: flex-start;
    }

    li a {
        margin-left: 0;
        margin-top: 10px;
    }

    header {
        flex-direction: column;
        align-items: flex-start;
    }

    header h1 {
        margin-bottom: 10px;
    }
}

</style>