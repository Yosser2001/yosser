<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfa";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        // Hacher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Requête pour insérer l'utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO utilisateurs (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashedPassword);
        
        if ($stmt->execute()) {
            $message = "Inscription réussie. Vous pouvez maintenant vous connecter avec votre email.";
        } else {
            $message = "Erreur lors de l'inscription : " . $stmt->error;
        }
        
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header */
        .header {
            background-color: #FFA28D;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        /* Main Content */
        .main-content {
            padding: 20px;
            background-color: #fff;
        }

        .section {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Formulaires */
        .signup-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .signup-form input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #FFA28D;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .signup-form button:hover {
            background-color: #E6825C;
        }
        .top-links {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .top-links a {
            color: #ccc;
            text-decoration: none;
            padding: 10px 20px;
            transition: color 0.3s;
        }

        .top-links a:hover {
            color: #FFA28D;
        }
        .top-links a, .logout-button {
            display: flex;
            align-items: center;
            color: #999999;
            text-decoration: none;
            padding: 10px 20px;
            transition: color 0.3s;
        }

        .top-links a:hover, .logout-button:hover {
            color: #FFA28D;
        }


        /* Responsive */
        @media (max-width: 768px) {
            /* Ajoutez les styles responsifs ici si nécessaire */
        }
    </style>
    <title>Sign Up</title>
</head>
<body>
    <header class="header">
        <h1>Sign Up</h1>
    </header>
    <br>
    <br>
    <!-- Liens supérieurs -->
    <div class="top-links">
        <a href="index-1.php">Home</a>
        
        
    </div>
    <main class="main-content">
        <section class="section">
            <h2 style="text-align: center;">Create an Account</h2><br><br>
            <p style="text-align: center; color: #FFA28D;">Please fill in the following details to create an account.</p> <br> <br>
            <form class="signup-form" action="signup.php" method="post">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit" name="signup_button">Sign Up</button>
                <?php
                if (isset($_POST["signup_button"])) {
                    // Votre code de traitement pour l'inscription ici
                    
                    // Après le traitement, rediriger l'utilisateur vers la page de connexion
                    header("Location: login.php");
                    exit; // Assurez-vous de quitter le script après la redirection
                }
                ?>
            </form>
        </section>
    </main>
</body>
</html>