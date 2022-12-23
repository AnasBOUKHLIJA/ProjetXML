<?php
$element = Element::get($_GET['dept']);

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
if (isset($_POST['submit'])) {
    AbsenceController::add($_POST);
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
                    <div class="d-sm-flex justify-content-center align-items-center mb-4">
                        <h1 class="text-dark mb-0 align-content-center ">Element : <?php echo $element->Element ?></h1>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-xl-4 w-100 mb-5">
                            <div class="card shadow">
                                <div class="card-body text-center d-flex flex-column align-items-center">
                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                        </svg>
                                    </div>
                                    <h1 class="text-dark mb-0 align-content-center ">Ajouter une Seance</h1>
                                    <form method="post" enctype="multipart/form-data" action="" class="w-100 d-flex flex-row flex-wrap justify-content-evenly">
                                        <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                            <label for="Jour">Jour</label>
                                            <select class="form-control" id="Jour" name="jour">
                                                <option value="Lundi">Lundi</option>
                                                <option value="Mardi">Mardi</option>
                                                <option value="Mercredi">Mercredi</option>
                                                <option value="Jeudi">Jeudi</option>
                                                <option value="Vendredi">Vendredi</option>
                                                <option value="Samedi">Samedi</option>
                                                <!-- <option value="Dimanche">Dimanche</option> -->
                                            </select>
                                        </div>
                                        <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                            <label for="Salle">Salle</label>
                                            <select class="form-control" id="Salle" name="salle">
                                                <?php foreach (SalleController::getAll() as $sale) { ?>
                                                    <option value="<?php echo $sale['Code'] ?>"><?php echo $sale->Numero; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                            <label for="datedebut">date debut</label>
                                            <input class="form-control" type="time" id="datedebut" name="datedebut" placeholder="date debut">
                                        </div>
                                        <div class="m-2 d-flex flex-wrap justify-content-start" style="width: 46%">
                                            <label for="datefin">date fin</label>
                                            <input class="form-control" type="time" id="datefin" name="datefin" placeholder="date fin">
                                        </div>
                                        <div class="mb-3 m-lg-5" style="width: 50%">
                                            <button class="btn btn-primary shadow d-block w-100" type="submit" name="submit">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow m-5">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Jour</th>
                                        <th class="text-center align-middle">DateDebut</th>
                                        <th class="text-center align-middle">DateFin</th>
                                        <th class="text-center align-middle">Salle</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (SeanceController::getAll($_GET['dept']) as $seance) { ?>
                                        <tr>
                                            <td class="text-center align-middle" style="width: 20%"><?php echo $seance->Jour ?></td>
                                            <td class="text-center align-middle" style="width: 20%"><?php echo $seance->DateDebut ?></td>
                                            <td class="text-center align-middle" style="width: 20%"><?php echo $seance->DateFin ?></td>
                                            <td class="text-center align-middle" style="width: 20%"><?php echo SalleController::get($seance->attributes()->Salle)->Numero ?></td>
                                            <td class="text-center align-middle" style="width: 20%"><button class="btn btn-primary btn-absence" style="font-size: 15px">Noter l'absences</button></td>
                                        </tr>
                                        <div class="popup-modal-1">
                                            <div class="popup-window-1 bg-white shadow w-75 rounded-1 overflow-hidden">
                                                <h5 class="d-flex align-content-center justify-content-between bg-dark text-white p-3">
                                                    <div>
                                                        <?php echo FiliereController::get(
                                                            ModuleController::get(
                                                                ElementController::get(
                                                                    $_GET['dept']
                                                                )->attributes()->Module
                                                            )->attributes()->Filiere
                                                        )->Intitule ?>
                                                    </div>
                                                    <div>
                                                        <?php echo $seance->Jour.' '.$seance->DateDebut.' '.$seance->DateFin ?>
                                                    </div>
                                                </h5>
                                                <form method="POST" action="">
                                                <?php foreach (EtudiantController::getByFiliere(
                                                    ModuleController::get(
                                                        ElementController::get(
                                                            $_GET['dept']
                                                        )->attributes()->Module
                                                    )->attributes()->Filiere
                                                ) as $etudiant){ ?>

                                                    <div class="d-flex align-content-center justify-content-around">
                                                        <?php if(!empty($etudiant['Photo']) && is_file($etudiant['Photo'])){ ?>
                                                            <img class="rounded-circle me-2" width="30" height="30" src="<?php echo "/ProjetXML/".$etudiant['Photo'];?>">
                                                        <?php }elseif($etudiant['Sexe'] == 'M'){ ?>
                                                            <img class="rounded-circle me-2" width="30" height="30" src="/ProjetXML/views/ourAssets/images/etudiant.png">
                                                        <?php }else{ ?>
                                                            <img class="rounded-circle me-2" width="30" height="30" src="/ProjetXML/views/ourAssets/images/etudiant-file.png">
                                                        <?php }?>
                                                        <span style="width: 20%"><?php echo $etudiant['Cne'] ?></span>
                                                        <span style="width: 20%"><?php echo $etudiant['Nom'] ?></span>
                                                        <span style="width: 20%;"><?php echo $etudiant['Prenom'] ?></span>
                                                        <input style="width: 20px" name="check_list[]" type="checkbox" value="<?php echo $etudiant['Code']?>" <?php if(AbsenceController::get($etudiant['Code'],$seance->attributes()->Code)){ echo "checked";} ?>>
                                                        <input name="seance" value="<?php echo $seance->attributes()->Code ?>" hidden>
                                                    </div>

                                                <?php } ?>
                                                    <button class="btn btn-primary btn-danger bg-danger w-50 " style="margin: 25px 25%;" type="submit" name="submit">Enregistrer</button>
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
    <script src="/ProjetXML/views/OurAssets/js/popupWindow.js"></script>
</body>

</html>