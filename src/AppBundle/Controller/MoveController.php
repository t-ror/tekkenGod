<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 23.7.18
 * Time: 11:39
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MoveController extends Controller
{
    /**
     *  @Route("/create/move/{id}", name="create_move")
     */
    public function createAction(){
//        $entityObj = new Character();
//        $form = $this->createForm(CharacterType::class, $entityObj);
//        $form->add('submit', SubmitType::class,[
//            'label' => 'Create',
//            'attr' => [
//                'class' => 'button',
//            ]
//        ]);
//        return $this->render('create/character.html.twig', [
//            'form' => $form->createView(),
//        ]);
    }

    /**
     *  @Route("/list/moves/{id}", name="list_move")
     */
    public function listAction(){
//        $characters = $this->getDoctrine()
//            ->getManager()
//            ->getRepository(Character::class)
//            ->findAll();
//
//        return $this->render('list/character.html.twig', [
//            'characters' => $characters,
//        ]);
    }
}