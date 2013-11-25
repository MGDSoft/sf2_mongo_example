<?php

namespace MGD\ExampleBundle\Controller;

use Doctrine\MongoDB\LoggableCursor;
use MGD\ExampleBundle\Document\Student;
use MGD\ExampleBundle\Document\Translation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $manager = $this->get('doctrine_mongodb')->getManager();

        // Switch language to test it
        //$this->changeLocaleOnFly('en');

        /** @var Students[] $students */
        $students = $manager->getRepository("MGDExampleBundle:Student")->findAll();

        $translations = $book = null;

        if ($students->hasNext())
        {
            /*
             * Change lang if u want
                $studentReturned->setLocale('de');
                $manager->refresh($studentReturned);
            */

            foreach($students as $student)
                break;

            $repository = $manager->getRepository('Gedmo\Translatable\Document\Translation');
            $translations = $repository->findTranslations($student);
        }

        return array('translations' => $translations, 'student' => array_values($students->toArray()) );
    }

    /**
     * @Route("/relationships")
     * @Template()
     */
    public function relationshipsAction()
    {
        $manager = $this->get('doctrine_mongodb')->getManager();

        $students = $manager->getRepository("MGDExampleBundle:Student")->findAll();

        $teachers = $student = $books = null;

        if ($students->hasNext())
        {

            /** @var Student $student */
            foreach($students as $student)
                break;

            $books = $student->getBooks();
            $teachers = $student->getTeachers();

        }

        return array('student' => $student ,'books' => $books->toArray(), 'teachers' => $teachers->toArray() );
    }

    private function changeLocaleOnFly($locale)
    {
        $request = $this->container->get('request');

        $request->setLocale($locale);
        // Set Session _locale to take locale in listener LocaleListener, in this example it doesnt mandatory
        //$request->getSession()->set('_locale', $locale);

        $translatable = $this->container->get('stof_doctrine_extensions.listener.translatable');
        $translatable->setTranslatableLocale($locale);
    }
}
