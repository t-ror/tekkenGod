<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 13.7.18
 * Time: 16:10
 */

namespace AppBundle\Entity\Character;

use AppBundle\Entity\Character;
use Doctrine\ORM\Mapping as ORM;

const FIELD_ID = 'id';
const FIELD_NAME = 'name';
const FIELD_COMMAND = 'command';
const FIELD_HIT_LEVEL = 'hitLevel';
const FIELD_DAMAGE = 'damage';
const FIELD_START_UP_FRAME = 'startUpFrame';
const FIELD_HIT_FRAME = 'hitFrame';
const FIELD_BLOCK_FRAME = 'blockFrame';
const FIELD_COUNTER_HIT = 'counterHit';
const FIELD_NOTE = 'note';
const FIELD_TRACKING = 'tracking';
const FIELD_RANGE = 'range';
const FIELD_EDIT_DATE = 'editDate';
const FIELD_CHARACTER = 'character';

/**
 * Move
 *
 * @ORM\Table(name="app_moves")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MoveRepository")
 */
class Move
{
    const FIELD_ID = 'id';
    const FIELD_NAME = 'name';
    const FIELD_COMMAND = 'command';
    const FIELD_HIT_LEVEL = 'hitLevel';
    const FIELD_DAMAGE = 'damage';
    const FIELD_START_UP_FRAME = 'startUpFrame';
    const FIELD_HIT_FRAME = 'hitFrame';
    const FIELD_BLOCK_FRAME = 'blockFrame';
    const FIELD_COUNTER_HIT = 'counterHit';
    const FIELD_NOTE = 'note';
    const FIELD_TRACKING = 'tracking';
    const FIELD_RANGE = 'range';
    const FIELD_EDIT_DATE = 'editDate';
    const FIELD_CHARACTER = 'character';

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
     * @ORM\Column(name="command", type="string", length=255)
     *
     */
    private $command;

    /**
     * @var string
     *
     * @ORM\Column(name="hit_level", type="string", length=255)
     *
     */
    private $hitLevel;

    /**
     * @var int
     *
     * @ORM\Column(name="damage", type="integer")
     *
     */
    private $damage;

    /**
     * @var int
     *
     * @ORM\Column(name="start_up_frame", type="integer")
     *
     */
    private $startUpFrame;

    /**
     * @var int
     *
     * @ORM\Column(name="block_frame", type="integer")
     *
     */
    private $blockFrame;

    /**
     * @var int
     *
     * @ORM\Column(name="hit_frame", type="integer")
     *
     */
    private $hitFrame;

    /**
     * @var string
     *
     * @ORM\Column(name="counter_hit", type="string", length=255)
     *
     */
    private $counterHit;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     *
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="tracking", type="string", length=255)
     *
     */
    private $tracking;

    /**
     * @var string
     *
     * @ORM\Column(name="range", type="string", length=255)
     *
     */
    private $range;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="edit_date", type="datetime")
     */
    private $editDate;

    /**
     * @var Character|null
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Character", inversedBy="moves")
     *
     */
    private $character;



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
     * @return Move
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
     * Set command
     *
     * @param string $command
     *
     * @return Move
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Set hitLevel
     *
     * @param string $hitLevel
     *
     * @return Move
     */
    public function setHitLevel($hitLevel)
    {
        $this->hitLevel = $hitLevel;

        return $this;
    }

    /**
     * Get hitLevel
     *
     * @return string
     */
    public function getHitLevel()
    {
        return $this->hitLevel;
    }

    /**
     * Set damage
     *
     * @param integer $damage
     *
     * @return Move
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * Get damage
     *
     * @return integer
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Set startUpFrame
     *
     * @param integer $startUpFrame
     *
     * @return Move
     */
    public function setStartUpFrame($startUpFrame)
    {
        $this->startUpFrame = $startUpFrame;

        return $this;
    }

    /**
     * Get startUpFrame
     *
     * @return integer
     */
    public function getStartUpFrame()
    {
        return $this->startUpFrame;
    }

    /**
     * Set blockFrame
     *
     * @param integer $blockFrame
     *
     * @return Move
     */
    public function setBlockFrame($blockFrame)
    {
        $this->blockFrame = $blockFrame;

        return $this;
    }

    /**
     * Get blockFrame
     *
     * @return integer
     */
    public function getBlockFrame()
    {
        return $this->blockFrame;
    }

    /**
     * Set hitFrame
     *
     * @param integer $hitFrame
     *
     * @return Move
     */
    public function setHitFrame($hitFrame)
    {
        $this->hitFrame = $hitFrame;

        return $this;
    }

    /**
     * Get hitFrame
     *
     * @return integer
     */
    public function getHitFrame()
    {
        return $this->hitFrame;
    }

    /**
     * Set counterHit
     *
     * @param string $counterHit
     *
     * @return Move
     */
    public function setCounterHit($counterHit)
    {
        $this->counterHit = $counterHit;

        return $this;
    }

    /**
     * Get counterHit
     *
     * @return string
     */
    public function getCounterHit()
    {
        return $this->counterHit;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Move
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set tracking
     *
     * @param string $tracking
     *
     * @return Move
     */
    public function setTracking($tracking)
    {
        $this->tracking = $tracking;

        return $this;
    }

    /**
     * Get tracking
     *
     * @return string
     */
    public function getTracking()
    {
        return $this->tracking;
    }

    /**
     * Set range
     *
     * @param string $range
     *
     * @return Move
     */
    public function setRange($range)
    {
        $this->range = $range;

        return $this;
    }

    /**
     * Get range
     *
     * @return string
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * Set editDate
     *
     * @param \DateTime $editDate
     *
     * @return Move
     */
    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;

        return $this;
    }

    /**
     * Get editDate
     *
     * @return \DateTime
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * Set character
     *
     * @param \AppBundle\Entity\Character $character
     *
     * @return Move
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
}
