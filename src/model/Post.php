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
    private $creationDate;
    private $modifDate;

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

        if (isset($postData['creation_date'])){
            $this->creationDate = date_create_from_format('Y-m-d h:m:s', $postData['creation_date']);
        }

        if (isset($postData['modif_date'])){
            $this->modifDate = date_create_from_format('Y-m-d h:m:s', $postData['modif_date']);
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
        return $this->creationDate;
    }

    public function getModifDate()
    {
        return $this->modifDate;
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

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function setModifDate($modifDate)
    {
        $this->_modifDate = $modifDate;
    }
}

?>
