<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 13.7.18
 * Time: 16:09
 */

namespace AppBundle\Entity;

use AppBundle\Entity\Character\Move;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * Character
 *
 * @ORM\Table(name="app_characters")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CharacterRepository")
 * @Vich\Uploadable
 */
class Character
{
    const FIELD_ID = 'id';
    const FIELD_NAME = 'name';
    const FIELD_DIFFICULTY = 'difficulty';
    const FIELD_NATIONALITY = 'nationality';
    const FIELD_FIGHT_STYLE = 'fightStyle';
    const FIELD_MINIATURE_FILE = 'miniatureFile';
    const FIELD_IMAGE_FILE = 'imageFile';
    const FIELD_MOVES = 'moves';

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
     * @ORM\Column(name="name", type="string", length=255)
     *
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulty", type="string", length=255)
     *
     */
    private $difficulty;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255)
     *
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="fight_style", type="string", length=255)
     *
     */
    private $fightStyle;

    /**
     * @var Move[]|Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Character\Move", mappedBy="character", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $moves;

    /**
     * @Vich\UploadableField(mapping="character_image", fileNameProperty="image")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="character_miniature", fileNameProperty="miniature")
     *
     * @var File
     */
    private $miniatureFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $miniature;

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
     * @return Character
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
     * Set difficulty
     *
     * @param string $difficulty
     *
     * @return Character
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return string
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Character
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set fightStyle
     *
     * @param string $fightStyle
     *
     * @return Character
     */
    public function setFightStyle($fightStyle)
    {
        $this->fightStyle = $fightStyle;

        return $this;
    }

    /**
     * Get fightStyle
     *
     * @return string
     */
    public function getFightStyle()
    {
        return $this->fightStyle;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->moves = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add move
     *
     * @param \AppBundle\Entity\Character\Move $move
     *
     * @return Character
     */
    public function addMove(\AppBundle\Entity\Character\Move $move)
    {
        $this->moves[] = $move;

        return $this;
    }

    /**
     * Remove move
     *
     * @param \AppBundle\Entity\Character\Move $move
     */
    public function removeMove(\AppBundle\Entity\Character\Move $move)
    {
        $this->moves->removeElement($move);
    }

    /**
     * Get moves
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMoves()
    {
        return $this->moves;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getImageSize()
    {
        return $this->imageSize;
    }

    /**
     * @param int $imageSize
     */
    public function setImageSize($imageSize)
    {
        $this->imageSize = $imageSize;
    }

    /**
     * @return File
     */
    public function getMiniatureFile()
    {
        return $this->miniatureFile;
    }

    /**
     * @param File $miniatureFile
     */
    public function setMiniatureFile($miniatureFile)
    {
        $this->miniatureFile = $miniatureFile;
    }

    /**
     * @return string
     */
    public function getMiniature()
    {
        return $this->miniature;
    }

    /**
     * @param string $miniature
     */
    public function setMiniature($miniature)
    {
        $this->miniature = $miniature;
    }

    /**
     * @return int
     */
    public function getMiniatureSize()
    {
        return $this->miniatureSize;
    }

    /**
     * @param int $miniatureSize
     */
    public function setMiniatureSize($miniatureSize)
    {
        $this->miniatureSize = $miniatureSize;
    }

}
