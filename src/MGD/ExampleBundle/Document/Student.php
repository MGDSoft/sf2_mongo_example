<?php

namespace MGD\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * MGD\ExampleBundle\Document\Student
 *
 * @ODM\Document
 * @ODM\ChangeTrackingPolicy("DEFERRED_IMPLICIT")
 * @Gedmo\Loggable
 */
class Student implements Translatable
{
    /**
     * @var id $id
     *
     * @ODM\Id(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @Gedmo\Translatable
     * @Gedmo\Versioned
     * @ODM\Field(name="name", type="string")
     */
    protected $name;

    /**
     * @var timestamp $birth_date
     *
     * @ODM\Field(name="birth_date", type="timestamp")
     */
    protected $birth_date;

    /**
     * @var string $nationality
     *
     * @Gedmo\Translatable
     * @ODM\String
     */
    protected $nationality;

    /**
     * @Gedmo\Locale
     */
    private $locale;

    /**
     * @var Course $course
     *
     * @ODM\ReferenceOne(targetDocument="MGD\ExampleBundle\Document\Course")
     */
    protected $course;

    /**
     * @var Book[] $books
     *
     * @ODM\EmbedMany(targetDocument="MGD\ExampleBundle\Document\Book")
     */
    protected $books;

    /**
     * @var Teacher[] $teachers
     *
     * @ODM\ReferenceMany(targetDocument="MGD\ExampleBundle\Document\Teacher")
     */
    protected $teachers;

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
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $locale
     * @return self
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }


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
     * Set birthDate
     *
     * @param timestamp $birthDate
     * @return self
     */
    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;
        return $this;
    }

    /**
     * Get birthDate
     *
     * @return timestamp $birthDate
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return self
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * Get nationality
     *
     * @return string $nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add book
     *
     * @param \MGD\ExampleBundle\Document\Book $book
     * @return self
     */
    public function addBook(\MGD\ExampleBundle\Document\Book $book)
    {
        $this->books[] = $book;
        return $this;
    }

    /**
     * Remove book
     *
     * @param \MGD\ExampleBundle\Document\Book $book
     * @return self
     */
    public function removeBook(\MGD\ExampleBundle\Document\Book $book)
    {
        $this->books->removeElement($book);
        return $this;
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection $books
     */
    public function getBooks()
    {
        return $this->books;
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
     * Set course
     *
     * @param \MGD\ExampleBundle\Document\Course $course
     * @return self
     */
    public function setCourse(\MGD\ExampleBundle\Document\Course $course)
    {
        $this->course = $course;
        return $this;
    }

    /**
     * Get course
     *
     * @return \MGD\ExampleBundle\Document\Course $course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Add teacher
     *
     * @param \MGD\ExampleBundle\Document\Teacher $teacher
     * @return self
     */
    public function addTeacher(\MGD\ExampleBundle\Document\Teacher $teacher)
    {
        $this->teachers[] = $teacher;
        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \MGD\ExampleBundle\Document\Teacher $teacher
     */
    public function removeTeacher(\MGD\ExampleBundle\Document\Teacher $teacher)
    {
        $this->teachers->removeElement($teacher);
    }

    /**
     * Get teachers
     *
     * @return \Doctrine\Common\Collections\Collection $teachers
     */
    public function getTeachers()
    {
        return $this->teachers;
    }
}
