<?php

use \Blog\Dao\PostDao;
use \Blog\Dao\CommentDao;

/** renvoie la liste de tout les episodes */
function listPosts()
{
    $postDao = new PostDao(); //You don't need to use the whole namespace
    $posts = $postDao->getAllPosts();



    require('src/view/frontend/listPostsView.php');
}


function post()
{
    $PostDao = new PostDao();
    $CommentDao = new CommentDao();

    $post = $PostDao->getPostById($_GET['id']);
    $comments = $CommentDao->getPostComments($_GET['id']);

    require('src/view/frontend/postView.php');
}


function addComment($postId, $author, $comment)
{
    $commentDao = new CommentDao();

    $affectedLines = $commentDao->createComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}


