<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Food.
 *
 * @ORM\Table(name="food")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FoodRepository")
 */
class Food
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="wording", type="string", length=255)
     */
    private $wording;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FoodType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $foodType;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set wording.
     *
     * @param string $wording
     *
     * @return Food
     */
    public function setWording($wording)
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * Get wording.
     *
     * @return string
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * Set foodType.
     *
     * @param \AppBundle\Entity\FoodType $foodType
     *
     * @return Food
     */
    public function setFoodType(\AppBundle\Entity\FoodType $foodType)
    {
        $this->foodType = $foodType;

        return $this;
    }

    /**
     * Get foodType.
     *
     * @return \AppBundle\Entity\FoodType
     */
    public function getFoodType()
    {
        return $this->foodType;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getWording();
    }
}
