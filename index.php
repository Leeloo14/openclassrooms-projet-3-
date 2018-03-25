<?php

require_once "vendor/autoload.php";
require('src/controller/frontend.php');


$loader = new Twig_Loader_Filesystem(__DIR__.'/src/view');
$twig = new Twig_Environment($loader);

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts($twig);
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post($twig);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        listPosts($twig);
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


