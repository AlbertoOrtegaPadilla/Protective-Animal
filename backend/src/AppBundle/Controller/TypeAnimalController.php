<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeAnimalController extends Controller {

    public function typesAnimalsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT ta FROM BackendBundle:TypeAnimal ta ORDER BY ta.id DESC";
        $query = $em->createQuery($dql);
        $TypeAnimal = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $TypeAnimal
        );

        return $helpers->json($data);
    }

}
