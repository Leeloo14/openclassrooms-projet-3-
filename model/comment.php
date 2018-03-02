<?php
/**
 * Created by IntelliJ IDEA.
 * User: anneg
 * Date: 01/03/2018
 * Time: 09:17
 */

namespace testAnne\blog\model;


class comment
{
    private $id;
    private $post_id;
    private $author;
    private $comment;
    private $comment_date;

    // GETTERS //

    public function getId()
    {
        return $this->id;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getCommentDate()
    {
        return $this->comment_date;
    }
    // SETTERS //

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setPostId($post_id)
    {
        $this->_post_id = $post_id;
    }

    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    public function setComment($comment)
    {
        $this->_comment = $comment;
    }

    public function setCommentDate($comment_date)
    {
        $this->_comment_date = $comment_date;
    }
}

?>