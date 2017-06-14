<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use \Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    
    public function loginAction(Request $request)
    {
        $helpers = $this->get("app.helpers");
        $jwt_auth = $this->get("app.jwt_auth");
        
        // Recibir Json por POST
        $json = $request->get("json", null);
        
        if($json != null){
            $params = json_decode($json);
            
            $email = (isset($params->email)) ? $params->email : null;
            $password = (isset($params->password)) ? $params->password : null;
            $getHash = (isset($params->gethash)) ? $params->gethash : null;
            
            $emailContraint = new Assert\Email();
            $emailContraint->message = "This email is not valid !!";
            
            $validate_email = $this->get("validator")->validate($email, $emailContraint);
            
            //ENCRYP PASSWORD
            $pwd = hash('sha256', $password);
                
            if(count($validate_email) == 0 && $password != null){
                
                if($getHash == null){
                    $signup = $jwt_auth->signup($email, $pwd);
                }else{
                    $signup = $jwt_auth->signup($email, $pwd, true);
                }
                
                return new JsonResponse($signup);
                
            }else{
                return $helpers->json(array("status" => "error", "data" => "Login not Valid!!"));
            }
        }else{
            return $helpers->json(array("status" => "error", "data" => "Send Json with post !!"));
        }
    }


    public function pruebasAction(Request $request)
    {
        $helpers = $this->get("app.helpers");
	   
        $hash = $request->get("authorization", null);
        $check = $helpers->authCheck($hash);

        var_dump($check);
        die();
        /*
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('BackendBundle:User')->findAll();
        // $pruebas = array("id"=>1, "nombre"=>"Alberto");
        
        return $helpers->json($users);
        // return $this->json($pruebas);
         */
    }
}
