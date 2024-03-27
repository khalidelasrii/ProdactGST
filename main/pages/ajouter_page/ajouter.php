<?php
// session_start();
$conx = mysqli_connect("localhost", "root", "", "ofppt");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMessage = "";

if (isset($_POST['se_connect'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $requet = "SELECT * FROM auth WHERE email = ? AND pass = ?";
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