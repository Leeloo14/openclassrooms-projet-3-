<?php

require_once "vendor/autoload.php";

use Blog\Controller\FrontendController;
use Blog\Controller\BackendController;

$loader = new Twig_Loader_Filesystem(__DIR__ . '/src/view');
$twig = new Twig_Environment($loader, array('debug' => true));
$twig->addExtension(new Twig_Extension_Debug());
$backendController = new BackendController();
$frontendController = new FrontendController();

try {

    if(!isset($_GET["action"])){
        $frontendController->listPosts($twig);
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'listPosts') {
        $frontendController->listPosts($twig);
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $frontendController->post($twig);
        } else {
            throw new Exception('1 Aucun identifiant de billet envoyé');
        }
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            } else {
                throw new Exception('2 Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new Exception('2 Aucun identifiant de billet envoyé');
        }
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'signalEditComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idComment']) && $_GET['idComment'] > 0) {
            $frontendController->spamEditComment($twig);
        } else {
            throw new Exception('3 Aucun identifiant de billet envoyé 2');
        }
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'signalComment') {
        echo "spamComment";
        if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
            $frontendController->spamComment($_GET['id'], $_GET['idComment'], $_POST['uComment']);
        } else {
            throw new Exception('4 Tous les champs ne sont pas remplis !');
        }
    } /********************************************************************************
     * ! ADMIN PART !
     *********************************************************************************/
    if (isset($_GET["action"]) && $_GET['action'] == 'displayConnection') {
        $backendController->displayAdminConnection($twig);
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'displayPanelAdmin') {
        $backendController->displayAdminPanel($twig);
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'displayCommentAdmin') {
        $backendController->displayCommentAdmin($twig);
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'displayPostAdmin') {
        $backendController->displayPostAdmin($twig);
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'displayNewPostAdmin') {
        $backendController->displayNewPostAdmin($twig);
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'deleteById') {
        if (isset($_GET['idComment']) AND !empty($_GET['idComment'])) {
            $backendController->deleteComment($_GET['idComment'], $twig);
        } else {
            throw new Exception('5 la requête a échouée');
        }
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'deletePost') {
        if (isset($_GET['idPost']) AND !empty($_GET['idPost'])) {
            $backendController->deleteAdminPost($_GET['idPost'], $twig);
        } else {
            throw new Exception('6 la requête a échouée');
        }
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'editPost') {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $backendController->editPost($_GET['id'], $twig);
        } else {
            throw new Exception('impossible d afficher l episode');
        }
    }
    if (isset($_POST["action"]) && $_POST['action'] == "replacePost") {
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            if (!empty($_POST['title']) && !empty($_POST['id'])) {
                $backendController->replacePost($_POST['id'], $_POST['content'], $_POST['title'], $twig);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new Exception('impossible de modifier l episode');
        }
    }
    if (isset($_POST['action']) && $_POST['action'] == 'createPost') {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $backendController->addPost($_POST['title'], $_POST['content'], $twig);
        } else {
            throw new Exception('2 Tous les champs ne sont pas remplis !');
        }
    }

    /**connection*/
    if (isset($_POST['formconnect'])) {
        $mailconnect = $_POST['mailconnect'];
        $mdpconnect = sha1($_POST['mdpconnect']);
        if (!empty($mailconnect) AND !empty($mdpconnect)) {
            $backendController->reqUser($_POST['mailconnect'], sha1($_POST['mdpconnect']));
        } else {
            throw new Exception("Tous les champs doivent être complétés!");
        }
        if (isset($_SESSION['pseudo'])) {
            $backendController->displayAdminPanel($twig);
        }
    }
    if (isset($_GET["action"]) && $_GET['action'] == 'disconnect') {
        $backendController->disconnect();
    }
    /********************************************************************************
     * ! END ADMIN PART !
     *********************************************************************************/
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
