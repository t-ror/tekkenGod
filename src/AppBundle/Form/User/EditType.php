<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 15.8.18
 * Time: 12:14
 */

namespace AppBundle\Form\User;


use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(User::FIELD_IMAGE_FILE, VichImageType::class,[
            'label'=>false,
            'constraints'=>[
                new File([
                    'maxSize'=>'2048k',
                    'mimeTypes'=>['image/jpeg','image/png']
                ]),
            ]
        ]);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }
}