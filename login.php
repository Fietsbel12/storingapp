<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once 'resources/views/components/head.php'; ?>
    <?php require_once 'config/config.php'; ?>
</head>

<body>
    <?php require_once 'resources/views/components/header.php'; ?>
    <div class="container">
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">
            <label for="username">Gebruikersnaam</label>
            <input type="text" name="username" placeholder="user">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" placeholder="pass">
            <input type="submit" value="Inloggen">
        </form>
    </div>
</body>

</html>
