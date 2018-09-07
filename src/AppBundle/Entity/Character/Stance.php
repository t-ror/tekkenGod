<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 7.9.18
 * Time: 16:00
 */

namespace AppBundle\Entity\Character;

use AppBundle\Entity\Character;
use Doctrine\ORM\Mapping as ORM;

/**
 * Move
 *
 * @ORM\Table(name="app_stances")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StanceRepository")
 */
class Stance
{
    const FIELD_ID = "id";
    const FIELD_NAME = "name";
    const FIELD_STANCES = "stances";

    /**
     * @var int
     *
     * @ORM\Column(name="`id`", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var Character|null
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Character", inversedBy="stances")
     *
     */
    private $character;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Stance
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
     * Set character
     *
     * @param \AppBundle\Entity\Character $character
     *
     * @return Stance
     */
    public function setCharacter(\AppBundle\Entity\Character $character = null)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character
     *
     * @return \AppBundle\Entity\Character
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
