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
                'constraints'=>[
                    new NotBlank(),
                ],
            ])
            ->add(Character\Move::FIELD_HIT_LEVEL, ChoiceType::class,[
                'label'=>'Hit level: ',
                'constraints'=>[
                    new NotNull(),
                ],
                'choices'=>[
                    'High'=>'High',
                    'Mid'=>'Mid',
                    'Low'=>'Low',
                ],
            ])
            ->add(Character\Move::FIELD_START_UP_FRAME, TextType::class,[
                'label'=>'Start up frame: ',
                'constraints'=>[
                    new NotBlank(),
                    new Type('integer'),
                ],
            ])
            ->add(Character\Move::FIELD_BLOCK_FRAME, TextType::class,[
                'label'=>'Start up frame: ',
                'constraints'=>[
                    new NotBlank(),
                    new Type('integer'),
                ],
            ])
            ->add(Character\Move::FIELD_HIT_FRAME, TextType::class,[
                'label'=>'Hit frame: ',
                'constraints'=>[
                    new NotBlank(),
                    new Type('integer'),
                ],
            ])
            ->add(Character\Move::FIELD_DAMAGE, TextType::class,[
                'label'=>'Damage: ',
                'constraints'=>[
                    new NotBlank(),
                    new Type('integer'),
                ],
            ])
            ->add(Character\Move::FIELD_TRACKING, ChoiceType::class,[
                'label'=>'Tracking: ',
                'constraints'=>[
                    new NotNull(),
                ],
                'choices'=>[
                    'Left'=>'Left',
                    'Right'=>'Right',
                    'Homing'=>'Homing',
                ],
            ])
            ->add(Character\Move::FIELD_RANGE, TextType::class,[
                'label'=>'Range: ',
                'constraints'=>[
                    new NotBlank(),
                ],
            ])
            ->add(Character\Move::FIELD_NOTE, TextareaType::class,[
                'label'=>'Note: ',
            ])
        ;
    }
}