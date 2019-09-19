<?php

namespace HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blog/index", name="app_blog_index_route")
     */
    public function blogIndexAction()
    {
        return new Response('Blog::index');
    }

    //Ugyanaz az útvonal, csak a paraméter más: mindig az elsőbe próbál belefutni és csak akkor megy a másodikba,
    //ha valami miatt az elsőnek nem felel meg.
    //Ha megcseréljük és az elsőnél nincs requirements, akkor minden az elsőbe fut.
    /**
     * @Route("/blog/articles/{page}", defaults={"page" = 1}, requirements={"page"="\d+"}, methods={"GET"}, name="app_articles_page_route")
     */
    public function articlesPageAction($page)
    {
        return new Response("Page number: " . $page);
    }

    /**
     * @Route("/blog/articles/{slug}", methods={"GET", "POST"}, name="app_show_article_route")
     */
    public function showArticleAction($slug)
    {
        return new Response("Slug: " . $slug);
    }
}
