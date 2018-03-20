<?php

namespace Blog\Dao;

use Blog\Model\Comment;

class CommentDao extends BaseDao
{
   
/**permet de creer un commentaire */
    public function createComment ($postId, $author, $comment)

    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;

        


    }


/** renvoie l'integralité des commentaires */



    public function getAllComments($postId)

    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY creation_date DESC LIMIT 0, 5'. $postId);
        $req->execute();
        $commentsDB = $req->fetchAll();
       
        $comments = [];

        foreach ($commentsDB as $commentDB) {

           
            array_push($comments, new Comment($commentData));
        }
        return $comments;
    }

  


    
 /** revoie un commentaire */

    public function getComment()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ? ORDER BY comment_date DESC' );
        $req->execute();

        $commentData = $req ->fetch();

        return new Comment($commentData);
    }

 
       
   
/** permet de mettre à jour un commentaire */
    public function update ($comment)

    {

        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comments SET post_id = :post_id, author = :author, comment = :comment, comment_date = :comment_date WHERE id = :id');

        $req->bindValue(':post_id', $comment->getPostId(), PDO::PARAM_INT);
        $req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_INT);
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_INT);
        $req->bindValue(':comment_date', $comment->getCommentDate(), PDO::PARAM_INT);
        $req->bindValue(':id', $comment->getId(), PDO::PARAM_INT);

        $req->execute();

    }



/** permet de supprimer un commentaire */
     public function delete($comment)

    {

          $db = $this->dbConnect();
        
        $req = $db->prepare('DELETE FROM comments WHERE id = :id LIMIT 1');

        $req->bindValue(':id', $comment->getId(), PDO::PARAM_INT);

        $req->execute();


    }
}


