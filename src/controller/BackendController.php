<?php

namespace Blog\Controller;

use Blog\dao\CommentDao;
use Blog\dao\PostDao;

class BackendController
{

    private $commentDao;
    private $postDao;


    function __construct()
    {
        $this->commentDao = new CommentDao();
        $this->postDao = new PostDao();

    }

    /** permet de supprimer un épisode */
    function deleteAdminPost($id, $template)
    {
        $postDao = new PostDao();
        $postDao->deletePost($id);
        $posts = $postDao->getAllPosts();
        echo $template->render('admin-post-view.html.twig', array('posts' => $posts));

    }

    /** permet de créer un nouvel épisode */
    function addPost($title, $content, $template)
    {
        var_dump($title);
        $affectedLines = $this->postDao->createPost($title, $content);
        $posts = $this->postDao->getAllPosts();

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter l\'episode !');
        }
        echo $template->render('admin-post-view.html.twig', array('posts' => $posts));
    }

    /** permet de modifier un épisode existant */
    function editPost($postId, $template)
    {
        $postDao = new PostDao();

        $post = $postDao->getPost($postId);

        echo $template->render('admin-modify-post.html.twig', array('post' => $post));
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
            echo $template->render('admin-post-view.html.twig', array('posts' => $posts));
        }
    }

    /** permet de supprimer un commentaire */
    function deleteComment($id, $template)
    {
        $commentDao = new CommentDao();
        $commentDao->deleteById($id);
        $comments = $commentDao->getSignalComments();
        echo $template->render('admin-comment-view.html.twig', array('comments' => $comments));
    }

    /** permet d'afficjer la page principale de l'interface d'administration */
    function displayAdminPanel($template)
    {
        echo $template->render('admin-view.html.twig');
    }

    /** permet d'afficher la page d'administration des commentaires */
    function displayCommentAdmin($template)
    {
        $commentDao = new CommentDao();
        $comments = $commentDao->getSignalComments();

        echo $template->render('admin-comment-view.html.twig', array('comments' => $comments));
    }

    /** permet d'&fficher la page d'administration des épisodes */
    function displayPostAdmin($template)
    {
        $posts = $this->postDao->getAllPosts();
        echo $template->render('admin-post-view.html.twig', array('posts' => $posts));
    }

    /** permet d'afficher la page d'administration qui permet de créer un nouvel épisode */
    function displayNewPostAdmin($template)
    {
        echo $template->render('admin-new-post-view.html.twig');
    }


}





