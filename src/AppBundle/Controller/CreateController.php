<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 20.7.18
 * Time: 11:25
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Character;
use AppBundle\Form\CharacterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class CreateController extends Controller
{
    /**
     * @Route("/create", name="create")
     */
    public function createAction(){
        $entityObj = new Character();
        $form = $this->createForm(CharacterType::class, $entityObj);

        $form->add('submit', SubmitType::class,[
            'label' => 'Create',
            'attr' => [
                'class' => 'button',
            ]
        ]);

        return $this->render('create/character.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}