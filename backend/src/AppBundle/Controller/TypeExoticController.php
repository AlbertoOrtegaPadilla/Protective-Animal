<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeExoticController extends Controller {

    public function typeExoticsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT te FROM BackendBundle:TypeExotic te ORDER BY te.id DESC";
        $query = $em->createQuery($dql);
        $type_exotics = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $type_exotics
        );

        return $helpers->json($data);
    }

}
