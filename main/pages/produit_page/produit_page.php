<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['titre'];
    $prix = $_POST['prix'];
    $type = $_POST['colors'];
    $description = $_POST['description'];

    // Connexion à la base de données 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ofppt";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer et exécuter la requête SQL pour insérer le nouveau produit
    $sql = "INSERT INTO produits (nomA,typeA ,descA,prixA) VALUES ('$nom','$type','$description', '$prix')";

    if ($conn->query($sql) === TRUE) {
        echo "Le produit a été ajouté avec succès.";
        echo "<script> hideForm();</script>";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    // Fermer la connexion à la base de données
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
    <link rel="stylesheet" href="./produit.css">

</head>

<body>


    <div class="container">

        <nav class="navBar">
            <ul>
                <li>
                    <a href="#">BrandLOGO</a>

                </li>
            </ul>
            <ul>
                <li>
                    <a href="" >Aculle</a>
                </li>
                <li  >
                    <a href="" style="color:white ;background-color: rgb(8, 47, 82);    border-top-right-radius:15px ;
    border-top-left-radius: 15px;"  >Community</a>
                </li>
                <li>
                    <a href="">Deversity</a>
                </li>
                <li>
                    <a href="../login_page/login_page.php"><button>Login</button></a>
                </li>
            </ul>

        </nav>
        <div class="bodyArticle">

        </div>
        

    </div>



    <!-- Bouton pour afficher le formulaire -->
    <button onclick="showForm()">Ajouter un Article</button>

    <!-- Fonction pour afficher le formulaire -->
    <script src="./produit.js"> </script>

</body>

</html>