<?php
    /*if($_SESSION['personneCategorie'] == 'Etudiant') {

    }elseif($_SESSION['personneCategorie'] == 'Directeur') {

    }elseif($_SESSION['personneCategorie'] == 'AgentScolarite') {

    }elseif($_SESSION['personneCategorie'] == 'Professeur') {

    }elseif($_SESSION['personneCategorie'] == 'SuperAdmin') {

    }*/
    $data = null;
    if($_SESSION['personneCategorie'] == 'Etudiant') {
        $data = EtudiantController::get($_SESSION['code']);
        $data['defaultImage'] = 'views/ourAssets/images/etudiant.png';
        $data['defaultImage-file'] = 'views/ourAssets/images/etudiant-file.png';
    }elseif($_SESSION['personneCategorie'] == 'Directeur') {
        $data = DirecteurController::get($_SESSION['code']);
        $data['defaultImage'] = 'views/ourAssets/images/prof.png';
        $data['defaultImage-file'] = 'views/ourAssets/images/prof-file.png';
    }elseif($_SESSION['personneCategorie'] == 'AgentScolarite') {
        $data = AgentScolariteController::get($_SESSION['code']);
        $data['defaultImage'] = 'views/ourAssets/images/agent.png';
        $data['defaultImage-file'] = 'views/ourAssets/images/agent-file.png';
    }elseif($_SESSION['personneCategorie'] == 'Professeur') {
        $data = ProfesseurController::get($_SESSION['code']);
        $data['defaultImage'] = 'views/ourAssets/images/prof.png';
        $data['defaultImage-file'] = 'views/ourAssets/images/prof-file.png';
    }elseif($_SESSION['personneCategorie'] == 'SuperAdmin') {
        $data = SuperAdminController::get($_SESSION['code']);
        $data['defaultImage'] = 'views/ourAssets/images/prof.png';
        $data['defaultImage-file'] = 'views/ourAssets/images/prof-file.png';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Accueil</title>
    <link rel="stylesheet" href="views/assetsAdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="views/ourAssets/CSS/style.css">
</head>

<body id="page-top">
<div id="wrapper">
    <?php include 'views/includes/sideBar.php'?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include_once 'views/includes/header.php' ?>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3>
                </div>

            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="views/assetsAdminPanel/js/theme.js"></script>
</body>

</html>