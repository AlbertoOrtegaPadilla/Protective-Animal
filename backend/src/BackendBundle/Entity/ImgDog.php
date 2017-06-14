<?php

namespace BackendBundle\Entity;

/**
 * ImgDog
 */
class ImgDog
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
     * @var \BackendBundle\Entity\Dog
     */
    private $idDog;


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
     * @return ImgDog
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
     * @return ImgDog
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
     * @return ImgDog
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
     * Set idDog
     *
     * @param \BackendBundle\Entity\Dog $idDog
     *
     * @return ImgDog
     */
    public function setIdDog(\BackendBundle\Entity\Dog $idDog = null)
    {
        $this->idDog = $idDog;

        return $this;
    }

    /**
     * Get idDog
     *
     * @return \BackendBundle\Entity\Dog
     */
    public function getIdDog()
    {
        return $this->idDog;
    }
}

