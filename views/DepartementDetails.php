<?php

if (PermissionController::get($_SESSION['code'])['Departement'] == 0) {
    header('location: /ProjetXML/accesRefuse');
}
$data = null;
if ($_SESSION['personneCategorie'] == 'Etudiant') {
    $data = EtudiantController::get($_SESSION['code']);
    $data['defaultImage'] = 'views/ourAssets/images/etudiant.png';
    $data['defaultImage-file'] = 'views/ourAssets/images/etudiant-file.png';
} elseif ($_SESSION['personneCategorie'] == 'Directeur') {
    $data = DirecteurController::get($_SESSION['code']);
    $data['defaultImage'] = 'views/ourAssets/images/prof.png';
    $data['defaultImage-file'] = 'views/ourAssets/images/prof-file.png';
} elseif ($_SESSION['personneCategorie'] == 'AgentScolarite') {
    $data = AgentScolariteController::get($_SESSION['code']);
    $data['defaultImage'] = 'views/ourAssets/images/agent.png';
    $data['defaultImage-file'] = 'views/ourAssets/images/agent-file.png';
} elseif ($_SESSION['personneCategorie'] == 'Professeur') {
    $data = ProfesseurController::get($_SESSION['code']);
    $data['defaultImage'] = 'views/ourAssets/images/prof.png';
    $data['defaultImage-file'] = 'views/ourAssets/images/prof-file.png';
} elseif ($_SESSION['personneCategorie'] == 'SuperAdmin') {
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
    <title>Departement details</title>
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/ourAssets/CSS/style.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'views/includes/sideBar.php' ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include_once 'views/includes/header.php';
                include_once 'views/includes/Toast.php'
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-xl-6 text-center mx-auto m-5">
                            <h1 class="fst-italic fw-bold">Departement : <?php echo DepartementController::get($_GET['dept']) ?></h1>
                        </div>
                    </div>
                    <?php $count = 0;
                    foreach (FiliereController::getByDepartement($_GET['dept']) as $filiere) { ?>
                        <div class="row row-cols-1 row-cols-md-2 mx-auto card-filiere" style="max-width: 900px;">
                            <div class="col <?php if ($count % 2 == 0) echo "order-md-last" ?> mb-5">
                                <img class="rounded img-fluid shadow" src="/ProjetXML/views/ourAssets/images/filiere.jpg">
                            </div>
                            <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                                <div>
                                    <h5 class="fw-bold"><?php echo $filiere->Intitule ?>&nbsp;</h5>
                                    <p class="text-muted mb-2">Chef Filiere : <?php echo FiliereController::getChefFiliere($filiere->attributes()->Chef_filiere) ?></p>
                                    <p class="text-muted mb-2">Nombre des Module : <?php echo FiliereController::getNombreModule($filiere->attributes()->Code) ?></p>
                                    <a href="/ProjetXML/filieresDetails/<?php echo $filiere->attributes()->Code ?>" class="btn btn-primary shadow" type="button">Voir les details</a>
                                    <?php if (PermissionController::get($_SESSION['code'])['Removedepartement'] == 1) { ?>
                                        <button class="btn p-2 bg-danger-btn border-0 btn-supp-filiere" onclick="supprimer('filiere','<?php echo $filiere->attributes()->Code; ?>')">
                                            <img width="30" height="30" src="/ProjetXML/views/ourAssets/images/icon-delete.png">
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php $count++;
                    } ?>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="/ProjetXML/views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
    <script src="/ProjetXML/views/assetsAdminPanel/js/theme.js"></script>
    <script src="/ProjetXML/views/ourAssets/JS/Langue.js"></script>
<script src="/ProjetXML/views/ourAssets/JS/Suppression.js"></script>
</body>

</html>