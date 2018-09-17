<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 19.7.18
 * Time: 14:59
 */

namespace AppBundle\Form;


use AppBundle\Entity\Character;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

class MoveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(Character\Move::FIELD_NAME, TextType::class,[
                'label'=>'Name: ',
                'required'=>false,
            ])
            ->add(Character\Move::FIELD_COMMAND, TextType::class,[
                'label'=>'Command: ',
                'constraints'=>[
                    new NotBlank(),
                ],
            ])
            ->add(Character\Move::FIELD_HIT_LEVEL, TextType::class,[
                'label'=>'Hit level: ',
                'required'=>false,
            ])
            ->add(Character\Move::FIELD_START_UP_FRAME, IntegerType::class,[
                'label'=>'Start up frame: ',
                'required'=>false,
                'constraints'=>[
                    new Type('integer'),
                ],
            ])
            ->add(Character\Move::FIELD_BLOCK_FRAME, IntegerType::class,[
                'label'=>'Block frame: ',
                'required'=>false,
                'constraints'=>[
                    new Type('integer'),
                ],
            ])
            ->add(Character\Move::FIELD_HIT_FRAME, TextType::class,[
                'label'=>'Hit frame: ',
                'required'=>false,
            ])
            ->add(Character\Move::FIELD_DAMAGE, IntegerType::class,[
                'label'=>'Damage: ',
                'required'=>false,
                'constraints'=>[
                    new Type('integer'),
                ],
            ])
            ->add(Character\Move::FIELD_COUNTER_HIT, TextType::class,[
                'label'=>'Counter hit: ',
                'required'=>false,
            ])
            ->add(Character\Move::FIELD_NOTE, TextareaType::class,[
                'label'=>'Note: ',
                'required'=>false,
            ])
        ;
    }
}