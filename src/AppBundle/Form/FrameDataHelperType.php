<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 2.8.18
 * Time: 10:46
 */

namespace AppBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class FrameDataHelperType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('character1', EntityType::class,[
                'label'=>'Your character:',
                'class'=> 'AppBundle:Character',
            ])
            ->add('character2', EntityType::class,[
                'label'=>'Opponent:',
                'class'=> 'AppBundle:Character',
            ])
            ->add('submit',SubmitType::class, [
                'label'=>'OK',
                'attr' => [
                    'class' => 'button',
                ]
            ])
        ;
    }
}