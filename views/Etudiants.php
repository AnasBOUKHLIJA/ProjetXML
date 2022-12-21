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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>
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
</body>

</html>