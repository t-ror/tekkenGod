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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(Character::FIELD_NAME, TextType::class,[
                'label'=>'Name: ',
                'constraints'=>[
                    new NotBlank(),
                ],
            ])
            ->add(Character::FIELD_DIFFICULTY, ChoiceType::class,[
                'label'=>'Difficulty: ',
                'constraints'=>[
                    new NotNull(),
                ],
                'choices'=>[
                    'Easy'=>'Easy',
                    'Medium'=>'Medium',
                    'Hard'=>'Hard',
                ],
            ])
            ->add(Character::FIELD_NATIONALITY, TextType::class, [
                'label'=>'Nationality: ',
                'constraints'=>[
                    new NotBlank(),
                ],
            ])
            ->add(Character::FIELD_FIGHT_STYLE, TextType::class, [
                'label'=>'Fighting style: ',
                'constraints'=>[
                    new NotBlank(),
                ],
            ])
            ->add(Character::FIELD_IMAGE_FILE, VichImageType::class,[
                'label'=> false,
                'constraints'=>[
                    new File([
                        'maxSize'=>'2048k',
                        'mimeTypes'=>['image/jpeg','image/png']
                    ]),
                ]
            ])
            ->add(Character::FIELD_MINIATURE_FILE, VichImageType::class,[
                'label'=>false,'constraints'=>[
                    new File([
                        'maxSize'=>'4096k',
                        'mimeTypes'=>['image/jpeg','image/png']
                    ]),
                ]

            ])
        ;
    }
}