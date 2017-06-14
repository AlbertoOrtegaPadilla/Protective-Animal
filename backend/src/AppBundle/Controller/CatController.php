<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use BackendBundle\Entity\Cat;

class CatController extends Controller {

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
                $breed = (isset($params->breed) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->breed)) ? $params->breed : null;
                $age = (isset($params->age) && ctype_digit($params->age)) ? $params->age : null;
                $description = (isset($params->description)) ? $params->description : null;
                $contact_person = (isset($params->contact_person) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->contact_person)) ? $params->contact_person : null;
                $phone = (isset($params->phone) && ctype_digit($params->phone)) ? $params->phone : null;
                $email = (isset($params->email)) ? $params->email : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_gender = (isset($params->id_gender)) ? $params->id_gender : null;
                $id_size = (isset($params->id_size)) ? $params->id_size : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                $id_status = (isset($params->id_status)) ? $params->id_status : null;

                $emailContraint = new Assert\Email();
                $emailContraint->message = "This email is not valid !!";
                $validate_email = $this->get("validator")->validate($email, $emailContraint);

                if ($name != null && $breed != null && $age != null && $description != null && $contact_person != null && $phone != null && $email != null &&
                        count($validate_email) == 0 && $id_gender != null && $id_size != null && $id_user != null && $id_status != null) {

                    $em = $this->getDoctrine()->getManager();

                    $user = $em->getRepository("BackendBundle:User")->findOneBy(
                            array(
                                "id" => $id_user
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

                    $cat = new Cat();
                    $cat->setName($name);
                    $cat->setBreed($breed);
                    $cat->setAge($age);
                    $cat->setDescription($description);
                    $cat->setContactPerson($contact_person);
                    $cat->setPhone($phone);
                    $cat->setEmail($email);
                    $cat->setUrlVideo($url_video);
                    $cat->setIdGender($gender);
                    $cat->setIdSize($size);
                    $cat->setIdUser($user);
                    $cat->setIdStatus($status);
                    $cat->setCreatedAt($createdAt);
                    $cat->setUpdatedAt($updatedAt);

                    $em->persist($cat);
                    $em->flush();


                    $cat = $em->getRepository("BackendBundle:Cat")->findOneBy(
                            array(
                                "name" => $name,
                                "breed" => $breed,
                                "description" => $description,
                                "contactPerson" => $contact_person,
                                "phone" => $phone,
                                "email" => $email,
                                "urlVideo" => $url_video,
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
                        "data" => $cat
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Cat not created"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Cat not created, params failed"
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

                $cat_id = $id;
                $updatedAt = new \Datetime('now');

                $name = (isset($params->name) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->name)) ? $params->name : null;
                $breed = (isset($params->breed) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->breed)) ? $params->breed : null;
                $age = (isset($params->age) && ctype_digit($params->age)) ? $params->age : null;
                $description = (isset($params->description)) ? $params->description : null;
                $contact_person = (isset($params->contact_person) && preg_match('/^[a-z áéíóúñüÁÉÍÓÚÑÜ]+$/i',$params->contact_person)) ? $params->contact_person : null;
                $phone = (isset($params->phone) && ctype_digit($params->phone)) ? $params->phone : null;
                $email = (isset($params->email)) ? $params->email : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_gender = (isset($params->id_gender)) ? $params->id_gender : null;
                $id_size = (isset($params->id_size)) ? $params->id_size : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                $id_status = (isset($params->id_status)) ? $params->id_status : null;

                $emailContraint = new Assert\Email();
                $emailContraint->message = "This email is not valid !!";
                $validate_email = $this->get("validator")->validate($email, $emailContraint);

                if ($name != null && $breed != null && $age != null && $description != null && $contact_person != null && $phone != null && $email != null &&
                        count($validate_email) == 0 && $id_gender != null && $id_size != null && $id_user != null && $id_status != null) {

                    $em = $this->getDoctrine()->getManager();

                    $cat = $em->getRepository("BackendBundle:Cat")->findOneBy(
                            array(
                                "id" => $cat_id
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
                        $cat->setName($name);
                        $cat->setBreed($breed);
                        $cat->setAge($age);
                        $cat->setDescription($description);
                        $cat->setContactPerson($contact_person);
                        $cat->setPhone($phone);
                        $cat->setEmail($email);
                        $cat->setUrlVideo($url_video);
                        $cat->setIdGender($gender);
                        $cat->setIdSize($size);
                        $cat->setIdStatus($status);
                        $cat->setUpdatedAt($updatedAt);

                        $em->persist($cat);
                        $em->flush();

                        $data = array(
                            "status" => "success",
                            "code" => 200,
                            "data" => "Cat update sucess!!"
                        );
                    } else {
                        $data = array(
                            "status" => "success",
                            "code" => 400,
                            "data" => "Cat update error, you not owner!!"
                        );
                    }
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Cat update error"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Cat not updated, params failed"
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

            $cat_id = ($identity->sub != null) ? $identity->sub : null;

            $em = $this->getDoctrine()->getManager();
            $cat = $em->getRepository("BackendBundle:Cat")->findOneBy(
                    array(
                        "id" => $id
            ));

            if (is_object($cat) && $cat_id != null) {
                if (isset($identity->sub) && ($identity->sub)) {
                    $em->remove($cat);
                    $em->flush();

                    $data = array(
                        "status" => "error",
                        "code" => 200,
                        "msg" => "Cat deleted success"
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Cat no delete"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Cat not delete"
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

    public function catsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT c FROM BackendBundle:Cat c ORDER BY c.id DESC";
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

    public function catAction(Request $request, $id = null) {
        $helpers = $this->get("app.helpers");
        $em = $this->getDoctrine()->getManager();

        $cat = $em->getRepository("BackendBundle:Cat")->findOneBy(array(
            "id" => $id
        ));


        if ($cat) {
            $data = array();
            $data["status"] = 'success';
            $data["code"] = 200;
            $data["data"] = $cat;
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "The cat dont exists"
            );
        }


        return $helpers->json($data);
    }

    public function lastCatsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT c FROM BackendBundle:Cat c ORDER BY c.createdAt DESC";
        $query = $em->createQuery($dql)->setMaxResults(5);
        $cat = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $cat
        );

        return $helpers->json($data);
    }

    public function searchAction(Request $request, $search = null) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        if ($search != null) {
            $dql = "SELECT c FROM BackendBundle:Cat c "
                    . "WHERE UPPER(c.name) LIKE UPPER(:search) OR "
                    . "UPPER(c.breed) LIKE UPPER(:search) ORDER BY c.id DESC";
            $query = $em->createQuery($dql)
                    ->setParameter("search", "%$search%");
        } else {
            $dql = "SELECT c FROM BackendBundle:Cat c ORDER BY c.id DESC";
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
