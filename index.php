<?php

require_once "vendor/autoload.php";
use Blog\Controller\FrontendController;
use Blog\Controller\BackendController;

$loader = new Twig_Loader_Filesystem(__DIR__.'/src/view');
$twig = new Twig_Environment($loader, array( 'debug' => true));
$twig->addExtension(new Twig_Extension_Debug());
//$twig = new Twig_Environment($loader);
$backendController = new BackendController();
$frontendController =  new FrontendController();
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $frontendController->listPosts($twig);
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendController->post($twig);
            }
            else {
                throw new Exception('1 Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('2 Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('2 Aucun identifiant de billet envoyé');
            }
        }


        elseif ($_GET['action'] == 'signalEditComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idComment']) && $_GET['idComment'] > 0 ){
                //if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                //    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                $frontendController->spamEditComment($twig);
                //}
                //else
                //{
                //    throw new Exception('Tous les champs ne sont pas remplis !');
                //}
            }
            else {
                throw new Exception('3 Aucun identifiant de billet envoyé 2');
            }
        }
        elseif ($_GET['action'] == 'signalComment') {
            echo "spamComment";
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0 ) {
                var_dump($_POST);
                $frontendController->spamComment( $_GET['id'], $_GET['idComment'], $_POST['uComment']);
            }
            else {
                throw new Exception('4 Tous les champs ne sont pas remplis !');
            }
        }
         /********************************************************************************
         * ! ADMIN PART !
         *********************************************************************************/
        elseif ($_GET['action'] == 'displayPanelAdmin'){
            $backendController->displayAdminPanel($twig);
        }

        /********************************************************************************
         * ! END ADMIN PART !
         *********************************************************************************/
    }
    else {
        $frontendController->listPosts($twig);
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}



