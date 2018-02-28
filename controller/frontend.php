<?php

// Chargement des classes
require_once('model/PostDao.phprequire_once('model/CommentDao.php
function listPosts()
{
    $postManager = new \testAnne\blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \testAnne\blog\Model\PostManager();
    $commentManager = new \testAnne\blog\Model\CommentDao();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \testAnne\blog\Model\CommentDao();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

