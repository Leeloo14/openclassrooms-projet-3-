<?php

namespace Blog\Dao;

use Blog\Model\Post;



class PostDao extends BaseDao
{

/** permet de creer un nouvel épisode */
    public function create($post)

    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO posts (`title`, `content`, `creation_date`, `modif_date`) VALUES (:title, :content, :creation_date, modif_date,)');

        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_INT);
        $req->bindValue(':creation_date', $post->getCreationDate(), PDO::PARAM_INT);
        $req->bindValue(':modif_date', $post->getModifDate(), PDO::PARAM_INT);

        $req->execute();


    }


/** renvoie un épisode suivant son id */

    public function getPostById($id)
   {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ' . $id );
       
        $req -> execute();

        $postData =  $req -> fetch();
        
        return new Post($postData);

       
   }

/** renvoie la liste de tout les épisodes */

    public function getAllPosts()

    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content,modif_date, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        $req->execute();
        $postsDB = $req->fetchAll();

        $posts = [];

        foreach ($postsDB as $postDB) {

            array_push($posts, new Post($postDB));
        }
        return $posts;
    }


        /** permet de mettre à jour un épisode */
    public function update($post)

    {

        $db = $this->dbConnect();

        $req = $db->query('UPDATE posts SET title = :title, content = :content, creation_date = :creation_date, modif_date = :modif_date WHERE id = :id');

        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_INT);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_INT);
        $req->bindValue(':creation_date', $post->getCreationDate(), PDO::PARAM_INT);
        $req->bindValue(':modif_date', $post->getModifDate(), PDO::PARAM_INT);
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);

        $req->execute();


    }

/** permet de supprimer un épisode */
    public function delete($postId)

    {

        $db = $this->dbConnect();

        $req = $db->prepare('DELETE FROM posts WHERE id = :id LIMIT 1');

        $req->bindValue(':id', $postId->getId(), PDO::PARAM_INT);

        $req->execute();

    }

}


