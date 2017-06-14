<?php

namespace BackendBundle\Entity;

/**
 * ImgExotic
 */
class ImgExotic
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
     * @var \BackendBundle\Entity\Exotic
     */
    private $idExotic;


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
     * @return ImgExotic
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
     * @return ImgExotic
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
     * @return ImgExotic
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
     * Set idExotic
     *
     * @param \BackendBundle\Entity\Exotic $idExotic
     *
     * @return ImgExotic
     */
    public function setIdExotic(\BackendBundle\Entity\Exotic $idExotic = null)
    {
        $this->idExotic = $idExotic;

        return $this;
    }

    /**
     * Get idExotic
     *
     * @return \BackendBundle\Entity\Exotic
     */
    public function getIdExotic()
    {
        return $this->idExotic;
    }
}

