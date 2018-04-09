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

    function deleteComment($id)
    {

        $this->commentDao->deleteById($id);

    }


    function displayAdminPanel($template)
    {
        echo $template->render('admin-view.html.twig');
    }
}




