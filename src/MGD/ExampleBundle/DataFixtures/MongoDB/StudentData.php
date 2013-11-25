<?php

namespace MGD\ExampleBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MGD\ExampleBundle\Document\Book;
use MGD\ExampleBundle\Document\Student;


class StudentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // recovering values from other fixtures

        $course = $this->getReference('course') ;
        $teacher1 = $this->getReference('teacher1') ;
        $teacher2 = $this->getReference('teacher2') ;

        /*
         * Create books that was inserted in the same document
         */

        $book1 = new Book();
        $book2 = new Book();
        $book3 = new Book();

        $book1->setTitle('title 1');
        $book2->setTitle('title 2');
        $book2->setTitle('title 3');

        // Student 1, text lang 'default' in config"
        $student= new Student();

        $student

            ->setName("Mikel")
            ->setNationality("English Default")
            ->addBook($book1)
            ->addBook($book2)
            ->setCourse($course)
            ->setLocale('en')
            ->addTeacher($teacher1)
            ->addTeacher($teacher2)
        ;

        $manager->persist($student);
        $manager->flush();

        // Translation 'es' from Student 1
        $student
            ->setName("Miguel")
            ->setNationality("Español")
            ->setLocale('es')
        ;

        $manager->persist($student);
        $manager->flush();

        // Translation 'de' from Student 1
        $student
            ->setName("EaterFrankFurT")
            ->setNationality("German1en")
            ->setLocale('de')
        ;

        $manager->persist($student);
        $manager->flush();

        // Student 2
        $student= new Student();

        $student
            ->addBook($book1)
            ->addBook($book2)
            ->addBook($book3)
        ;

        $repository = $manager->getRepository('Gedmo\\Translatable\\Document\\Translation');

        // Or you can use this to translate all in same time
        $repository
            ->translate($student,'name', 'es','Pechitos es')
            ->translate($student,'name', 'de','DrugenFength de')
            ->translate($student,'name', 'en','Nationality en')

            ->translate($student,'nationality', 'es','nationality es')
            ->translate($student,'nationality', 'de','nationality de')
            ->translate($student,'nationality', 'en','nationality en')
        ;

        $manager->persist($student);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}