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
    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;
    private $_modif_date;

    // GETTERS //

    public function getId()
    {
        return $this->_id;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getCreationDate()
    {
        return $this->_creation_date;
    }

    public function getModifDate()
    {
        return $this->_modif_date;
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