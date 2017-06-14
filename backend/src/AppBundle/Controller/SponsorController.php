<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use BackendBundle\Entity\Sponsor;

class SponsorController extends Controller {

    public function newAction(Request $request) {
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
                $age = (isset($params->age) && ctype_digit($params->age)) ? $params->age : null;
                $description = (isset($params->description)) ? $params->description : null;
                $contact_person = (isset($params->contact_person) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->contact_person)) ? $params->contact_person : null;
                $phone = (isset($params->phone) && ctype_digit($params->phone)) ? $params->phone : null;
                $email = (isset($params->email)) ? $params->email : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_type_animal = (isset($params->id_type_animal)) ? $params->id_type_animal : null;
                $id_gender = (isset($params->id_gender)) ? $params->id_gender : null;
                $id_size = (isset($params->id_size)) ? $params->id_size : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                $endCounter = null;
                $initialCounter = null;

                $emailContraint = new Assert\Email();
                $emailContraint->message = "This email is not valid !!";
                $validate_email = $this->get("validator")->validate($email, $emailContraint);

                if ($name != null && $age != null && $description != null && $contact_person != null && $phone != null && $email != null &&
                        count($validate_email) == 0 && $id_type_animal != null && $id_gender != null && $id_size != null && $id_user != null) {

                    $em = $this->getDoctrine()->getManager();

                    $user = $em->getRepository("BackendBundle:User")->findOneBy(
                            array(
                                "id" => $id_user
                    ));

                    $Type_animal = $em->getRepository("BackendBundle:TypeAnimal")->findOneBy(
                            array(
                                "id" => $id_type_animal
                    ));

                    $gender = $em->getRepository("BackendBundle:Gender")->findOneBy(
                            array(
                                "id" => $id_gender
                    ));

                    $size = $em->getRepository("BackendBundle:Size")->findOneBy(
                            array(
                                "id" => $id_size
                    ));

                    $sponsor = new Sponsor();
                    $sponsor->setName($name);
                    $sponsor->setAge($age);
                    $sponsor->setDescription($description);
                    $sponsor->setContactPerson($contact_person);
                    $sponsor->setPhone($phone);
                    $sponsor->setEmail($email);
                    $sponsor->setUrlVideo($url_video);
                    $sponsor->setIdTypeAnimal($Type_animal);
                    $sponsor->setIdGender($gender);
                    $sponsor->setIdSize($size);
                    $sponsor->setIdUser($user);
                    $sponsor->setCreatedAt($createdAt);
                    $sponsor->setUpdatedAt($updatedAt);
                    $sponsor->setEndCounter($endCounter);
                    $sponsor->setInitialCounter($initialCounter);
                    

                    $em->persist($sponsor);
                    $em->flush();


                    $Sponsor = $em->getRepository("BackendBundle:Sponsor")->findOneBy(
                            array(
                                "name" => $name,
                                "description" => $description,
                                "contactPerson" => $contact_person,
                                "phone" => $phone,
                                "email" => $email,
                                "urlVideo" => $url_video,
                                "idTypeAnimal" => $Type_animal,
                                "idGender" => $gender,
                                "idSize" => $size,
                                "idUser" => $user,
                                "createdAt" => $createdAt,
                                "updatedAt" => $updatedAt,
                                "endCounter" => $endCounter
                    ));

                    $data = array(
                        "status" => "success",
                        "code" => 200,
                        "data" => $sponsor
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Sponsor not created"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Sponsor not created, params failed"
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

                $sponsor_id = $id;
                $updatedAt = new \Datetime('now');

                $name = (isset($params->name) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->name)) ? $params->name : null;
                $age = (isset($params->age) && ctype_digit($params->age)) ? $params->age : null;
                $description = (isset($params->description)) ? $params->description : null;
                $contact_person = (isset($params->contact_person) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->contact_person)) ? $params->contact_person : null;
                $phone = (isset($params->phone) && ctype_digit($params->phone)) ? $params->phone : null;
                $email = (isset($params->email)) ? $params->email : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_type_animal = (isset($params->id_type_animal)) ? $params->id_type_animal : null;
                $id_gender = (isset($params->id_gender)) ? $params->id_gender : null;
                $id_size = (isset($params->id_size)) ? $params->id_size : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                $endCounter = null;
                $initialCounter = null;

