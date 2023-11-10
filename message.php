<?php
session_start(); // Démarrez la session au début de chaque page où vous l'utilisez

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

// Traitement du formulaire de contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'e-mail soumis dans le formulaire
    $submittedEmail = $_POST["email"];

    // Vérifier si l'e-mail soumis existe dans la table "utilisateurs"
    $userCheckQuery = "SELECT * FROM utilisateurs WHERE email = '$submittedEmail'";
    $result = $conn->query($userCheckQuery);

    if ($result && $result->num_rows > 0) {
        // L'utilisateur est connecté, permettez-lui d'envoyer un message
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        // Requête SQL d'insertion des données dans la table
        $sql = "INSERT INTO messages (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            $messageStatus = "Message envoyé avec succès !";
            $messageSent = true; // Ajout de cette ligne pour indiquer l'envoi réussi
        } else {
            $messageStatus = "Échec de l'envoi du message. Vous devez créer un compte.";
        }
    } else {
        $messageStatus = "Vous devez être connecté pour envoyer un message.";
    }
}

$conn->close();
?>

<style>
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
<header class="header">
<div id="message" class="alert-msg">
                        <?php
                        if (isset($messageStatus)) {
                            if ($messageStatus === 'Message envoyé avec succès !') {
                                echo "<p class='success-msg'>Votre message a été envoyé avec succès !</p>";
                            } else {
                                echo "<p class='error-msg'>Échec de l'envoi du message. Vous devez créer un compte.</p>";
                            }
                        }
                        ?>
    </header>
    <br>
   
    <!-- Liens supérieurs -->
    <div class="top-links">
        <a href="index-1.php">Home</a>
        
        
    </div>
    <div>
    <p style="text-align: center;">
            Vous n'avez pas un compte? 
            <a href="signup.php" style="color: #FFA28D; text-decoration: underline;">
                Sign Up
            </a>
                    </div>

               