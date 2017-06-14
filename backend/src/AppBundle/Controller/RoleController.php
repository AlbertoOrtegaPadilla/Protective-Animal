<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RoleController extends Controller {

    public function rolesAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT r FROM BackendBundle:Role r ORDER BY r.id DESC";
        $query = $em->createQuery($dql);
        $roles = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $roles
        );

        return $helpers->json($data);
    }

}
