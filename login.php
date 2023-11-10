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

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Requête pour récupérer l'utilisateur de la base de données
    $sql = "SELECT id, password FROM utilisateurs WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
        
        // Vérifier le mot de passe haché
        if (password_verify($password, $hashedPassword)) {
            // Connexion réussie
            $_SESSION["user_id"] = $row["id"];
            header("Location: index-1.php"); // Rediriger vers la page de tableau de bord
            exit;
        } else {
            $message = "Mot de passe incorrect.";
        }
    } else {
        $message = "Email incorrect.";
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

        /* Liens dans la partie supérieure */
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

        /* Formulaires */
        .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-form input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #FFA28D;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #E6825C;
        }

        /* Icônes */
        .logout-button i {
            margin-right: 5px;
        }

        /* Centrage vertical et espacement des liens */
        .top-links {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 20px;
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
            .top-links {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
    <title>Login</title>
</head>
<body>
    <!-- En-tête -->
    <header class="header">
        <h1>Login</h1>
    </header>
    <br>
    <br>
    <!-- Liens supérieurs -->
    <div class="top-links">
        <a href="index-1.php">Home</a>
        
        
    </div>
    
    <!-- Contenu principal -->
    <main class="main-content">
        <section class="section">
            
           
        <form class="login-form" action="login.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button> <br> <br>
        <p style="text-align: center;">
            Don't have an account? 
            <a href="signup.php" style="color: #FFA28D; text-decoration: underline;">
                Sign Up
            </a>
        </p>
    </form>

    <?php
    if (isset($message)) {
        echo "<p style='color: red;'>$message</p>";
    }
    ?>
 
        </section>
    </main>
</body>
</html>
