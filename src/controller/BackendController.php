<?php

namespace Blog\Controller;

use Blog\dao\CommentDao;
use Blog\Dao\MemberDao;
use Blog\dao\PostDao;
use Blog\Services\SessionService;

class BackendController
{

    private $commentDao;
    private $postDao;
    private $memberDao;
    private $sessionService;


    function __construct()
    {
        $this->commentDao = new CommentDao();
        $this->postDao = new PostDao();
        $this->memberDao = new MemberDao();
        $this->sessionService = new SessionService();

    }

    /** permet de supprimer un épisode */
    function deleteAdminPost($id, $template)
    {
        $postDao = new PostDao();
        $postDao->deletePost($id);
        $posts = $postDao->getAllPosts();
        echo $template->render('backend/admin-post-view.html.twig', array('posts' => $posts));

    }

    /** permet de créer un nouvel épisode */
    function addPost($title, $content, $template)
    {
        $affectedLines = $this->postDao->createPost($title, $content);
        $posts = $this->postDao->getAllPosts();
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter l\'episode !');
        }
        echo $template->render('backend/admin-post-view.html.twig', array('posts' => $posts));
    }

    /** permet de modifier un épisode existant */
    function editPost($postId, $template)
    {
        $postDao = new PostDao();
        $post = $postDao->getPost($postId);
        echo $template->render('backend/admin-modify-post.html.twig', array('post' => $post));
    }

    /** permet valider les modifications d'un épisode existant */
    function replacePost($id, $content, $title, $template)
    {
        $postDao = new PostDao();
        $affectedLines = $this->postDao->updatePost($id, $content, $title);
        $posts = $postDao->getAllPosts();
        if ($affectedLines === false) {
            throw new \Exception('Impossible de modifier le post!');
        } else {
            echo $template->render('backend/admin-post-view.html.twig', array('posts' => $posts));
        }
    }

    /** permet de supprimer un commentaire */
    function deleteComment($id, $template)
    {
        $commentDao = new CommentDao();
        $commentDao->deleteById($id);
        $comments = $commentDao->getSignalComments();
        echo $template->render('backend/admin-comment-view.html.twig', array('comments' => $comments));
    }

   /** permet de se connecter */
    function reqUser($mailconnect, $mdpconnect)
    {
        $userData = $this->memberDao->getUser($mailconnect, $mdpconnect);
        if ($mdpconnect == $userData['pass'] && $mailconnect == $userData['email']) {
            $this->sessionService->storeCookie();
            header('location: index.php?action=displayPanelAdmin');
        } else {
            unset($_SESSION);
            throw new \Exception('mauvais email et/ou mot de passe!');
        }
    }

    /** permet d'afficher la page de connection */
    function displayAdminConnection($template)
    {
        echo $template->render('backend/connection.html.twig');
    }

    /** permet d'afficher la page principale de l'interface d'administration */
    function displayAdminPanel($template)
    {
        if ($this->sessionService->isClientAuthorized(intval($_COOKIE['blog_p4']))) {
            echo $template->render('backend/admin-view.html.twig');
        } else {
            header('location: index.php?action=displayConnection');
        }
    }

    /** permet d'afficher la page d'administration des commentaires */
    function displayCommentAdmin($template)
    {
        if ($this->sessionService->isClientAuthorized(intval($_COOKIE['blog_p4']))) {
        $commentDao = new CommentDao();
        $comments = $commentDao->getSignalComments();
            echo $template->render('backend/admin-comment-view.html.twig', array('comments' => $comments));
        }
    }

    /** permet d'afficher la page d'administration des épisodes */
    function displayPostAdmin($template)
    {
        if ($this->sessionService->isClientAuthorized(intval($_COOKIE['blog_p4']))) {
            $posts = $this->postDao->getAllPosts();
            echo $template->render('backend/admin-post-view.html.twig', array('posts' => $posts));
        }
    }

    /** permet d'afficher la page d'administration qui permet de créer un nouvel épisode */
    function displayNewPostAdmin($template)
    {
        if ($this->sessionService->isClientAuthorized(intval($_COOKIE['blog_p4']))) {
            echo $template->render('backend/admin-new-post-view.html.twig');
        }
    }
}
