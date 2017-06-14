<?php

namespace BackendBundle\Entity;

/**
 * Sponsor
 */
class Sponsor
{
    /**
     * @var integer
     */
    private $id;

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
     * @var integer
     */
    private $endCounter;

    /**
     * @var integer
     */
    private $initialCounter;

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
     * @var \BackendBundle\Entity\TypeAnimal
     */
    private $idTypeAnimal;

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
     * Set name
     *
     * @param string $name
     *
     * @return Sponsor
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
     * @return Sponsor
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
     * @return Sponsor
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
     * Set endCounter
     *
     * @param integer $endCounter
     *
     * @return Sponsor
     */
    public function setEndCounter($endCounter)
    {
        $this->endCounter = $endCounter;

        return $this;
    }

    /**
     * Get endCounter
     *
     * @return integer
     */
    public function getEndCounter()
    {
        return $this->endCounter;
    }

    /**
     * Set initialCounter
     *
     * @param integer $initialCounter
     *
     * @return Sponsor
     */
    public function setInitialCounter($initialCounter)
    {
        $this->initialCounter = $initialCounter;

        return $this;
    }

    /**
     * Get initialCounter
     *
     * @return integer
     */
    public function getInitialCounter()
    {
        return $this->initialCounter;
    }

    /**
     * Set contactPerson
     *
     * @param string $contactPerson
     *
     * @return Sponsor
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
     * @return Sponsor
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
     * @return Sponsor
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
     * @return Sponsor
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
     * @return Sponsor
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
     * @return Sponsor
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
     * @return Sponsor
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
     * @return Sponsor
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
     * Set idTypeAnimal
     *
     * @param \BackendBundle\Entity\TypeAnimal $idTypeAnimal
     *
     * @return Sponsor
     */
    public function setIdTypeAnimal(\BackendBundle\Entity\TypeAnimal $idTypeAnimal = null)
    {
        $this->idTypeAnimal = $idTypeAnimal;

        return $this;
    }

    /**
     * Get idTypeAnimal
     *
     * @return \BackendBundle\Entity\TypeAnimal
     */
    public function getIdTypeAnimal()
    {
        return $this->idTypeAnimal;
    }

    /**
     * Set idUser
     *
     * @param \BackendBundle\Entity\User $idUser
     *
     * @return Sponsor
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

