<?php

namespace HomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class TutorialController extends Controller
{
    /**
     * @Route("/tutorial/{name}", name="app_tutorial_route")
     */
    public function tutorialAction($name)
    {
        if($name == "teszt1"){

            //A verzió
            //return $this->redirect($this->generateUrl('app_home_route'));

            //B verzió
            //return $this->redirectToRoute('app_home_route');

            //URL-ben megmarad az eredeti cím, ahonnan irányítottuk az oldalt
            return $this->forward('HomeBundle:Default:index');

        }
        return new Response($name);
    }

    /**
     * @Route("/delete/{name}", name="app_delete_tutorial_route")
     */
    public function deleteTutorialAction(Request $request, $name)
    {
        $by = $request->query->get('by');
        if($by != 'admin'){
            return $this->redirectToRoute('app_home_route');
        }

        //return new Response($name);
        return new Response($name . ' is deleted.');
    }

    /**
     * @Route("write_session", name="app_write_session_route")
     */
    public function writeSessionAction()
    {
        $this->get('session')->set("shopping_cart", [
            [
                'item' => 'playstation 4',
                'quantity' => '1',
                'price' => '300'
            ],
            [
            'item' => 'Xbox One',
            'quantity' => '1',
            'price' => '300'
            ]
        ]);

        return new Response('Done');
    }

    /**
     * @Route("/read_session", name="app_read_session_route")
     */
    public function readSessionAction(Request $request)
    {
        //Session A változat
        //$this->get('session');
        //Session B változat
        //$request->getSession();

        $shopping_cart = $this->get('session')->get('shopping_cart');
        print_r($shopping_cart);

        return new Response();
    }
}
