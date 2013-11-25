<?php

namespace MGD\ExampleBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MGD\ExampleBundle\Document\Book;
use MGD\ExampleBundle\Document\Course;
use MGD\ExampleBundle\Document\Student;
use MGD\ExampleBundle\Document\Teacher;


class TeacherData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $teacher1= new Teacher();
        $teacher1
            ->setName("Mr Potatoe Teacher")
            ->setAge(33)
        ;
        $manager->persist($teacher1);

        $teacher2= new Teacher();
        $teacher2
            ->setName("Old Man Teacher")
            ->setAge(50)
        ;
        $manager->persist($teacher2);

        $manager->flush();

        $this->addReference('teacher1', $teacher1);
        $this->addReference('teacher2', $teacher2);
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}