<?php

namespace BackendBundle\Entity;

/**
 * ImgBlog
 */
class ImgBlog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $img;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \BackendBundle\Entity\Blog
     */
    private $idBlog;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return ImgBlog
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ImgBlog
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return ImgBlog
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set idBlog
     *
     * @param \BackendBundle\Entity\Blog $idBlog
     *
     * @return ImgBlog
     */
    public function setIdBlog(\BackendBundle\Entity\Blog $idBlog = null)
    {
        $this->idBlog = $idBlog;

        return $this;
    }

    /**
     * Get idBlog
     *
     * @return \BackendBundle\Entity\Blog
     */
    public function getIdBlog()
    {
        return $this->idBlog;
    }
}

