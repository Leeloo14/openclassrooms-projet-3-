<?php

namespace Blog\Controller;

use Blog\dao\PostDao;
use Blog\dao\CommentDao;


class FrontendController
{
    private $commentDao;
    private $postDao;

    function __construct()
    {
        $this->commentDao = new CommentDao();
        $this->postDao = new PostDao();
    }

    /** renvoie la liste de tout les episodes */
    function listPosts($template)
    {
        $posts = $this->postDao->getAllPosts();

        echo $template->render('list-posts-view.html.twig', array('posts' => $posts));
    }

    function post($template)
    {
        $post = $this->postDao->getPostById($_GET['id']);
        $comments = $this->commentDao->getPostComments($_GET['id']);

        echo $template->render('post-view.html.twig', array('comments' => $comments, 'post' => $post));
    }


    function addComment($postId, $author, $comment)
    {
        $affectedLines = $this->commentDao->createComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }


    function spamEditComment($template)
    {
        $post = $this->postDao->getPostById($_GET['id']);

        $comments = $this->commentDao->getPostComments($_GET['id']);


        echo $template->render('signal-post-view.html.twig', array('comments' => $comments, 'post' => $post, 'currentCommentId' => $_GET['idComment']));
    }


    function spamComment($postId, $IdComment, $upComment)
    {
        $affectedLines = $this->commentDao->signalComment($IdComment, $upComment);

        if ($affectedLines === false) {
            throw new Exception('Impossible de signaler le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }


}
