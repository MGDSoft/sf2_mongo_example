<?php

namespace MGD\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MGD\ExampleBundle\Document\Book
 *
 * @ODM\EmbeddedDocument
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 */
class Book
{
    /**
     * @var MongoId $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $title
     *
     * @ODM\Field(name="title", type="string")
     */
    protected $title;

    /**
     * @var string $title
     *
     * @Gedmo\Slug(fields={"title"})
     * @ODM\Field(name="slug", type="string")
     */
    protected $slug;

    /**
     * @var Student $student
     *
     * @ODM\EmbedOne(targetDocument="MGD\ExampleBundle\Document\Student")
     */
    protected $student;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ODM\Field(name="created", type="timestamp")
     */
    private $created;

    /**
     * @ODM\Field(name="updated", type="timestamp")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;







    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }


    /**
     * Get student
     *
     * @return MGD\ExampleBundle\Document\Student $student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set created
     *
     * @param timestamp $created
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return timestamp $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param timestamp $updated
     * @return self
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return timestamp $updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set student
     *
     * @param MGD\ExampleBundle\Document\Student $student
     * @return self
     */
    public function setStudent(\MGD\ExampleBundle\Document\Student $student)
    {
        $this->student = $student;
        return $this;
    }
}
