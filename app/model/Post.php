<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;
use App\Core\MVC\Model\BaseModel;


/**
 * @ORM\Entity 
 * @ORM\Table(name="post")
 */
class Post extends BaseModel {
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $title;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="posts")
     */ 
      //@ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
     //    
    private $author;
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getText() {
        return $this->text;
    }

    function getAuthor() {
        return $this->author;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

}

