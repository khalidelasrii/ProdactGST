<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    
</head>

<body>
    
<div class="container">

<nav class="navBar">

<a href="./pages/sign_in_page.html">BrandLOGO</a>
<ul>
    <li>
        <a href="">Branding</a>
    </li>
    <li>
        <a href="">Aculle</a>
    </li>
    <li>
        <a href="">Community</a>
    </li>
    <li>
        <a href="">Deversity</a>
    </li>
    <li>
        <button>Login</button>
    </li>
</ul>

</nav>
<div class="card-decoration">
                    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>

                    <form class="form-box-login" id="form-box-login" action="">
                        <h1>Login</h1>
    
                        <input type="email" id="email" name="email" placeholder="exemple@gmail.com">
                        <br><br>
                        <input type="password" id="pass" name="pass" placeholder="*******">
    
                        <button onclick="_auth()" class="connexion">Connexion</button>
                    </form>

                    <form class="form-box-register" id="form-box-register" action="">
                        <h1>Registration</h1>
                        <input type="email" id="email" name="email" placeholder="exemple@gmail.com">
                        <br><br>
                        <input type="password" id="pass" name="pass" placeholder="*******">
    
                        <button onclick="_auth()" class="connexion">Connexion</button>
                    </form>
                </div>
</div>


<script src="index.js"></script>
</body>

</html>