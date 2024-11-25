<?php
session_start();
include('assets/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    
    // Hachage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertion dans la base de données
    try {
        $sql = "INSERT INTO users (nom, role, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $role, $hashed_password]);
        
        $_SESSION['message'] = "Inscription réussie. Vous pouvez vous connecter.";
        header('Location: index.php'); // Redirection vers la page de connexion
    } catch (PDOException $e) {
        $_SESSION['error'] = "Erreur lors de l'inscription: " . $e->getMessage();
    }
}
?>
