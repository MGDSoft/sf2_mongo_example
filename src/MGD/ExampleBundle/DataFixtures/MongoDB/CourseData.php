<?php

namespace MGD\ExampleBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MGD\ExampleBundle\Document\Book;
use MGD\ExampleBundle\Document\Course;
use MGD\ExampleBundle\Document\Student;


class CourseData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $course= new Course();
        $course->setName("1º career");
        $course->setCourse(1);

        $manager->persist($course);
        $manager->flush();

        $this->addReference('course', $course);
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}