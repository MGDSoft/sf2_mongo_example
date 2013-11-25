<?php

namespace MGD\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * MGD\ExampleBundle\Document\Teacher
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Teacher
{
    /**
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ODM\Field(name="name", type="string")
     */
    protected $name;

    /**
     * @var int $age
     *
     * @ODM\Field(name="age", type="int")
     */
    protected $age;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param int $age
     * @return self
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * Get age
     *
     * @return int $age
     */
    public function getAge()
    {
        return $this->age;
    }
}
