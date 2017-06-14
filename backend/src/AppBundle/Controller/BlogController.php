<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use BackendBundle\Entity\Blog;

class BlogController extends Controller {

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
                $day =  new \Datetime('now');
                
                $title = (isset($params->title)) ? $params->title : null;
                $description = (isset($params->description)) ? $params->description : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_type_blog = (isset($params->id_type_blog)) ? $params->id_type_blog : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;
                

                if ($title != null && $description != null && $id_user != null && $id_type_blog != null) {

                    $em = $this->getDoctrine()->getManager();

                    $user = $em->getRepository("BackendBundle:User")->findOneBy(
                            array(
                                "id" => $id_user
                    ));

                    $type_blog = $em->getRepository("BackendBundle:TypeBlog")->findOneBy(
                            array(
                                "id" => $id_type_blog
                    ));

                    $blog = new Blog();
                    $blog->setTitle($title);
                    $blog->setDescription($description);
                    $blog->setIdTypeBlog($type_blog);
                    $blog->setUrlVideo($url_video);
                    $blog->setIdUser($user);
                    $blog->setCreatedAt($createdAt);
                    $blog->setUpdatedAt($updatedAt);
                    $blog->setDay($day);
                    
                    $em->persist($blog);
                    $em->flush();


                    $Blog = $em->getRepository("BackendBundle:Blog")->findOneBy(
                            array(
                                "title" => $title,
                                "description" => $description,
                                "urlVideo" => $url_video,
                                "idTypeBlog" => $type_blog,
                                "createdAt" => $createdAt,
                                "updatedAt" => $updatedAt,
                                "idUser" => $user
                    ));

                    $data = array(
                        "status" => "success",
                        "code" => 200,
                        "data" => $Blog
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Blog not created"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Blog not created, params failed"
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
                
                $blog_id = $id;
                $createdAt = new \Datetime('now');
                $updatedAt = new \Datetime('now');
                $day =  new \Datetime('now');

                $title = (isset($params->title) && ctype_alpha($params->title)) ? $params->title : null;
                $description = (isset($params->description)) ? $params->description : null;
                $url_video = (isset($params->url_video)) ? $params->url_video : null;
                $id_type_blog = (isset($params->id_type_blog)) ? $params->id_type_blog : null;
                $id_user = ($identity->sub != null) ? $identity->sub : null;

                if ($title != null && $description != null && $id_user != null) {

                    $em = $this->getDoctrine()->getManager();

                    $blog = $em->getRepository("BackendBundle:Blog")->findOneBy(
                            array(
                                "id" => $blog_id
                    ));

                    $type_blog = $em->getRepository("BackendBundle:TypeBlog")->findOneBy(
                            array(
                                "id" => $id_type_blog
                    ));

                    if (isset($identity->sub) && $identity->sub) {
                        $blog->setTitle($title);
                        $blog->setDescription($description);
                        $blog->setIdTypeBlog($type_blog);
                        $blog->setUrlVideo($url_video);
                        $blog->setCreatedAt($createdAt);
                        $blog->setUpdatedAt($updatedAt);
                        $blog->setDay($day);

                        $em->persist($blog);
                        $em->flush();

                        $data = array(
                            "status" => "success",
                            "code" => 200,
                            "data" => "Blog update sucess!!"
                        );
                    } else {
                        $data = array(
                            "status" => "success",
                            "code" => 400,
                            "data" => "Blog update error, you not owner!!"
                        );
                    }
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Blog update error"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Blog not updated, params failed"
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

            $blog_id = ($identity->sub != null) ? $identity->sub : null;

            $em = $this->getDoctrine()->getManager();
            $blog = $em->getRepository("BackendBundle:Blog")->findOneBy(
                    array(
                        "id" => $id
            ));

            if (is_object($blog) && $blog_id != null) {
                if (isset($identity->sub) && ($identity->sub)) {
                    $em->remove($blog);
                    $em->flush();

                    $data = array(
                        "status" => "error",
                        "code" => 200,
                        "msg" => "Blog deleted success"
                    );
                } else {
                    $data = array(
                        "status" => "error",
                        "code" => 400,
                        "msg" => "Blog not delete"
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "code" => 400,
                    "msg" => "Blog not delete"
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

    public function blogsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT b FROM BackendBundle:Blog b ORDER BY b.id DESC";
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

    public function blogAction(Request $request, $id = null) {
        $helpers = $this->get("app.helpers");
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository("BackendBundle:Blog")->findOneBy(array(
            "id" => $id
        ));


        if ($blog) {
            $data = array();
            $data["status"] = 'success';
            $data["code"] = 200;
            $data["data"] = $blog;
        } else {
            $data = array(
                "status" => "error",
                "code" => 400,
                "msg" => "The Blog dont exists"
            );
        }


        return $helpers->json($data);
    }

    public function lastBlogsAction(Request $request) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT b FROM BackendBundle:Blog b ORDER BY b.createdAt DESC";
        $query = $em->createQuery($dql)->setMaxResults(5);
        $blog = $query->getResult();

        $data = array(
            "status" => "success",
            "data" => $blog
        );

        return $helpers->json($data);
    }

    public function searchAction(Request $request, $search = null) {
        $helpers = $this->get("app.helpers");

        $em = $this->getDoctrine()->getManager();

        if ($search != null) {
            $dql = "SELECT b FROM BackendBundle:Blog b "
                    . "WHERE UPPER(b.title) LIKE UPPER(:search) ORDER BY b.id DESC";
            $query = $em->createQuery($dql)
                    ->setParameter("search", "%$search%");
        } else {
            $dql = "SELECT b FROM BackendBundle:Blog b ORDER BY b.id DESC";
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
