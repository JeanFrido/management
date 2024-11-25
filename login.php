<?php
session_start();
include('assets/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    
    // Vérification des informations dans la base de données
    $sql = "SELECT * FROM users WHERE nom = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Authentification réussie, stockage des informations dans la session
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['role'] = $user['role'];

        // Redirection en fonction du rôle
        if ($user['role'] === 'admin') {
            $_SESSION['autorise'] = "yes";
            header('Location: directeur');
        } elseif($user['role'] === 'grh') {
            $_SESSION['autorise'] = "yes";
            header('Location: grh');
        }else{
            $_SESSION['autorise'] = "yes";
            header('Location: dashboard');
        }
        exit();
    } else {
        $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect";
        header('Location: ../management');
    }
}
?>

