<?php
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
    <title>Filieres</title>
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/ourAssets/CSS/style.css">
</head>

<body id="page-top">
<div id="wrapper">
    <?php include 'views/includes/sideBar.php'?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include_once 'views/includes/header.php' ?>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-center align-items-center mb-4">
                    <h1 class="text-dark mb-0 align-content-center "><?php echo FiliereController::get($_GET['dept'])?></h1>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 1000px;">
                    <?php foreach (ModuleController::getByFiliere($_GET['dept']) as $module){ ?>
                        <div class="col mb-4 shadow">
                            <div><a href="#"><img class="rounded img-fluid shadow w-100 fit-cover" src="/ProjetXML/views/ourAssets/images/module.jpg" style="height: 250px;"></a>
                                <div class="py-4"><span class="badge bg-primary mb-2"><?php echo ModuleController::getCoordonateur($module->attributes()->Coordonateur); ?></span>
                                    <h4 class="fw-bold" style="height: 60px"><?php echo $module->Module ?></h4>
                                    <a href="/ProjetXML/moduleDetails/<?php echo $module->attributes()->Code ?>" class="btn btn-primary shadow w-100">Voir les details</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="/ProjetXML/views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="/ProjetXML/views/assetsAdminPanel/js/theme.js"></script>
</body>

</html>