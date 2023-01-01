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
    <title>Etudiants</title>
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
                <h3 class="text-dark mb-4">Liste des Etudiants</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Etudiant Info</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Nom et prenom</th>
                                    <th>Cin</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Cne</th>
                                    <th>Filiere</th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php foreach (EtudiantController::getAll() as $etudiant){ ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($etudiant['Photo']) && is_file($etudiant['Photo'])){ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="<?php echo $etudiant['Photo'];?>">
                                        <?php }elseif($etudiant['Sexe'] == 'M'){ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="views/ourAssets/images/etudiant.png">
                                        <?php }else{ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="views/ourAssets/images/etudiant-file.png">
                                        <?php }?>

                                        <?php echo $etudiant['Nom'].' '.$etudiant['Prenom'] ?>
                                    </td>
                                    <td><?php echo $etudiant['Cin'] ?></td>
                                    <td><?php echo $etudiant['Email'] ?></td>
                                    <td><?php echo $etudiant['Telephone'] ?></td>
                                    <td><?php echo $etudiant['Cne'] ?></td>
                                    <td><?php echo FiliereController::get($etudiant['Filiere'])->Intitule ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="views/assetsAdminPanel/js/theme.js"></script>
<script src="views/ourAssets/JS/Langue.js"></script>
</body>

</html>