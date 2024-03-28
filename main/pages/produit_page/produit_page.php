<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ofppt";


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
    // Connexion à la base de données 


    // Préparer et exécuter la requête SQL pour insérer le nouveau produit
    $sql = "INSERT INTO produits (nomA,typeA ,descA,prixA) VALUES ('$nom','$type','$description', '$prix')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> hideForm();</script>";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    // Fermer la connexion à la base de données



}







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
                    <a href="" style="color:white ;background-color: rgb(8, 47, 82);    border-top-right-radius:15px ;
    border-top-left-radius: 15px;">Community</a>
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
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
   
  </tbody>
</table>


<h1>   <?php echo $row["idA"] ?></h1>
<?php

                // For example:
                // echo $row['column_name'];
            }
            mysqli_stmt_close($sqlPrepar);
            // Close connection
            mysqli_close($conn);
            ?>

        </div>


    </div>









    <script src="./produit.js"> </script>
</body>

</html>