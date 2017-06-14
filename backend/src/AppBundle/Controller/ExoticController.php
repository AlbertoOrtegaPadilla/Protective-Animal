<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use BackendBundle\Entity\Exotic;

class ExoticController extends Controller {

    public function newAction(Request $request){
        $helpers = $this->get("app.helpers");

        $hash = $request->get("authorization", null);
        $authCheck = $helpers->authCheck($hash);

        if ($authCheck == true) {
            $identity = $helpers->authCheck($hash, true);

            $json = $request->get("json", null);

            if ($json != null) {
                $params = json_decode($json);

                $createdAt = new \Datetime('now');
                $updatedAt = new \Datetime('now');

                $name = (isset($params->name) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->name)) ? $params->name : null;
                $breed = (isset($params->breed) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->breed)) ? $params->breed : null;
                $age = (isset($params->age) && ctype_digit($params->age)) ? $params->age : null;
                $description = (isset($params->description)) ? $params->description : null;
                $contact_person = (isset($params->contact_person) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->contact_person)) ? $params->contact_person : null;
                $phone = (isset($params->phone) && ctype_digit($params->phone)) ? $params->phone : null;
                $email = (isset($params->email)) ? $params->email : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_type_exotic = (isset($params->id_type_exotic)) ? $params->id_type_exotic : null;
                $id_gender = (isset($params->id_gender)) ? $params->id_gender : null;
                $id_size = (isset($params->id_size)) ? $params->id_size : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                $id_status = (isset($params->id_status)) ? $params->id_status : null;

                $emailContraint = new Assert\Email();
                $emailContraint->message = "This email is not valid !!";
                $validate_email = $this->get("validator")->validate($email, $emailContraint);

