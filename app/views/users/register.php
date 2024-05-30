<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" required>
            
            <label for="email">Email</label>
            <input type="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" name="password" required>
            
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
