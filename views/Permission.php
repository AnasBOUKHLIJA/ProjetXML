<?php
$data = null;
if ($_SESSION['personneCategorie'] == 'SuperAdmin') {
    $data = SuperAdminController::get($_SESSION['code']);
    $data['defaultImage'] = 'views/ourAssets/images/prof.png';
    $data['defaultImage-file'] = 'views/ourAssets/images/prof-file.png';
}else{
    header('location: /ProjetXML/accesRefuse');
}
if(isset($_POST['submit'])){
    PermissionController::modify($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Permission</title>
    <link rel="stylesheet" href="views/assetsAdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="views/assetsAdminPanel/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="views/ourAssets/CSS/style.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'views/includes/sideBar.php' ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include_once 'views/includes/header.php' ?>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Les utilisateurs Infos</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Cin</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (PersonneController::getAll() as $personne) { ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?php if (!empty($personne->Photo) && is_file($personne->Photo)) { ?>
                                                        <img class="rounded-circle me-2" width="30" height="30" src="<?php echo $personne->Photo; ?>">
                                                    <?php } elseif ($personne->attributes()->Sexe == 'M') { ?>
                                                        <img class="rounded-circle me-2" width="30" height="30" src="views/ourAssets/images/prof.png">
                                                    <?php } else { ?>
                                                        <img class="rounded-circle me-2" width="30" height="30" src="views/ourAssets/images/prof-file.png">
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center align-middle"><?php echo $personne->Nom ?></td>
                                                <td class="text-center align-middle"><?php echo $personne->Prenom ?></td>
                                                <td class="text-center align-middle"><?php echo $personne->Cin ?></td>
                                                <td class="text-center align-middle"><?php echo $personne->Email ?></td>
                                                <td class="text-center align-middle"><?php echo $personne->Telephone ?></td>
                                                <td class="text-center align-middle"><button class="rounded-circle me-2 border-0 btn-absence"><img src="/ProjetXML/views/ourAssets/images/permission-icon.png"></button></td>
                                            </tr>
                                            <div class="popup-modal-1">
                                                <div class="popup-window-1 bg-white shadow w-75 rounded-1 overflow-hidden">
                                                    <h5 class="d-flex align-content-center justify-content-between bg-dark text-white p-3">
                                                        <div>
                                                            Les Permissions
                                                        </div>
                                                        <div>
                                                            <?php echo $personne->Nom . ' ' . $personne->Prenom . ' ' . $personne->Cin ?>
                                                        </div>
                                                    </h5>
                                                    <?php
                                                    $permission = PermissionController::get($personne->attributes()->Code);
                                                    ?>
                                                    <form method="POST" action="" >
                                                        <div class="container overflow-scroll" style="text-align: center">
                                                            <input name="personne" value="<?php echo $personne->attributes()->Code ?>" hidden>
                                                            <label  style="width: 20%;text-align: left" >Supperadmin <input type="checkbox"  name="Supperadmin" <?php if ($permission['Supperadmin'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addsupperadmin <input type="checkbox"  name="Addsupperadmin" <?php if ($permission['Addsupperadmin'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removesuperadmin <input type="checkbox"  name="Removesuperadmin" <?php if ($permission['Removesuperadmin'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editsuperadmin <input type="checkbox"  name="Editsuperadmin" <?php if ($permission['Editsuperadmin'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Professeur <input type="checkbox"  name="Professeur" <?php if ($permission['Professeur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addprofesseur <input type="checkbox"  name="Addprofesseur" <?php if ($permission['Addprofesseur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removeprofesseur <input type="checkbox"  name="Removeprofesseur" <?php if ($permission['Removeprofesseur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editprofesseur <input type="checkbox"  name="Editprofesseur" <?php if ($permission['Editprofesseur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Agentscolarite <input type="checkbox"  name="Agentscolarite" <?php if ($permission['Agentscolarite'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addagentscolarite <input type="checkbox"  name="Addagentscolarite" <?php if ($permission['Addagentscolarite'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removeagentscolarite <input type="checkbox"  name="Removeagentscolarite" <?php if ($permission['Removeagentscolarite'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editagentscolarite <input type="checkbox"  name="Editagentscolarite" <?php if ($permission['Editagentscolarite'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Directeur <input type="checkbox"  name="Directeur" <?php if ($permission['Directeur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Adddirecteur <input type="checkbox"  name="Adddirecteur" <?php if ($permission['Adddirecteur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removedirecteur <input type="checkbox"  name="Removedirecteur" <?php if ($permission['Removedirecteur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editdirecteur <input type="checkbox"  name="Editdirecteur" <?php if ($permission['Editdirecteur'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Etudiant <input type="checkbox"  name="Etudiant" <?php if ($permission['Etudiant'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addetudiant <input type="checkbox"  name="Addetudiant" <?php if ($permission['Addetudiant'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removeetudiant <input type="checkbox"  name="Removeetudiant" <?php if ($permission['Removeetudiant'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editetudiant <input type="checkbox"  name="Editetudiant" <?php if ($permission['Editetudiant'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Abscence <input type="checkbox"  name="Abscence" <?php if ($permission['Abscence'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addabscence <input type="checkbox"  name="Addabscence" <?php if ($permission['Addabscence'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removeabscence <input type="checkbox"  name="Removeabscence" <?php if ($permission['Removeabscence'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editabscence <input type="checkbox"  name="Editabscence" <?php if ($permission['Editabscence'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Departement <input type="checkbox"  name="Departement" <?php if ($permission['Departement'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Adddepartement <input type="checkbox"  name="Adddepartement" <?php if ($permission['Adddepartement'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removedepartement <input type="checkbox"  name="Removedepartement" <?php if ($permission['Removedepartement'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editdepartement <input type="checkbox"  name="Editdepartement" <?php if ($permission['Editdepartement'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Filiere <input type="checkbox"  name="Filiere" <?php if ($permission['Filiere'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addfiliere <input type="checkbox"  name="Addfiliere" <?php if ($permission['Addfiliere'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removefiliere <input type="checkbox"  name="Removefiliere" <?php if ($permission['Removefiliere'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editfiliere <input type="checkbox"  name="Editfiliere" <?php if ($permission['Editfiliere'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Module <input type="checkbox"  name="Module" <?php if ($permission['Module'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addmodule <input type="checkbox"  name="Addmodule" <?php if ($permission['Addmodule'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removemodule <input type="checkbox"  name="Removemodule" <?php if ($permission['Removemodule'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editmodule <input type="checkbox"  name="Editmodule" <?php if ($permission['Editmodule'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Element <input type="checkbox"  name="Element" <?php if ($permission['Element'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addelement <input type="checkbox"  name="Addelement" <?php if ($permission['Addelement'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removeelement <input type="checkbox"  name="Removeelement" <?php if ($permission['Removeelement'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editelement <input type="checkbox"  name="Editelement" <?php if ($permission['Editelement'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Seance <input type="checkbox"  name="Seance" <?php if ($permission['Seance'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Addseance <input type="checkbox"  name="Addseance" <?php if ($permission['Addseance'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Removeseance <input type="checkbox"  name="Removeseance" <?php if ($permission['Removeseance'] == 1) echo "checked" ?>></label>
                                                            <label  style="width: 20%;text-align: left" >Editseance <input type="checkbox"  name="Editseance" <?php if ($permission['Editseance'] == 1) echo "checked" ?>></label>
                                                        </div>
                                                        <button class="btn btn-primary bg-primary w-50 " style="margin: 25px 25%;" type="submit" name="submit">Enregistrer</button>
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
        <script src="views/assetsAdminPanel/bootstrap/js/bootstrap.min.js"></script>
        <script src="views/assetsAdminPanel/js/theme.js"></script>
        <script src="/ProjetXML/views/OurAssets/js/popupWindow.js"></script>
        <script src="/ProjetXML/views/ourAssets/JS/Langue.js"></script>
</body>

</html>