                if ($name != null && $breed != null && $age != null && $description != null && $contact_person != null && $phone != null && $email != null &&
                        count($validate_email) == 0 && $id_type_exotic != null && $id_gender != null && $id_size != null && $id_user != null && $id_status != null) {

                    $em = $this->getDoctrine()->getManager();

                    $user = $em->getRepository("BackendBundle:User")->findOneBy(
                            array(
                                "id" => $id_user
                    ));

                    $type_exotic = $em->getRepository("BackendBundle:TypeExotic")->findOneBy(
                            array(
                                "id" => $id_type_exotic
                    ));

                    $gender = $em->getRepository("BackendBundle:Gender")->findOneBy(
                            array(
                                "id" => $id_gender
                    ));

                    $size = $em->getRepository("BackendBundle:Size")->findOneBy(
                            array(
                                "id" => $id_size
                    ));

                    $status = $em->getRepository("BackendBundle:Status")->findOneBy(
                            array(
                                "id" => $id_status
                    ));

                    $exotic = new Exotic();
                    $exotic->setName($name);
                    $exotic->setBreed($breed);
                    $exotic->setAge($age);
                    $exotic->setDescription($description);
                    $exotic->setContactPerson($contact_person);
                    $exotic->setPhone($phone);
                    $exotic->setEmail($email);
                    $exotic->setUrlVideo($url_video);
                    $exotic->setIdTypeExotic($type_exotic);
                    $exotic->setIdGender($gender);
                    $exotic->setIdSize($size);
                    $exotic->setIdUser($user);
                    $exotic->setIdStatus($status);
                    $exotic->setCreatedAt($createdAt);
                    $exotic->setUpdatedAt($updatedAt);

                    $em->persist($exotic);
                    $em->flush();


                    $exotic = $em->getRepository("BackendBundle:Exotic")->findOneBy(
                            array(
                                "name" => $name,
                                "breed" => $breed,
                                "description" => $description,
                                "contactPerson" => $contact_person,
                                "phone" => $phone,
                                "email" => $email,
                                "urlVideo" => $url_video,
                                "idTypeExotic" => $type_exotic,
                                "idGender" => $gender,
                                "idSize" => $size,
                                "idUser" => $user,
                                "idStatus" => $status,
                                "createdAt" => $createdAt,
                                "updatedAt" => $updatedAt
                    ));

                    $data = array(
                        "status" => "success",
                        "code" => 200,
                        "data" => $exotic
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Exotic not created"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Exotic not created, params failed"
                );
            }
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "Authorization not valid"
            );
        }

        return $helpers->json($data);
    }

    public function editAction(Request $request, $id = null) {
        $helpers = $this->get("app.helpers");

        $hash = $request->get("authorization", null);
        $authCheck = $helpers->authCheck($hash);

        if ($authCheck == true) {
            $identity = $helpers->authCheck($hash, true);

            $json = $request->get("json", null);

            if ($json != null) {
                $params = json_decode($json);

                $exotic_id = $id;
                $updatedAt = new \Datetime('now');

                $name = (isset($params->name) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->name)) ? $params->name : null;
                $breed = (isset($params->breed) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->breed)) ? $params->breed : null;
                $age = (isset($params->age) && ctype_digit($params->age)) ? $params->age : null;
                $description = (isset($params->description)) ? $params->description : null;
                $contact_person = (isset($params->contact_person) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->contact_person)) ? $params->contact_person : null;
                $phone = (isset($params->phone) && ctype_digit($params->phone)) ? $params->phone : null;
                $email = (isset($params->email)) ? $params->email : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_type_exotic = (isset($params->id_type_exotic)) ? $params->id_type_exotic : null;
                $id_gender = (isset($params->id_gender)) ? $params->id_gender : null;
                $id_size = (isset($params->id_size)) ? $params->id_size : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                $id_status = (isset($params->id_status)) ? $params->id_status : null;

                $emailContraint = new Assert\Email();
                $emailContraint->message = "This email is not valid !!";
                $validate_email = $this->get("validator")->validate($email, $emailContraint);

                if ($name != null && $breed != null && $age != null && $description != null && $contact_person != null && $phone != null && $email != null &&
                        count($validate_email) == 0 && $id_type_exotic != null && $id_gender != null && $id_size != null && $id_user != null && $id_status != null) {

                    $em = $this->getDoctrine()->getManager();

                    $exotic = $em->getRepository("BackendBundle:Exotic")->findOneBy(
                            array(
                                "id" => $exotic_id
                    ));

                    $type_exotic = $em->getRepository("BackendBundle:TypeExotic")->findOneBy(
                            array(
                                "id" => $id_type_exotic
                    ));

                    $gender = $em->getRepository("BackendBundle:Gender")->findOneBy(
                            array(
                                "id" => $id_gender
                    ));

                    $size = $em->getRepository("BackendBundle:Size")->findOneBy(
                            array(
                                "id" => $id_size
                    ));

                    $status = $em->getRepository("BackendBundle:Status")->findOneBy(
                            array(
                                "id" => $id_status
                    ));

                    if (isset($identity->sub) && $identity->sub) {
                        $exotic->setName($name);
                        $exotic->setBreed($breed);
                        $exotic->setAge($age);
                        $exotic->setDescription($description);
                        $exotic->setContactPerson($contact_person);
                        $exotic->setPhone($phone);
                        $exotic->setEmail($email);
                        $exotic->setUrlVideo($url_video);
                        $exotic->setIdTypeExotic($type_exotic);
                        $exotic->setIdGender($gender);
                        $exotic->setIdSize($size);
                        $exotic->setIdStatus($status);
                        $exotic->setUpdatedAt($updatedAt);

                        $em->persist($exotic);
                        $em->flush();

                        $data = array(
                            "status" => "success",
                            "code" => 200,
                            "data" => "Exotic update sucess!!"
                        );
                    } else {
                        $data = array(
                            "status" => "success",
                            "code" => 400,
                            "data" => "Exotic update error, you not owner!!"
                        );
                    }
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Exotic update error"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Exotic not updated, params failed"
                );
            }
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "Authorization not valid"
            );
        }

        return $helpers->json($data);
    }

    public function deleteAction(Request $request, $id = null) {
        $helpers = $this->get("app.helpers");

        $hash = $request->get("authorization", null);
        $authCheck = $helpers->authCheck($hash);

        if ($authCheck == true) {
            $identity = $helpers->authCheck($hash, true);

            $exotic_id = ($identity->sub != null) ? $identity->sub : null;

            $em = $this->getDoctrine()->getManager();
            $exotic = $em->getRepository("BackendBundle:Exotic")->findOneBy(
                    array(
                        "id" => $id
            ));

            if (is_object($exotic) && $exotic_id != null) {
                if (isset($identity->sub) && ($identity->sub)) {
                    $em->remove($exotic);
                    $em->flush();

                    $data = array(
                        "status" => "error",
                        "code" => 200,
                        "msg" => "Exotic deleted success"
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Exoti not delete"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Exoti not delete"
                );
            }
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "Authorization not valid"
            );
        }
        return $helpers->json($data);
    }

    public function exoticsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT v FROM BackendBundle:Exotic v ORDER BY v.id DESC";
        $query = $em->createQuery($dql);

        $page = $request->query->getInt("page", 1);
        $paginator = $this->get("knp_paginator");
        $items_per_page = 6;

        $pagination = $paginator->paginate($query, $page, $items_per_page);
        $total_items_count = $pagination->getTotalItemCount();

        $data = array(
            "status" => "success",
            "total_items_count" => $total_items_count,
            "page_actual" => $page,
            "items_per_page" => $items_per_page,
            "total_pages" => ceil($total_items_count / $items_per_page),
            "data" => $pagination
        );

        return $helpers->json($data);
    }
    
    public function PruebaAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $hash = $request->get("authorization", null);
        $authCheck = $helpers->authCheck($hash);

        if ($authCheck == true) {
            $identity = $helpers->authCheck($hash, true);

            $json = $request->get("json", null);

            if ($json != null) {
                $params = json_decode($json);

                $createdAt = new \Datetime('now');
                $updatedAt = new \Datetime('now');

                $name = (isset($params->name) && ctype_alpha($params->name)) ? $params->name : null;
                $breed = (isset($params->breed) && ctype_alpha($params->breed)) ? $params->breed : null;
                $age = (isset($params->age) && ctype_digit($params->age)) ? $params->age : null;
                $description = (isset($params->description)) ? $params->description : null;
                $contact_person = (isset($params->contact_person)) ? $params->contact_person : null;
                $phone = (isset($params->phone) && ctype_digit($params->phone)) ? $params->phone : null;
                $email = (isset($params->email)) ? $params->email : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_type_exotic = (isset($params->id_type_exotic)) ? $params->id_type_exotic : null;
                $id_gender = (isset($params->id_gender)) ? $params->id_gender : null;
                $id_size = (isset($params->id_size)) ? $params->id_size : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                $id_status = (isset($params->id_status)) ? $params->id_status : null;

                $emailContraint = new Assert\Email();
                $emailContraint->message = "This email is not valid !!";
                $validate_email = $this->get("validator")->validate($email, $emailContraint);

                if ($name != null && $breed != null && $age != null && $description != null && $contact_person != null && $phone != null && $email != null &&
                        count($validate_email) == 0 && $id_type_exotic != null && $id_gender != null && $id_size != null && $id_user != null && $id_status != null) {

                    $em = $this->getDoctrine()->getManager();

                    $user = $em->getRepository("BackendBundle:User")->findOneBy(
                            array(
                                "id" => $id_user
                    ));

                    $type_exotic = $em->getRepository("BackendBundle:TypeExotic")->findOneBy(
                            array(
                                "id" => $id_type_exotic
                    ));

                    $gender = $em->getRepository("BackendBundle:Gender")->findOneBy(
                            array(
                                "id" => $id_gender
                    ));

                    $size = $em->getRepository("BackendBundle:Size")->findOneBy(
                            array(
                                "id" => $id_size
                    ));

                    $status = $em->getRepository("BackendBundle:Status")->findOneBy(
                            array(
                                "id" => $id_status
                    ));

                    $exotic = new Exotic();
                    $exotic->setName($name);
                    $exotic->setBreed($breed);
                    $exotic->setAge($age);
                    $exotic->setDescription($description);
                    $exotic->setContactPerson($contact_person);
                    $exotic->setPhone($phone);
                    $exotic->setEmail($email);
                    $exotic->setUrlVideo($url_video);
                    $exotic->setIdTypeExotic($type_exotic);
                    $exotic->setIdGender($gender);
                    $exotic->setIdSize($size);
                    $exotic->setIdUser($user);
                    $exotic->setIdStatus($status);
                    $exotic->setCreatedAt($createdAt);
                    $exotic->setUpdatedAt($updatedAt);

                    $em->persist($exotic);
                    $em->flush();


                    $exotic = $em->getRepository("BackendBundle:Exotic")->findOneBy(
                            array(
                                "name" => $name,
                                "breed" => $breed,
                                "description" => $description,
                                "contactPerson" => $contact_person,
                                "phone" => $phone,
                                "email" => $email,
                                "urlVideo" => $url_video,
                                "idTypeExotic" => $type_exotic,
                                "idGender" => $gender,
                                "idSize" => $size,
                                "idUser" => $user,
                                "idStatus" => $status,
                                "createdAt" => $createdAt,
                                "updatedAt" => $updatedAt
                    ));

                    $data = array(
                        "status" => "success",
                        "code" => 200,
                        "data" => $exotic
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Exotic not created"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Exotic not created, params failed"
                );
            }
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "Authorization not valid"
            );
        }

        return $helpers->json($data);
    }

    public function exoticAction(Request $request, $id = null) {
        $helpers = $this->get("app.helpers");
        $em = $this->getDoctrine()->getManager();

        $exotic = $em->getRepository("BackendBundle:Exotic")->findOneBy(array(
            "id" => $id
        ));


        if ($exotic) {
            $data = array();
            $data["status"] = 'success';
            $data["code"] = 200;
            $data["data"] = $exotic;
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "The animal exotic dont exists"
            );
        }


        return $helpers->json($data);
    }

    public function lastExoticsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT v FROM BackendBundle:Exotic v ORDER BY v.createdAt DESC";
        $query = $em->createQuery($dql)->setMaxResults(5);
        $exotics = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $exotics
        );

        return $helpers->json($data);
    }

    public function searchAction(Request $request, $search = null) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        if ($search != null) {
            $dql = "SELECT e FROM BackendBundle:Exotic e "
                    . "WHERE UPPER(e.name) LIKE UPPER(:search) OR "
                    . "UPPER(e.breed) LIKE UPPER(:search) ORDER BY e.id DESC";
            $query = $em->createQuery($dql)
                    ->setParameter("search", "%$search%");
        } else {
            $dql = "SELECT e FROM BackendBundle:Exotic e ORDER BY e.id DESC";
            $query = $em->createQuery($dql);
        }

        $page = $request->query->getInt("page", 1);
        $paginator = $this->get("knp_paginator");
        $items_per_page = 6;

        $pagination = $paginator->paginate($query, $page, $items_per_page);
        $total_items_count = $pagination->getTotalItemCount();

        $data = array(
            "status" => "success",
            "total_items_count" => $total_items_count,
            "page_actual" => $page,
            "items_per_page" => $items_per_page,
            "total_pages" => ceil($total_items_count / $items_per_page),
            "data" => $pagination
        );

        return $helpers->json($data);

        // OR || AND
        // 
        // SELECT * FROM exotic WHERE UPPER(name) LIKE UPPER("horus") OR UPPER(breed) 
        //                  LIKE UPPER("hamster") AND UPPER(age) LIKE UPPER("1") ORDER BY id DESC
    }

}
