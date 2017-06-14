<?php

namespace BackendBundle\Entity;

/**
 * ImgAnimal
 */
class ImgAnimal
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
     * @var \BackendBundle\Entity\Sponsor
     */
    private $idSponsor;


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
     * @return ImgAnimal
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
     * @return ImgAnimal
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
     * @return ImgAnimal
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
     * Set idSponsor
     *
     * @param \BackendBundle\Entity\Sponsor $idSponsor
     *
     * @return ImgAnimal
     */
    public function setIdSponsor(\BackendBundle\Entity\Sponsor $idSponsor = null)
    {
        $this->idSponsor = $idSponsor;

        return $this;
    }

    /**
     * Get idSponsor
     *
     * @return \BackendBundle\Entity\Sponsor
     */
    public function getIdSponsor()
    {
        return $this->idSponsor;
    }
}

