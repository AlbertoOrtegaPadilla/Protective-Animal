<?php

namespace BackendBundle\Entity;

/**
 * Gender
 */
class Gender
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $gender;


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
     * Set gender
     *
     * @param string $gender
     *
     * @return Gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }
}

