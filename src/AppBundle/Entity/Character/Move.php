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
    const FIELD_EDIT_DATE = 'editDate';
    const FIELD_CHARACTER = 'character';
    const FIELD_LAUNCHER = 'launcher';
    const FIELD_COMMAND_HTML = 'commandHTML';

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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="hit_level", type="string", length=255, nullable=true)
     *
     */
    private $hitLevel;

    /**
     * @var int
     *
     * @ORM\Column(name="damage", type="integer", nullable=true)
     *
     */
    private $damage;

    /**
     * @var int
     *
     * @ORM\Column(name="start_up_frame", type="integer", nullable=true)
     *
     */
    private $startUpFrame;

    /**
     * @var int
     *
     * @ORM\Column(name="block_frame", type="integer", nullable=true)
     *
     */
    private $blockFrame;

    /**
     * @var string
     *
     * @ORM\Column(name="hit_frame", type="string", length=255, nullable=true)
     *
     */
    private $hitFrame;

    /**
     * @var string
     *
     * @ORM\Column(name="counter_hit", type="string", length=255, nullable=true)
     *
     */
    private $counterHit;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true, nullable=true)
     *
     */
    private $note;

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
     * @var string
     *
     * @ORM\Column(name="commandHTML", type="string" , nullable=true, length=1000)
    */
    private $commandHTML;

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

        $this->setCommandHTML($command);

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

    /**
     * @return string
     */
    public function getCommandHTML()
    {
        return $this->commandHTML;
    }

    /**
     * @param string $commandHTML
     */
    public function setCommandHTML($commandHTML)
    {
        $endCommand = "";
        if (strpos($commandHTML,'*') !== false){
            $commandHTML = str_replace('*',',', $commandHTML);
            $endCommand .= "Hold";
        }
        //$this->commandHTML = $commandHTML;
        if ($commandHTML != null){
            $commands = explode(',',$commandHTML);
            foreach ($commands as $command){

                if (strpos($command,'+')) {
                    $direction = "";
                    $tempCommand = explode('+', $command);
                    if (strpos($command, 'f') !== false ||
                        strpos($command, 'b') !== false ||
                        strpos($command, 'u') !== false ||
                        strpos($command, 'd') !== false ||
                        strpos($command, 'd/f') !== false ||
                        strpos($command, 'd/b') !== false ||
                        strpos($command, 'u/f') !== false ||
                        strpos($command, 'u/b') !== false
                    ) {
                        $direction = $this->getTextCommand($tempCommand[0], '+');
                        $tempCommand[0] = "";
                    }
                    $endCommand .= $direction . $this->getTextCommand($this->convertToString($tempCommand), '+');
                }elseif (strpos($command,'~')){
                    $tempCommand = $command = explode('~',$command);
                    $tempText = "<img src='/files/images/controls/[.png'>";
                    foreach ($tempCommand as $tempCom) {
                        $tempText .= $this->getTextCommand($tempCom);
                    }
                    $tempText .= "<img src='/files/images/controls/].png'>";
                    $endCommand .= $tempText;
                }else{
                    $endCommand .= $this->getCommand($command);
                }
            }
            $this->commandHTML = $endCommand;
        }
    }


    public function __toString()
    {
        return $this->name.', '.$this->command.', '.$this->startUpFrame.', '.$this->blockFrame;
    }

    private function getTextCommand($command, $separator = ""){
        $commands = [
            "f" => "<img src='/files/images/controls/f".$separator.".png'>",
            "b" => "<img src='/files/images/controls/b".$separator.".png'>",
            "u" => "<img src='/files/images/controls/u".$separator.".png'>",
            "u/b" => "<img src='/files/images/controls/ub".$separator.".png'>",
            "u/f" => "<img src='/files/images/controls/uf".$separator.".png'>",
            "d" => "<img src='/files/images/controls/d".$separator.".png'>",
            "d/b" => "<img src='/files/images/controls/db".$separator.".png'>",
            "d/f" => "<img src='/files/images/controls/df".$separator.".png'>",
            "1" => "<img src='/files/images/controls/1.png'>",
            "2" => "<img src='/files/images/controls/2.png'>",
            "3" => "<img src='/files/images/controls/3.png'>",
            "4" => "<img src='/files/images/controls/4.png'>",
            "ws" => "While standing",
            "wr" => "While running",
            "wc" => "While crouching",
            "od" => "Opponent down",
            "wh" => "When hit",
            "ir" => "In rage",
            "*" => "Hold",
            "n" => "<img src='/files/images/controls/n.png'>",
            "12" => "<img src='/files/images/controls/1+2.png'>",
            "13" => "<img src='/files/images/controls/1+3.png'>",
            "14" => "<img src='/files/images/controls/1+4.png'>",
            "23" => "<img src='/files/images/controls/2+3.png'>",
            "24" => "<img src='/files/images/controls/2+4.png'>",
            "34" => "<img src='/files/images/controls/3+4.png'>",
            "123" => "<img src='/files/images/controls/1+2+3.png'>",
            "124" => "<img src='/files/images/controls/1+2+4.png'>",
            "134" => "<img src='/files/images/controls/1+3+4.png'>",
            "234" => "<img src='/files/images/controls/2+3+4.png'>",
            "1234" => "<img src='/files/images/controls/1+2+3+4.png'>",
        ];

        return $commands[$command];
    }

    private function convertToString($stringArray){
        sort($stringArray);
        return implode("",$stringArray);
    }

}
