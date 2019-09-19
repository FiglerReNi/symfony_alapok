<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/blog_url")
     */
    public function indexAction()
    {
//        $users = [
//            [
//                'name' => 'Messi',
//                'best' => true,
//            ],
//            [
//                'name' => 'Ronaldo',
//                'best' => false,
//            ]
//        ];

        $articles = [
            [
                'title' => "<script>alert('Hello');</script>",
                'author' => 'Admin',
                'date' => '2018-06-21'
            ],
            [
                'title' => 'Title2',
                'author' => 'Admin',
                'date' => '2018-06-21'
            ],
            [
                'title' => 'Title3',
                'author' => 'Admin',
                'date' => '2018-06-21'
            ]
        ];

//        return $this->render('@Blog/Default/index.html.twig', ['users' => $users]);

        return $this->render('@Blog/Default/index.html.twig', ['articles' => $articles]);
    }
}
