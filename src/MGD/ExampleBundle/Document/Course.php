<?php

namespace MGD\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * MGD\ExampleBundle\Document\Course
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Course
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
     * @var int $year
     *
     * @ODM\Field(name="course", type="int")
     */
    protected $course;


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
     * Set course
     *
     * @param int $course
     * @return self
     */
    public function setCourse($course)
    {
        $this->course = $course;
        return $this;
    }

    /**
     * Get course
     *
     * @return int $year
     */
    public function getCourse()
    {
        return $this->course;
    }
}
