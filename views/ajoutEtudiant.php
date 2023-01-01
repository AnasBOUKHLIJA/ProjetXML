<?php
if (PermissionController::get($_SESSION['code'])['Addetudiant'] == 0){
    header('location: /ProjetXML/accesRefuse');
}
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
if(isset($_POST['submit'])){
    EtudiantController::add($_POST);
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
    <?php include 'views/includes/sideBar.php' ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include_once 'views/includes/header.php' ?>
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-xl-4 w-100 mb-5">
                        <div class="card shadow">
                            <div class="card-body text-center d-flex flex-column align-items-center">
                                <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4">
                                    <img src="/ProjetXML/views/ourAssets/images/etudiant.png" style="width: 100%;height: 100%">
                                </div>
                                <h1 class="text-dark mb-0 align-content-center ">Ajouter un Etudiant</h1>
                                <form method="post" enctype="multipart/form-data" action="" class="w-100 d-flex flex-row flex-wrap justify-content-evenly">
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="nom">Nom</label>
                                        <input class="form-control" type="text" id="nom" name="nom" placeholder="Email">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="prenom">Prenom</label>
                                        <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Prenom">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Sexe">Sexe</label>
                                        <select class="form-control" id="Sexe" name="sexe">
                                            <option value="F">Féminin</option>
                                            <option value="M">Masculin</option>
                                        </select>
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Cin">Cin</label>
                                        <input class="form-control" type="text" id="Cin" name="cin" placeholder="Cin">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Cne">Cne</label>
                                        <input class="form-control" type="text" id="Cne" name="cne" placeholder="Cne">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="filiere">Filiere</label>
                                        <select class="form-control" id="filiere" name="filiere">
                                            <?php foreach (FiliereController::getAll() as $filiere){ ?>
                                                <option value="<?php echo $filiere->attributes()->Code  ?>"><?php echo $filiere->Intitule ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Email">Email</label>
                                        <input class="form-control" type="text" id="Email" name="email" placeholder="Email">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Telephone">Telephone</label>
                                        <input class="form-control" type="text" id="Telephone" name="telephone" placeholder="Telephone">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Username">Username</label>
                                        <input class="form-control" type="text" id="Username" name="username" placeholder="Username">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Password">Password</label>
                                        <input class="form-control" type="text" id="Password" name="password" placeholder="Password">
                                    </div>
                                    <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                        <label for="Photo">Photo</label>
                                        <input class="form-control" type="file" id="Photo" name="photo" placeholder="Photo">
                                    </div>
                                    <div class="mb-3 m-lg-5" style="width: 50%">
                                        <button class="btn btn-primary shadow d-block w-100" type="submit" name="submit">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="/ProjetXML/views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
<script src="/ProjetXML/views/assetsAdminPanel/js/theme.js"></script>
<script src="views/ourAssets/JS/Langue.js"></script>
</body>

</html>