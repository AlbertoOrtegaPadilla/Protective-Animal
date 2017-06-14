<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GenderController extends Controller {

    public function gendersAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT g FROM BackendBundle:Gender g ORDER BY g.id DESC";
        $query = $em->createQuery($dql);
        $gender = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $gender
        );

        return $helpers->json($data);
    }

}
