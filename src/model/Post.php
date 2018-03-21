<?php
/**
 * Created by IntelliJ IDEA.
 * User: anneg
 * Date: 01/03/2018
 * Time: 09:19
 */

namespace Blog\Model;


class Post
{
    private $id;
    private $title;
    private $content;
    private $creation_date;
    private $modif_date;

    function __construct($postData) {
        if (isset($postData['id'])){
            $this->id = $postData['id'];
        }

        if (isset($postData['title'])){
            $this->title = $postData['title'];
        }

        if (isset($postData['content'])){
            $this->content = $postData['content'];
        }

        if (isset($postData['creation_date_fr'])){
            $this->creation_date = $postData['creation_date_fr'];
        }

        if (isset($postData['modif_date'])){
            $this->modif_date = $postData['modif_date'];
        }
    }

    // GETTERS //

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function getModifDate()
    {
        return $this->modif_date;
    }

    // SETTERS //

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    public function setModifDate($modif_date)
    {
        $this->_modif_date = $modif_date;
    }
}

?>
