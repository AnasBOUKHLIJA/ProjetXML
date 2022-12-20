<?php
require_once 'autoload.php';


$pages = array('accueil', 'ajouter', 'modifier', 'supprimer');
$anasBk="brahim852";
if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $pages)) {
        $home->index($_GET['page']);
    } else {
        $home->index($_GET['404']);
    }
} else {
    $home->index('accueil');
}