                $emailContraint = new Assert\Email();
                $emailContraint->message = "This email is not valid !!";
                $validate_email = $this->get("validator")->validate($email, $emailContraint);

                if ($name != null && $age != null && $description != null && $contact_person != null && $phone != null && $email != null &&
                        count($validate_email) == 0 && $id_type_animal != null && $id_gender != null && $id_size != null && $id_user != null) {

                    $em = $this->getDoctrine()->getManager();

                    $sponsor = $em->getRepository("BackendBundle:Sponsor")->findOneBy(
                            array(
                                "id" => $sponsor_id
                    ));

                    $type_animal = $em->getRepository("BackendBundle:TypeAnimal")->findOneBy(
                            array(
                                "id" => $id_type_animal
                    ));

                    $gender = $em->getRepository("BackendBundle:Gender")->findOneBy(
                            array(
                                "id" => $id_gender
                    ));

                    $size = $em->getRepository("BackendBundle:Size")->findOneBy(
                            array(
                                "id" => $id_size
                    ));


                    if (isset($identity->sub) && $identity->sub) {
                        $sponsor->setName($name);
                        $sponsor->setAge($age);
                        $sponsor->setDescription($description);
                        $sponsor->setContactPerson($contact_person);
                        $sponsor->setPhone($phone);
                        $sponsor->setEmail($email);
                        $sponsor->setUrlVideo($url_video);
                        $sponsor->setIdTypeAnimal($type_animal);
                        $sponsor->setIdGender($gender);
                        $sponsor->setIdSize($size);
                        $sponsor->setUpdatedAt($updatedAt);
                        $sponsor->setEndCounter($endCounter);
                        $sponsor->setInitialCounter($initialCounter);

                        $em->persist($sponsor);
                        $em->flush();

                        $data = array(
                            "status" => "success",
                            "code" => 200,
                            "data" => "Sponsor update sucess!!"
                        );
                    } else {
                        $data = array(
                            "status" => "success",
                            "code" => 400,
                            "data" => "Sponsor update error, you not owner!!"
                        );
                    }
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Sponsor update error"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Sponsor not updated, params failed"
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

            $sponsor_id = ($identity->sub != null) ? $identity->sub : null;

            $em = $this->getDoctrine()->getManager();
            $sponsor = $em->getRepository("BackendBundle:Sponsor")->findOneBy(
                    array(
                        "id" => $id
            ));

            if (is_object($sponsor) && $sponsor_id != null) {
                if (isset($identity->sub) && ($identity->sub)) {
                    $em->remove($sponsor);
                    $em->flush();

                    $data = array(
                        "status" => "error",
                        "code" => 200,
                        "msg" => "Sponsor deleted success"
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Sponsor no delete"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Sponsor not delete"
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

    public function sponsorsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT s FROM BackendBundle:Sponsor s ORDER BY s.id DESC";
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

    public function sponsorAction(Request $request, $id = null) {
        $helpers = $this->get("app.helpers");
        $em = $this->getDoctrine()->getManager();

        $sponsor = $em->getRepository("BackendBundle:Sponsor")->findOneBy(array(
            "id" => $id
        ));


        if ($sponsor) {
            $data = array();
            $data["status"] = 'success';
            $data["code"] = 200;
            $data["data"] = $sponsor;
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "The animal sponsor dont exists"
            );
        }


        return $helpers->json($data);
    }

    public function lastSponsorsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT s FROM BackendBundle:Sponsor s ORDER BY s.createdAt DESC";
        $query = $em->createQuery($dql)->setMaxResults(5);
        $sponsor = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $sponsor
        );

        return $helpers->json($data);
    }

    public function searchAction(Request $request, $search = null) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        if ($search != null) {
            $dql = "SELECT s FROM BackendBundle:Sponsor s "
                    . "WHERE UPPER(s.name) LIKE UPPER(:search) ORDER BY s.id DESC";
            $query = $em->createQuery($dql)
                    ->setParameter("search", "%$search%");
        } else {
            $dql = "SELECT s FROM BackendBundle:Sponsor s ORDER BY s.id DESC";
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
