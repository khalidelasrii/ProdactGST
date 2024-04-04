<?php
// session_start();
$conx = mysqli_connect("localhost", "root","", "ofppt");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMessage = "";

if (isset($_POST['se_connect'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $requet = "SELECT * FROM auth WHERE email like '$email' and pass = '$pass'";
    $stmt = mysqli_prepare($conx, $requet);
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
    mysqli_stmt_execute($stmt);
    $response = mysqli_stmt_get_result($stmt);

    if ($user_data = mysqli_fetch_array($response)) {
        // Utilisateur authentifié
        // Décommentez les lignes ci-dessous pour gérer la session
        // $_SESSION['userId'] = $user_data["id"];
        // $_SESSION['userEmail'] = $user_data["email"];
        // $_SESSION['userName'] = $user_data["pass"];
        print("Hello World");
        header("location: ../../index.php");
        exit(); // Assurez-vous de sortir du script après la redirection
    } else {
        $errorMessage = "Email or Password incorrect!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
    
</head>

<body >
   
    <div class="container">
        <div class="container_child">
            <div class="card-decoration">
                <a href="../produit_page/produit_page.php"><span class="icon-close"><ion-icon name="close-outline"></ion-icon></span></a>
                <form class="form-box-login" id="form-box-login" method="POST">
                    <h1>Login</h1>
                    <h6><?php echo $errorMessage ?></h6>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
                    <br><br>
                    <input type="password" id="pass" name="pass" placeholder="*******" required>
                    <input type="submit" id="se_connect" name="se_connect" value="connexion" class="connexion">
                </form>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
