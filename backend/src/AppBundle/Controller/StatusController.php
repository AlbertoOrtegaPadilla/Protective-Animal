<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StatusController extends Controller {

    public function statusesAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT s FROM BackendBundle:Status s ORDER BY s.id DESC";
        $query = $em->createQuery($dql);
        $status = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $status
        );

        return $helpers->json($data);
    }

}
