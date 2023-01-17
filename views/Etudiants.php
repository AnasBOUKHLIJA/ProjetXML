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
                                    <!--<th>Email</th>-->
                                    <th>Telephone</th>
                                    <th>Filiere</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php foreach (EtudiantController::getAll() as $etudiant){ ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($etudiant['Photo']) && is_file($etudiant['Photo'])){ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="<?php echo '/ProjetXML/'.$etudiant['Photo'];?>">
                                        <?php }elseif($etudiant['Sexe'] == 'M'){ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="/ProjetXML/views/ourAssets/images/etudiant.png">
                                        <?php }else{ ?>
                                            <img class="rounded-circle me-2" width="30" height="30" src="/ProjetXML/views/ourAssets/images/etudiant-file.png">
                                        <?php }?>

                                        <?php echo $etudiant['Nom'].' '.$etudiant['Prenom'] ?>
                                    </td>
                                    <td><?php echo $etudiant['Cne'] ?></td>
                                    <!--<td><?php /*echo $etudiant['Email'] */?></td>-->
                                    <td><?php echo $etudiant['Telephone'] ?></td>
                                    <td class="w-25"><?php echo FiliereController::get($etudiant['Filiere'])->Intitule ?></td>

                                    <td>
                                        <?php if (PermissionController::get($_SESSION['code'])['Removeprofesseur'] == 1) { ?>
                                            <button class="btn bg-transparent border-0" onclick="supprimer('etudiant','<?php echo $etudiant['Code']; ?>')">
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
                                           <?php if(!empty($etudiant['Photo']) && is_file($etudiant['Photo'])){ ?>
                                               <img class="shadow img-user" src="<?php echo '/ProjetXML/'.$etudiant['Photo'];?>">
                                           <?php }elseif($etudiant['Sexe'] == 'M'){ ?>
                                               <img class="shadow img-user" src="/ProjetXML/views/ourAssets/images/etudiant.png">
                                           <?php }else{ ?>
                                               <img class="shadow img-user" src="/ProjetXML/views/ourAssets/images/etudiant-file.png">
                                           <?php }?>
                                           <form method="POST" action="">
                                               <div class="card flex-row flex-wrap justify-content-evenly border-0 card-prof" style="padding-top: 60px; ">
                                                   <div class="m-3" style="width: 44%;">
                                                       <label for="Cne" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[3] ?></label>
                                                       <input class="form-control" id="Cne" disabled value="<?php echo $etudiant['Cne']?>">
                                                   </div>
                                                   <div class="m-3" style="width: 44%;">
                                                       <label for="Filiere" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[4] ?></label>
                                                       <input class="form-control" id="Filiere"  value="<?php echo FiliereController::get($etudiant['Filiere'])->Intitule ?>" disabled>
                                                   </div>
                                                   <div class="m-3" style="width: 44%;">
                                                       <label for="nom" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[5] ?></label>
                                                       <input class="form-control" id="nom" disabled value="<?php echo $etudiant['Nom']?>">
                                                   </div>
                                                   <div class="m-3" style="width: 44%;">
                                                       <label for="prenom" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[6] ?></label>
                                                       <input class="form-control" id="prenom"  value="<?php echo $etudiant['Prenom']?>" disabled>
                                                   </div>
                                                   <div class="m-3" style="width: 44%;">
                                                       <label for="cin" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[7] ?></label>
                                                       <input class="form-control" id="cin"  value="<?php echo $etudiant['Cin']?>" disabled>
                                                   </div>
                                                   <div class="m-3" style="width: 44%;">
                                                       <label for="email" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[8] ?></label>
                                                       <input class="form-control" id="email"  value="<?php echo $etudiant['Email']?>" disabled>
                                                   </div>
                                                   <div class="m-3 mb-5" style="width: 44%;">
                                                       <label for="tele" class="text-dark w-100 text-start"><?php echo LangueController::get($_COOKIE['langue'],'profil')[9] ?></label>
                                                       <input class="form-control" id="tele"  value="<?php echo $etudiant['Telephone']?>" disabled>
                                                   </div>
                                               </div>
                                               <?php /*if(PermissionController::get($_SESSION['code'])['Editagentscolarite'] == 1){ */?><!--
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