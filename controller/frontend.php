<?php

// Chargement des classes
require_once('dao/PostDao.php');
require_once('dao/CommentDao.php');

function listPosts()
{
    $PostDao = new \testAnne\blog\dao\PostsDao();
    $posts = $PostDao->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $PostDao = new testAnne\blog\dao\PostsDao();
    $CommentDao = new testAnne\blog\dao\CommentDao();

    $post = $PostDao->getPost($_GET['id']);
    $comments = $CommentDao->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentDao = new \testAnne\Blog\dao\CommentDao();

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
    $commentDao = new \testAnne\blog\dao\CommentDao();

    $comment = $commentDao->getComment($commentId);

    require('view/frontend/commentView.php');    
}

function replaceComment($commentId, $comment, $postId)
{
    $commentDao = new \testAnne\blog\dao\CommentDao();

    $affectedLines = $commentDao->updateComment($commentId, $comment);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);    
    }
}