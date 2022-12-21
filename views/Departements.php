<?php
$data = null;
if($_SESSION['personneCategorie'] == 'Etudiant') {
    $data = EtudiantController::get($_SESSION['code']);
}elseif($_SESSION['personneCategorie'] == 'Directeur') {
    $data = DirecteurController::get($_SESSION['code']);
}elseif($_SESSION['personneCategorie'] == 'AgentScolarite') {
    $data = AgentScolariteController::get($_SESSION['code']);
}elseif($_SESSION['personneCategorie'] == 'Professeur') {
    $data = ProfesseurController::get($_SESSION['code']);
}elseif($_SESSION['personneCategorie'] == 'SuperAdmin') {
    $data = SuperAdminController::get($_SESSION['code']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Departements</title>
    <link rel="stylesheet" href="views/assetsAdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="views/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
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
                    <h3 class="text-dark mb-0">Departements</h3>
                </div>
                <section class="py-5">
                    <div class="container py-5">
                        <div class="row mb-4 mb-lg-5">
                            <div class="col-md-8 col-xl-6 text-center mx-auto">
                                <h3 class="fw-bold">Nos departements</h3>
                            </div>
                        </div>
                        <?php $count=0; foreach (DepartementController::getAll() as $departement){ ?>
                            <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;min-height: 300px">
                                <div class="col <?php if($count%2 == 0) echo "order-md-last" ?> mb-5">
                                    <img class="rounded img-fluid shadow" style="height: 100%" src="views/ourAssets/images/departement.png">
                                </div>
                                <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                                    <div>
                                        <h5 class="fw-bold"><?php echo $departement->Departement ?>&nbsp;</h5>
                                        <p class="text-muted mb-2">Chef Departement : <?php echo DepartementController::getChefDepartement($departement->attributes()->Chef_departement) ?></p>
                                        <p class="text-muted mb-2">Nombre des filiere : <?php echo DepartementController::getNombreFiliere($departement->attributes()->Code) ?></p>
                                        <p class="text-muted mb-4">Nombre des professeurs : <?php echo DepartementController::getNombreProfesseur($departement->attributes()->Code)  ?></p>
                                        <button class="btn btn-primary shadow" type="button">Voir les details</button>
                                    </div>
                                </div>
                            </div>
                        <?php $count++;} ?>
                    </div>
                </section>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="views/assetsAdminPanel/js/theme.js"></script>
</body>

</html>