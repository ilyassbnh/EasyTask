<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="index.php?action=login">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Connexion</button>
    </form>
    <p>Pas encore de compte ? <a href="index.php?action=register">Inscription</a></p>
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