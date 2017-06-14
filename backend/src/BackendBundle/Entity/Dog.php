<?php

namespace BackendBundle\Entity;

/**
 * Dog
 */
class Dog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $breed;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $contactPerson;

    /**
     * @var integer
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $urlVideo;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \BackendBundle\Entity\Gender
     */
    private $idGender;

    /**
     * @var \BackendBundle\Entity\Size
     */
    private $idSize;

    /**
     * @var \BackendBundle\Entity\Status
     */
    private $idStatus;

    /**
     * @var \BackendBundle\Entity\User
     */
    private $idUser;


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
     * Set breed
     *
     * @param string $breed
     *
     * @return Dog
     */
    public function setBreed($breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return string
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dog
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Dog
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dog
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return Dog
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    /**
     * Get contactPerson
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Dog
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Dog
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set urlVideo
     *
     * @param string $urlVideo
     *
     * @return Dog
     */
    public function setUrlVideo($urlVideo)
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    /**
     * Get urlVideo
     *
     * @return string
     */
    public function getUrlVideo()
    {
        return $this->urlVideo;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Dog
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
     * @return Dog
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
     * Set idGender
     *
     * @param \BackendBundle\Entity\Gender $idGender
     *
     * @return Dog
     */
    public function setIdGender(\BackendBundle\Entity\Gender $idGender = null)
    {
        $this->idGender = $idGender;

        return $this;
    }

    /**
     * Get idGender
     *
     * @return \BackendBundle\Entity\Gender
     */
    public function getIdGender()
    {
        return $this->idGender;
    }

    /**
     * Set idSize
     *
     * @param \BackendBundle\Entity\Size $idSize
     *
     * @return Dog
     */
    public function setIdSize(\BackendBundle\Entity\Size $idSize = null)
    {
        $this->idSize = $idSize;

        return $this;
    }

    /**
     * Get idSize
     *
     * @return \BackendBundle\Entity\Size
     */
    public function getIdSize()
    {
        return $this->idSize;
    }

    /**
     * Set idStatus
     *
     * @param \BackendBundle\Entity\Status $idStatus
     *
     * @return Dog
     */
    public function setIdStatus(\BackendBundle\Entity\Status $idStatus = null)
    {
        $this->idStatus = $idStatus;

        return $this;
    }

    /**
     * Get idStatus
     *
     * @return \BackendBundle\Entity\Status
     */
    public function getIdStatus()
    {
        return $this->idStatus;
    }

    /**
     * Set idUser
     *
     * @param \BackendBundle\Entity\User $idUser
     *
     * @return Dog
     */
    public function setIdUser(\BackendBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \BackendBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}

