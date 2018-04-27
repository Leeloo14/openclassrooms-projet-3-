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

    /** renvoi la liste de tout les episodes */
    function listPosts($template)
    {
        $posts = $this->postDao->getAllPosts();

        echo $template->render('list-posts-view.html.twig', array('posts' => $posts));
    }

    /** renvoi un épisode */
    function post($template)
    {
        $posts = $this->postDao->getAllPosts();
        $post = $this->postDao->getPostById($_GET['id']);
        $comments = $this->commentDao->getPostComments($_GET['id']);

        echo $template->render('post-view.html.twig', array('comments' => $comments, 'post' => $post, 'posts' => $posts));
    }

    /** permet d'ajouter un nouveau commentaire */
    function addComment($postId, $author, $comment)
    {
        $affectedLines = $this->commentDao->createComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    /** permet d'éditer un motif de signalement pour signaler un commentaire */
    function spamEditComment($template)
    {
        $post = $this->postDao->getPostById($_GET['id']);
        $comments = $this->commentDao->getPostComments($_GET['id']);


        echo $template->render('signal-post-view.html.twig', array('comments' => $comments, 'post' => $post,
            'currentCommentId' => $_GET['idComment']));
    }

    /** permet d'envoyer le motif de signalement */
    function spamComment($postId, $IdComment, $upComment)
    {
        $affectedLines = $this->commentDao->signalComment($IdComment, $upComment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible de signaler le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }


}
