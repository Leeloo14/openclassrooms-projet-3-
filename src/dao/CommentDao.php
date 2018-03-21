<?php

namespace Blog\Dao;

use Blog\Model\Comment;

class CommentDao extends BaseDao
{
   
/**permet de creer un commentaire */
    public function createComment ($id, $author, $comment)

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
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = '.$postId .' ORDER BY comment_date DESC' );
        
        $comments->execute();
        
        $commentsDB = $comments->fetchAll();
        
        $comments = [];

        foreach ($commentsDB as $commentDB) {

            array_push($comments, new Comment($commentDB));
        }
        return  $comments ;

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


