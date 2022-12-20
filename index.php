<?php
session_start();
require_once 'autoload.php';

$home = new HomeController();

$pages = array('connexion','accueil');

if(!$_SESSION){
    if (isset($_GET['page']) && $_GET['page'] != 'connexion') {
        if (in_array($_GET['page'], $pages)) {
            header('location: /ProjetXML/connexion');
        } else {
            $home->index('404');
        }
    }else{
        $home->index('connexion');
    }
}else{
    if (isset($_GET['page'])) {
        if (in_array($_GET['page'], $pages)) {
            $home->index($_GET['page']);
        } else {
            $home->index('404');
        }
    } else {
        $home->index('accueil');
    }
}

