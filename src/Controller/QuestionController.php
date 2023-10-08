<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends abstractController
{
    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage(Environment $twigEnv)
    {
        //return $this->render('question/homepage.html.twig');

        // example of using twig service directly
        $html = $twigEnv->render('question/homepage.html.twig');
        return new Response($html);
    }

    /**
     * @Route("/questions/{slug}",name="app_question_show")
     */
    public function show($slug)
    {
        $answers = [
            'Make sure your cat is sitting purrrfectly still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        dump($this);

        return $this->render('question/show.html.twig',[
            'question'=>ucwords(str_replace('-', ' ', $slug)),
            'answers'=>$answers
        ]);

        /*return new Response(sprintf('Future page to show the question  "%s"!',
            ucwords(str_replace('-', ' ', $slug))));*/
    }


}