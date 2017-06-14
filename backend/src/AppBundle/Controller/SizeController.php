<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SizeController extends Controller {

    public function sizesAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT s FROM BackendBundle:Size s ORDER BY s.id DESC";
        $query = $em->createQuery($dql);
        $size = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $size
        );

        return $helpers->json($data);
    }

}
