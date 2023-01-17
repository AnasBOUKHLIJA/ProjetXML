<?php
if(isset($_POST['submit'])){
    AuthentificationController::Authenticate($_POST);
}elseif (isset($_GET['dept'])){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- box icons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/ourAssets/CSS/style.css">
    <title>Connexion</title>
</head>
<body id="body-connexion">
<div id="container-form">
    <!-- bienvenue dans votre espace de gestion des absences -->
    <div id="container-user-img"><img src="/ProjetXML/views/ourAssets/images/icon-unlock.png" alt=""></div>
    <form method="POST" action="">
        <div class="group-input-field">
            <label>Username</label>
            <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input name="username" placeholder="Entrer votre username">
            </div>
        </div>
        <div class="group-input-field">
            <label>Password</label>
            <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Entere votre password">
            </div>
        </div>
        <button type="submit" name="submit">Se connecter</button>
    </form>
</div>
<img src="/ProjetXML/views/ourAssets/images/wave.svg" id="wave" />
</body>
</html>
