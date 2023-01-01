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
    <title>Profile</title>
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
                <h3 class="text-dark mb-4">Mon profil</h3>
                <div class="card shadow flex-row flex-wrap justify-content-evenly" style="margin: 80px 0;padding-top: 100px; ">
                    <?php if(!empty($data['Photo']) && is_file($data['Photo'])){ ?>
                        <img src="<?php echo $data['Photo']; ?>" class="position-absolute shadow top-0 start-50 translate-middle" style="width: 200px;height: 200px;border-radius: 50%;"/>
                    <?php }elseif($data['Sexe'] == 'M'){?>
                        <img src="<?php echo $data['defaultImage'] ?>" class="position-absolute shadow top-0 start-50 translate-middle" style="width: 200px;height: 200px;border-radius: 50%;"/>
                    <?php }else{ ?>
                        <img src="<?php echo $data['defaultImage-file'] ?>" class="position-absolute shadow top-0 start-50 translate-middle" style="width: 200px;height: 200px;border-radius: 50%;"/>
                    <?php }?>
                    <?php if($_SESSION['personneCategorie'] == 'Professeur'){ ?>
                        <div class="m-3" style="width: 44%;">
                            <label for="NumeroSomme" class="text-dark">Numero de Somme</label>
                            <input class="form-control" id="NumeroSomme" disabled value="<?php echo $data['NumeroSomme']?>">
                        </div>
                        <div class="m-3" style="width: 44%;">
                            <label for="Departement" class="text-dark">Departement</label>
                            <input class="form-control" id="Departement"  value="<?php echo DepartementController::get($data['Departement']) ?>" disabled>
                        </div>
                    <?php }elseif ($_SESSION['personneCategorie'] == 'Etudiant'){ ?>
                        <div class="m-3" style="width: 44%;">
                            <label for="Cne" class="text-dark">Cne</label>
                            <input class="form-control" id="Cne" disabled value="<?php echo $data['Cne']?>">
                        </div>
                        <div class="m-3" style="width: 44%;">
                            <label for="Filiere" class="text-dark">Filiere</label>
                            <input class="form-control" id="Filiere"  value="<?php echo FiliereController::get($data['Filiere'])->Intitule ?>" disabled>
                        </div>
                    <?php } ?>
                        <div class="m-3" style="width: 44%;">
                            <label for="nom" class="text-dark">Nom</label>
                            <input class="form-control" id="nom" disabled value="<?php echo $data['Nom']?>">
                        </div>
                        <div class="m-3" style="width: 44%;">
                            <label for="prenom" class="text-dark">Prenom</label>
                            <input class="form-control" id="prenom"  value="<?php echo $data['Prenom']?>" disabled>
                        </div>
                        <div class="m-3" style="width: 44%;">
                            <label for="cin" class="text-dark">Cin</label>
                            <input class="form-control" id="cin"  value="<?php echo $data['Cin']?>" disabled>
                        </div>
                        <div class="m-3" style="width: 44%;">
                            <label for="email" class="text-dark">Email</label>
                            <input class="form-control" id="email"  value="<?php echo $data['Email']?>" disabled>
                        </div>
                        <div class="m-3 mb-5" style="width: 44%;">
                            <label for="tele" class="text-dark">Telephone</label>
                            <input class="form-control" id="tele"  value="<?php echo $data['Telephone']?>" disabled>
                        </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="/ProjetXML/views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="/ProjetXML/views/assetsAdminPanel/js/theme.js"></script>
<script src="/ProjetXML/views/ourAssets/JS/Langue.js"></script>
</body>

</html>