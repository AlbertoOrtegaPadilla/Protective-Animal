<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeBlogController extends Controller {

    public function typesBlogsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT tb FROM BackendBundle:TypeBlog tb ORDER BY tb.id DESC";
        $query = $em->createQuery($dql);
        $TypeBlog = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $TypeBlog
        );

        return $helpers->json($data);
    }

}