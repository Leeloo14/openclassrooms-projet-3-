<?php

require_once "vendor/autoload.php";

use Blog\Controller\FrontendController;
use Blog\Controller\BackendController;

$loader = new Twig_Loader_Filesystem(__DIR__ . '/src/view');
$twig = new Twig_Environment($loader, array('debug' => true));
$twig->addExtension(new Twig_Extension_Debug());
//$twig = new Twig_Environment($loader);
$backendController = new BackendController();
$frontendController = new FrontendController();
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $frontendController->listPosts($twig);

        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendController->post($twig);
            } else {
                throw new Exception('1 Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('2 Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('2 Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'signalEditComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                //if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                //    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                $frontendController->spamEditComment($twig);
                //}
                //else
                //{
                //    throw new Exception('Tous les champs ne sont pas remplis !');
                //}
            } else {
                throw new Exception('3 Aucun identifiant de billet envoyé 2');
            }

        } elseif ($_GET['action'] == 'signalComment') {
            echo "spamComment";
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {

                $frontendController->spamComment($_GET['id'], $_GET['idComment'], $_POST['uComment']);
            } else {
                throw new Exception('4 Tous les champs ne sont pas remplis !');
            }

        }
        /********************************************************************************
         * ! ADMIN PART !
         *********************************************************************************/

        elseif ($_GET['action'] == 'displayPanelAdmin') {
            $backendController->displayAdminPanel($twig);

        } elseif ($_GET['action'] == 'displayCommentAdmin') {
            $backendController->displayCommentAdmin($twig);


        } elseif ($_GET['action'] == 'displayPostAdmin') {
            $backendController->displayPostAdmin($twig);


        } elseif ($_GET['action'] == 'displayNewPostAdmin') {
            $backendController->displayNewPostAdmin($twig);


        }elseif ($_GET['action'] == 'deleteById') {
            if (isset($_GET['idComment']) AND !empty($_GET['idComment'])) {
                $backendController->deleteComment($_GET['idComment'],$twig);
            }
            else{
                throw new Exception('5 la requête a échouée');
            }


        }elseif ($_GET['action'] == 'deletePost') {
            if (isset($_GET['idPost']) AND !empty($_GET['idPost'])) {
                $backendController->deleteAdminPost($_GET['idPost'],$twig);
            }
            else{
                throw new Exception('6 la requête a échouée');
            }

        }elseif ($_GET['action'] == 'editPost') {
            if (isset($_GET['id']) && ($_GET['id'] >0)){
                $backendController->editPost($_GET['id'],$twig);
            }
            else {
                throw new Exception('impossible d afficher l episode');
            }

        }elseif ($_GET['action'] == 'replacePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_GET['title']) && !empty($_GET['id'])) {
                    $backendController->replacePost($_GET['id'], $_GET['content'], $_GET['title'], $twig);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('impossible de modifier l episode');
            }

        } elseif ($_GET['action'] == 'createPost') {
                if (!empty($_GET['title']) && !empty($_GET['content'])) {
                    $backendController->addPost($_GET['title'], $_GET['content'], $twig);
                } else {
                    throw new Exception('2 Tous les champs ne sont pas remplis !');
                }
        }
        /********************************************************************************
         * ! END ADMIN PART !
         *********************************************************************************/

    } else {
        $frontendController->listPosts($twig);
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}



