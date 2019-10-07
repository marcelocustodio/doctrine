<?php

// src/Bug.php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Core\MVC\Model\BugRepository")
 * @ORM\Table(name="bugs")
 */
class Bug extends \App\Core\MVC\Model\BaseModel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    protected $created;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $status;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     */
    protected $engineer;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     */
    protected $reporter;

    /**
     * @ORM\ManyToMany(targetEntity="Product")
     */
    protected $products;
    
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
    
    function getEngineer() {
        return $this->engineer;
    }

    function getReporter() {
        return $this->reporter;
    }

    function setEngineer($engineer) {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    function setReporter($reporter) {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function assignToProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getProducts() {
        return $this->products;
    }
    
}