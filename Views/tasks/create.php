<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer une tâche</title>
</head>
<body>
    <h1>Créer une nouvelle tâche</h1>
    <form method="post" action="index.php?action=create">
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <br>
        <label for="category">Catégorie:</label>
        <input type="text" id="category" name="category">
        <br>
        <label for="priority">Priorité:</label>
        <select id="priority" name="priority">
            <option value="low">Faible</option>
            <option value="medium">Moyenne</option>
            <option value="high">Élevée</option>
        </select>
        <br>
        <!-- Input box for specifying the user ID -->
        <label for="user_id">ID Utilisateur:</label>
        <input type="number" id="user_id" name="user_id" required>
        <br>
        <button type="submit">Créer</button>
    </form>
</body>
</html>
