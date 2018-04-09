<?php
/**
 * Created by IntelliJ IDEA.
 * User: anneg
 * Date: 01/03/2018
 * Time: 09:17
 */

namespace Blog\Model;


class Comment
{
    private $id;
    private $post_id;
    private $author;
    private $comment;
    private $comment_date;
    private $signalement;

     function __construct($commentData) {
        if (isset($commentData['id'])){
            $this->id = $commentData['id'];
        }

        if (isset($commentData['post_id'])){
            $this->post_id = $commentData['post_id'];
        }

        if (isset($commentData['author'])){
            $this->author = $commentData['author'];
        }

        if (isset($commentData['comment'])){
            $this->comment = $commentData['comment'];
        }

        if (isset($commentData['comment_date'])){

            $this->comment_date = date_create_from_format('Y-m-d H:i:s', $commentData['comment_date']);
        }

        if (isset($commentData['signalement'])){
            $this->signalement = $commentData['signalement'];
        }
    }

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

    public function getSignalement()
    {
        return $this->signalement;
    }
    // SETTERS //

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }

    public function  setSignalement ($signalement)
    {
        $this->signalement = ♥6signalement;
    }
}

?>
