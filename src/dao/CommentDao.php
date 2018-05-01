<?php

namespace Blog\Dao;

use Blog\Model\Comment;

class CommentDao extends BaseDao
{
    /**permet de créer un commentaire */
    public function createComment($id, $author, $comment)

    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($id, $author, $comment));
        return $affectedLines;
    }

    /** revoie les commentaires liés au post suivant son id */
    public function getPostComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare("SELECT id, author, comment, comment_date FROM comments WHERE post_id =" . $this->Q($postId) . "  ORDER BY comment_date DESC");
        $comments->execute();
        $commentsDB = $comments->fetchAll();
        $comments = [];
        foreach ($commentsDB as $commentDB) {
            array_push($comments, new Comment($commentDB));
        }
        return $comments;
    }

    /** permet de récuperer 1 commentaire */
    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE id = ' . $id);
        $req->execute();
        $commentData = $req->fetch();
        return new Comment($commentData);
    }

    /** permet de supprimer un commentaire */
    public function deleteById($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($id));
    }

    /** permet de signaler un commentaire */
    public function signalComment($IdComment, $upComment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET signalement= ? WHERE id = ? ');
        $affectedLines = $comments->execute(array($upComment, $IdComment));
        return $affectedLines;
    }

    /** permet de récupérer les commentaire signalés */
    public function getSignalComments()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE signalement !=""');
        $req->execute();
        $commentsDB = $req->fetchAll();
        $comments = [];
        foreach ($commentsDB as $commentDB) {
            array_push($comments, new Comment($commentDB));
        }
        return $comments;
    }
}





