<?php

if (PermissionController::get($_SESSION['code'])['Module'] == 0){
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
if(isset($_POST['submit'])){
    $_POST['module'] = $_GET['dept'];
    ElementController::add($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Module details</title>
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
                    <div class="d-sm-flex justify-content-center align-items-center mb-4">
                        <h1 class="text-dark mb-0 align-content-center ">Module : <?php echo ModuleController::get($_GET['dept'])->Module ?></h1>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-xl-4 w-100 mb-5">
                            <?php if(PermissionController::get($_SESSION['code'])['Addelement'] == 1){ ?>
                            <div class="card shadow">
                                <div class="card-body text-center d-flex flex-column align-items-center">
                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4">
                                        <img src="/ProjetXML/views/ourAssets/images/element.jpg" class="rounded" style="width: 100%;height: 100%">
                                    </div>
                                    <h1 class="text-dark mb-0 align-content-center ">Ajouter un Element</h1>
                                    <form method="post" enctype="multipart/form-data" action="" class="w-100 d-flex flex-row flex-wrap justify-content-evenly">
                                        <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                            <label for="Element">Element</label>
                                            <input class="form-control" type="text" id="Element" name="element" placeholder="Element">
                                        </div>
                                        <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                            <label for="NombreHeures">Nombre des heures</label>
                                            <input class="form-control" type="text" id="NombreHeures" name="nombreheures" placeholder="Nombre des heures">
                                        </div>
                                        <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                            <label for="Enseignant">Enseignant</label>
                                            <select class="form-control" id="Enseignant" name="enseignant">
                                                <?php foreach (ProfesseurController::getAll() as $professeur) { ?>
                                                    <option value="<?php echo $professeur['Code'] ?>"><?php echo $professeur['Nom'] . ' ' . $professeur['Prenom']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 m-lg-5" style="width: 50%">
                                            <button class="btn btn-primary shadow d-block w-100" type="submit" name="submit">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 1000px;">
                        <?php foreach (ElementController::getByModule($_GET['dept']) as $element) { ?>
                            <div class="col mb-4 shadow card-element">
                                <?php if(PermissionController::get($_SESSION['code'])['Removeseance'] == 1){?>
                                    <button class="btn p-2 bg-danger-btn border-0 btn-supp" onclick="supprimer('element','<?php echo $element->attributes()->Code; ?>')">
                                        <img width="30" height="30" src="/ProjetXML/views/ourAssets/images/icon-delete.png">
                                    </button>
                                <?php } ?>
                                <div><a href="#"><img class="rounded img-fluid shadow w-100 fit-cover" src="/ProjetXML/views/ourAssets/images/element.jpg" style="height: 250px;"></a>
                                    <div class="py-4"><span class="badge bg-primary mb-2"><?php echo ElementController::getEnseignant($element->attributes()->Enseignant); ?></span>
                                        <h4 class="fw-bold" style="height: 60px"><?php echo $element->Element ?></h4>
                                        <a href="/ProjetXML/ElementDetails/<?php echo $element->attributes()->Code ?>" class="btn btn-primary shadow w-100">Voir les details</a>
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
    <script src="/ProjetXML/views/ourAssets/JS/Langue.js"></script>
    <script src="/ProjetXML/views/ourAssets/JS/Suppression.js"></script>
</body>

</html>