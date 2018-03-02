<?php
/**
 * Created by IntelliJ IDEA.
 * User: anneg
 * Date: 01/03/2018
 * Time: 09:19
 */

namespace testAnne\blog\model;


class posts
{
    private $id;
    private $title;
    private $content;
    private $creation_date;
    private $modif_date;

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
        $this->_id = $id;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function setContent($content)
    {
        $this->_content = $content;
    }

    public function setCreationDate($creation_date)
    {
        $this->_creation_date = $creation_date;
    }

    public function setModifDate($modif_date)
    {
        $this->_modif_date = $modif_date;
    }
}

?>