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
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3>
                </div>
                <?php if($_SESSION['personneCategorie'] == 'Etudiant'){ ?>
                <div class="row">
                    <div class="col-lg-7 col-xl-8">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary fw-bold m-0 text-capitalize"><?php echo FiliereController::get($data['Filiere'])->Intitule ?></h6>
                            </div>
                            <div class="card-body">
                                <?php foreach (ModuleController::getByFiliere($data['Filiere']) as $module){ ?>
                                <div class="accueil-filiere">
                                    <h5 class="fw-bold">Module: <?php echo $module->Module ?></h5>
                                        <?php foreach (ElementController::getByModule($module->attributes()->Code) as $element){ ?>
                                            <div class="accueil-module">
                                                    <h6 class="fw-bold">Element: <?php echo $element->Element ?></h6>
                                                    <?php foreach (SeanceController::getAll($element->attributes()->Code) as $seance){ ?>
                                                        <div class="accueil-element">
                                                            <p class="fw-bold"><?php echo $seance->Semestre.' | S'.$seance->Semaine.' | Seance: '.$seance->Jour.' '.$seance->DateDebut.' '.$seance->DateFin.' Salle: '.SalleController::get($seance->attributes()->Salle)->Numero ?></p>
                                                        </div>
                                                    <?php } ?>
                                            </div>
                                        <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary fw-bold m-0 text-capitalize">Les absences</h6>
                            </div>
                            <div class="card-body">
                                <?php foreach (AbsenceController::getAllAbsenceForEtudiant($data['Code']) as $absence){ ?>
                                    <div class="accueil-absence">
                                        <div class="accueil-absence-element">
                                            <?php echo ElementController::get(SeanceController::get($absence->attributes()->Seance)->attributes()->Element)->Element,
                                                    ': ';?>
                                        </div>
                                        <div class="d-flex justify-content-between accueil-absence-details">
                                        <span>
                                            <?php echo 'S'.SeanceController::get($absence->attributes()->Seance)->Semaine
                                                    ,' | Seance: '.SeanceController::get($absence->attributes()->Seance)->Jour
                                                    ,' '.SeanceController::get($absence->attributes()->Seance)->DateDebut
                                                    ,' <=> '.SeanceController::get($absence->attributes()->Seance)->DateFin; ?>
                                        </span>
                                            <img width="30" height="30"  src="/ProjetXML/views/ourAssets/images/icon-absence.png">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{
                        echo "<h5 class='w-100 h-100 text-capitalize text-center'>nous travaillons à créer un tableau de bord pour vous, soyez patient et bonne journée</h5>";
                } ?>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="views/assetsAdminPanel/js/theme.js"></script>
<script src="views/ourAssets/JS/Langue.js"></script>
</body>

</html>