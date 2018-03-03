<?php

use \Blog\Dao\PostDao;
use \Blog\Dao\CommentDao;

function listPosts()
{
    $PostDao = new PostDao(); //You don't need to use the whole namespace
    $posts = $PostDao->getPosts();

    require('src/view/frontend/listPostsView.php');
}

function post()
{
    $PostDao = new PostDao();
    $CommentDao = new CommentDao();

    $post = $PostDao->getPost($_GET['id']);
    $comments = $CommentDao->getComments($_GET['id']);

    require('src/view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentDao = new CommentDao();

    $affectedLines = $commentDao->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function editComment($commentId)
{
    $commentDao = new CommentDao();

    $comment = $commentDao->getComment($commentId);

    require('src/view/frontend/commentView.php');
}

function replaceComment($commentId, $comment, $postId)
{
    $commentDao = new CommentDao();

    $affectedLines = $commentDao->updateComment($commentId, $comment);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
