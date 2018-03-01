<?php
/**
 * Created by IntelliJ IDEA.
 * User: anneg
 * Date: 01/03/2018
 * Time: 09:17
 */

namespace testAnne\blog\model;


class comments
{
    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date;

    // GETTERS //

    public function getId()
    {
        return $this->_id;
    }

    public function getPostId()
    {
        return $this->_post_id;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function getComment()
    {
        return $this->_comment;
    }

    public function getCommentDate()
    {
        return $this->_comment_date;
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