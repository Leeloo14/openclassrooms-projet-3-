<?php

namespace testAnne\blog\dao;

use testAnne\blog\model\comment;

class CommentDao extends BaseDao
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ? ORDER BY comment_date DESC');
        $comment->execute(array($commentId));

        return $comment;
    }

    public function updateComment($commentId, $commentUpdated)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $affectedLine = $comment->execute(array($commentUpdated, $commentId));

        return $affectedLine;
    }
}