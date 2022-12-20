<?php
session_start();
require_once 'autoload.php';

$home = new HomeController();

$pages = array('connexion','accueil');

if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $pages)) {
        $home->index($_GET['page']);
    } else {
        $home->index('404');
    }
} else {
    $home->index('accueil');
}
