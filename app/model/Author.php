<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Core\MVC\Model\BaseModel;


/**
 * @ORM\Entity 
 * @ORM\Table(name="author")
 */
class Author extends BaseModel {
    
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
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author", cascade={"persist"})
     * @var Post[] An ArrayCollection of Post objects.
     */
    protected $posts;
    
    public function __construct() {
        $this->posts = new ArrayCollection();
    }
    
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    public function assignToPost(Post $post) {
        $this->posts[] = $post;
    }
    
    function getPosts() {
        return $this->posts;
    }

}