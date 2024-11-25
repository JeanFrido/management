<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Évolution des Stocks</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="authen">
        <div class="form-container-authen">
            <h2><img class="logo" src="assets/logo.jpg" alt="logo"></h2>
            <h2>Se connecter</h2>
            <form method="POST" action="login.php">
                Nom: <input type="text" name="nom" required>
                Mot de passe: <input type="password" name="password" required>
                <button type="submit">Se connecter</button>
            </form>

            <?php
            
session_start();
            if (isset($_SESSION['error'])) {
                echo "<p style=\"color: red;\">" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>
</body>
</html>
