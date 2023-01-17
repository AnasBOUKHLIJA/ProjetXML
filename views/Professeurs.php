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
    <title>Professeurs</title>
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="/ProjetXML/views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/ProjetXML/views/ourAssets/CSS/style.css">
</head>

<body id="page-top">
<div id="wrapper">
    <?php include 'views/includes/sideBar.php'?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include_once 'views/includes/header.php';
            include_once 'views/includes/Toast.php'
            ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Liste des Professeurs</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Professeur Info</p>
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
                                <th>Departement</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (ProfesseurController::getAll() as $professeur){ ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($professeur['Photo']) && is_file($professeur['Photo'])){ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="<?php echo '/ProjetXML/'.$professeur['Photo'];?>">
                                        <?php }elseif($professeur['Sexe'] == 'M'){ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="/ProjetXML/views/ourAssets/images/prof.png">
                                        <?php }else{ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="/ProjetXML/views/ourAssets/images/prof-file.png">
                                        <?php }?>

                                        <?php echo $professeur['Nom'].' '.$professeur['Prenom'] ?>
                                    </td>
                                    <td><?php echo $professeur['Cin'] ?></td>
                                    <td><?php echo $professeur['Email'] ?></td>
                                    <td><?php echo $professeur['Telephone'] ?></td>
                                    <td><?php echo DepartementController::get($professeur['Departement']) ?></td>
                                    <td>
                                        <?php if (PermissionController::get($_SESSION['code'])['Removeprofesseur'] == 1) { ?>
                                            <button class="btn bg-transparent border-0" onclick="supprimer('professeur','<?php echo $professeur['Code']; ?>')">
                                                <img width="25" height="30" src="/ProjetXML/views/ourAssets/images/icon-delete-red.png">
                                            </button>
                                        <?php } ?>
                                        <button class="btn bg-transparent border-0 btn-absence" >
                                            <img width="30" height="30" src="/ProjetXML/views/ourAssets/images/icon-person.png">
                                        </button>
                                    </td>
                                </tr>

                                <div class="popup-modal-1">
                                    <div class="popup-window-1 bg-white shadow w-75 rounded-1">
                                        <?php if(!empty($professeur['Photo']) && is_file($professeur['Photo'])){ ?>
                                            <img class="shadow img-user" src="<?php echo '/ProjetXML/'.$professeur['Photo'];?>">
                                        <?php }elseif($professeur['Sexe'] == 'M'){ ?>
                                            <img class="shadow img-user" src="/ProjetXML/views/ourAssets/images/prof.png">
                                        <?php }else{ ?>
                                            <img class="shadow img-user" src="/ProjetXML/views/ourAssets/images/prof-file.png">
                                        <?php }?>
                                        <form method="POST" action="">
                                            <div class="card flex-row flex-wrap justify-content-evenly border-0 card-prof" style="padding-top: 60px; ">
                                                <div class="m-3" style="width: 44%;">
                                                    <label for="NumeroSomme" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[1] ?></label>
                                                    <input class="form-control" id="NumeroSomme" disabled value="<?php echo $professeur['NumeroSomme']?>">
                                                </div>
                                                <div class="m-3" style="width: 44%;">
                                                    <label for="Departement" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[2] ?></label>
                                                    <input class="form-control" id="Departement"  value="<?php echo DepartementController::get($professeur['Departement']) ?>" disabled>
                                                </div>
                                                <div class="m-3" style="width: 44%;">
                                                    <label for="nom" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[5] ?></label>
                                                    <input class="form-control" id="nom" disabled value="<?php echo $professeur['Nom']?>">
                                                </div>
                                                <div class="m-3" style="width: 44%;">
                                                    <label for="prenom" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[6] ?></label>
                                                    <input class="form-control" id="prenom"  value="<?php echo $professeur['Prenom']?>" disabled>
                                                </div>
                                                <div class="m-3" style="width: 44%;">
                                                    <label for="cin" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[7] ?></label>
                                                    <input class="form-control" id="cin"  value="<?php echo $professeur['Cin']?>" disabled>
                                                </div>
                                                <div class="m-3" style="width: 44%;">
                                                    <label for="email" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[8] ?></label>
                                                    <input class="form-control" id="email"  value="<?php echo $professeur['Email']?>" disabled>
                                                </div>
                                                <div class="m-3 mb-5" style="width: 44%;">
                                                    <label for="tele" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[9] ?></label>
                                                    <input class="form-control" id="tele"  value="<?php echo $professeur['Telephone']?>" disabled>
                                                </div>
                                            </div>
                                            <?php /*if(PermissionController::get($_SESSION['code'])['Editprofesseur'] == 1){ */?><!--
                                                    <button class="btn btn-primary btn-danger bg-danger w-50 " style="margin: 25px 25%;" type="submit" name="submit">Enregistrer</button>
                                                --><?php /*} */?>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="/ProjetXML/views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="/ProjetXML/views/assetsAdminPanel/js/theme.js"></script>
<script src="/ProjetXML/views/ourAssets/JS/Langue.js"></script>
<script src="/ProjetXML/views/ourAssets/JS/Suppression.js"></script>
<script src="/ProjetXML/views/OurAssets/js/popupWindow.js"></script>
</body>

</html>