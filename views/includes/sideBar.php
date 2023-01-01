<?php
    $permission = PermissionController::get($_SESSION['code']);
?>
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="sidebar" style="background: var(--bs-black);">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-database"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Gestion <br />des absences</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link text-white" href="/ProjetXML/accueil"><i class="fas fa-home text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[0] ?></span></a></li>
            <li class="nav-item"><a class="nav-link text-white" href="/ProjetXML/profile"><i class="fas fa-user text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[1] ?></span></a></li>
            <li class="nav-item">
                <?php if($_SESSION['personneCategorie'] == 'SuperAdmin'){?>
                    <a class="nav-link text-white" href="/ProjetXML/Permission">
                        <i class="fas fa-box text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[2] ?></span>
                    </a>
                <?php } ?>
            </li>
            <li class="nav-item">
                <?php if($permission['Departement'] == 1){?>
                <a class="nav-link text-white" href="/ProjetXML/departements">
                    <i class="fas fa-list-alt text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[3] ?></span>
                </a>
                <?php } ?>
                <?php if($permission['Adddepartement'] == 1){?>
                <div class="sous-link">
                    <a class="nav-link" href="/ProjetXML/ajoutDepartement"><i class="fas fa-plus"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[4] ?></span></a>
                </div>
                <?php } ?>
            </li>
            <li class="nav-item">
                <?php if($permission['Filiere'] == 1){?>
                <a class="nav-link text-white" href="/ProjetXML/filieres">
                    <i class="fas fa-list text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[5] ?></span>
                </a>
                <?php } ?>
                <?php if($permission['Addfiliere'] == 1){?>
                <div class="sous-link">
                    <a class="nav-link" href="/ProjetXML/ajoutFiliere"><i class="fas fa-plus"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[6] ?></span></a>
                </div>
                <?php } ?>
            </li>
            <li class="nav-item">
                <?php if($permission['Agentscolarite'] == 1){?>
                <a class="nav-link text-white" href="/ProjetXML/agentScolarites">
                    <i class="fas fa-people-carry text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[7] ?></span>
                </a>
                <?php } ?>
                <?php if($permission['Addagentscolarite'] == 1){?>
                <div class="sous-link">
                    <a class="nav-link" href="/ProjetXML/ajoutAgentScolarite"><i class="fas fa-plus"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[8] ?></span></a>
                </div>
                <?php } ?>
            </li>
            <li class="nav-item">
                <?php if($permission['Professeur'] == 1){?>
                <a class="nav-link text-white" href="/ProjetXML/professeurs">
                    <i class="fas fa-chalkboard-teacher text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[9] ?></span>
                </a>
                <?php } ?>
                <?php if($permission['Addprofesseur'] == 1){?>
                <div class="sous-link">
                    <a class="nav-link" href="/ProjetXML/ajoutProfesseur">
                        <i class="fas fa-plus"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[10] ?></span>
                    </a>
                </div>
                <?php } ?>
            </li>
            <li class="nav-item">
                <?php if($permission['Etudiant'] == 1){?>
                <a class="nav-link text-white" href="/ProjetXML/etudiants">
                    <i class="fas fa-user-friends text-white"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[11] ?></span>
                </a>
                <?php } ?>
                <?php if($permission['Addetudiant'] == 1){?>
                <div class="sous-link">
                    <a class="nav-link" href="/ProjetXML/ajoutEtudiant"><i class="fas fa-plus"></i><span><?php echo LangueController::get($_COOKIE['langue'],'sidebar')[12] ?></span></a>
                </div>
                <?php } ?>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>