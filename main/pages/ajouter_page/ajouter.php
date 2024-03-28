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

</head>

<body>


    <h2>Ajouter un Article</h2>

    <!-- Bouton pour afficher le formulaire -->
    <button onclick="showForm()">Ajouter un Article</button>

    <!-- Fonction pour afficher le formulaire -->
    <script>
        function showForm() {
            // Créer un formulaire HTML
            var formHtml = `
            <div id="form-overlay" style=" position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
">
        <div id="form-container" style="    
            background-color: #20B2AA;
            padding: 20px;
            border-radius: 20px;">
            <h2 style="text-align: center;">Ajouter un Article</h2>
            <br>
            <form  method="POST">
                <label for="colors">Choisir une Type:</label>
                <br>
                <select id="colors" name="colors" style="width:150px">
                    <option value="red">Rouge</option>
                    <option value="green">Vert</option>
                    <option value="blue">Bleu</option>
                    <option value="yellow">Jaune</option>
                </select>
                <br><br>
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre" required>
                <br><br>
                <label for="prix">Prix:</label>

                <input type="number" name="prix"  id="prix">
                <br><br>
                <label for="description">Discription:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                <br><br>
                <input type="submit" value="Ajouter">
                <button onclick="hideForm()">Annuler</button>
            </form>
        </div>
    </div> 
  `;

            // Ajouter le formulaire au document
            document.body.insertAdjacentHTML('beforeend', formHtml);
        }

        // Fonction pour masquer le formulaire
        function hideForm() {
            var formOverlay = document.getElementById('form-overlay');
            formOverlay.parentNode.removeChild(formOverlay);
        }
    </script>

</body>

</html>