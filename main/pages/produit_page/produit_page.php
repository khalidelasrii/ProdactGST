<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ofppt";

// Connexion à la base de données 

$conn =  mysqli_connect($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['titre'];
    $prix = $_POST['prix'];
    $type = $_POST['colors'];
    $description = $_POST['description'];
    // Préparer et exécuter la requête SQL pour insérer le nouveau produit
    $sql = "INSERT INTO produits (nomA,typeA ,descA,prixA) VALUES ('$nom','$type','$description', '$prix')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> hideForm();</script>";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}




// Update methode 
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
    <link rel="stylesheet" href="./produit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>


    <div class="container">

        <nav class="navBar">
            <ul>
                <li>
                    <a href="#">ProdactShop</a>

                </li>
            </ul>
            <ul>
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="">Community</a>
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
            <button onclick="showForm()">Ajouter un Article</button>

            <?php

            // SQL query
            $sqlReq = "SELECT * FROM produits";

            // Prepare statement
            $sqlPrepar = mysqli_prepare($conn, $sqlReq);

            // Execute statement
            mysqli_stmt_execute($sqlPrepar);

            //  results
            $result = mysqli_stmt_get_result($sqlPrepar);


            // Fetch data
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nam</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">color</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo $row["idA"] ?></th>
                            <td><?php echo $row["nomA"] ?></td>
                            <td><?php echo $row["typeA"] ?></td>
                            <td><?php echo $row["descA"] ?></td>
                            <td><?php echo $row["prixA"] ?></td>
                            <td><button onclick=" " class="btn me-3 btn-primary">Update</button><button class="btn btn-danger">Dellet</button></td>
                        </tr>
                    <?php  }
                    ?>
                </tbody>
            </table>
            <?php
            // Fermer la connexion à la base de données
            mysqli_stmt_close($sqlPrepar);
            // Close connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
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
        function updateProduit($id, $nom, $type, $prix, $descr, $color) {

            var formulareUp = `
         
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
    <h2 style="text-align: center;">Update  Article</h2>
    <br>
    <form  method="POST">
        <label for="colors">Choisir une Type:</label>
        <br>
        <select id="colors" value="green"  name="colors" style="width:150px">
            <option value="red">Rouge</option>
            <option value="green">Vert</option>
            <option value="blue">Bleu</option>
            <option value="yellow">Jaune</option>
        </select>
        <br><br>
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" value="$nom" required>
        <br><br>
        <label for="prix">Prix:</label>

        <input type="number" name="prix" value="$prix"  id="prix">
        <br><br>
        <label for="description">Discription:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" value="$descr" required></textarea>
        <br><br>
        <input type="submit" value="Update">
        <button onclick="hideForm()">Annuler</button>
    </form>
</div>
</div> 
        
        `;
        }
    </script>
</body>

</html>