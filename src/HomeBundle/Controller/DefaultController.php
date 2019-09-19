<?php

namespace HomeBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="app_home_route")
     */
    public function indexAction()
    {
        return $this->render('@Home/Default/index.html.twig');
    }

    /**
     * @Route("/contact", name="app_contact_route")
     */
    public function contactAction()
    {
        return $this->render('@Home/Pages/contact.html.twig');
    }

    /**
     * @Route("/greetings/{name}", name="app_greetings_route")
     */
    public function greetingAction($name)
    {
        //return $this->render('@Home/Pages/greetings.html.twig', ['name' => $name]);

        return new JsonResponse([
            'name' => $name,
            'lucky_number' => rand()
        ]);
    }


}
