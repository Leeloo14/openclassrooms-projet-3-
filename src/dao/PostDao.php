<?php

namespace Blog\Dao;

use Blog\Model\Post;

class PostDao extends BaseDao
{
    /** permet de créer un nouvel épisode */
    public function createPost($title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $posts->execute(array($title, $content));
        return $affectedLines;
    }

    /** renvoie un épisode suivant son id */
    public function getPostById($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, creation_date FROM posts WHERE id = ' . $id);
        $req->execute();
        $postData = $req->fetch();
        return new Post($postData);
    }

    /** permet de récuperer un épisode */
    public function  getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, creation_date FROM posts WHERE id =' . $postId);
        $req->execute();
        $postData = $req->fetch();
        return new Post($postData);
    }

    /** renvoie la liste de tout les épisodes */
    public function getAllPosts()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM posts ORDER BY creation_date LIMIT 0, 5');
        $req->execute();
        $postsDB = $req->fetchAll();
        $posts = [];
        foreach ($postsDB as $postDB) {
            array_push($posts, new Post($postDB));
        }
        return $posts;
    }

    /** permet de mettre à jour un épisode */
    public function updatePost($id, $content, $title)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE posts SET content = ?,title=?, modif_date = NOW() WHERE id = ?');
        $affectedLine = $post->execute(array($content, $title, $id));
        return $affectedLine;
    }

    /** permet de supprimer un épisode */
    public function deletePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($id));
    }
}


