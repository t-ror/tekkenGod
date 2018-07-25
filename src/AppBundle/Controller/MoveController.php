<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 23.7.18
 * Time: 11:39
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Character;
use AppBundle\Entity\Character\Move;
use AppBundle\Form\MoveType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class MoveController extends Controller
{
    /**
     *  @Route("/create/move/{id}", name="create_move")
     */
    public function createAction(Request $request, $id){
        $move = new Move();
        $form = $this->createForm(MoveType::class, $move);
        $form->add('submit', SubmitType::class,[
            'label' => 'Create',
            'attr' => [
                'class' => 'button',
            ]
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $move->setCharacter(
                $this->getDoctrine()
                    ->getManager()
                    ->getRepository(Character::class)
                    ->find($id)
            );
            $move->setEditDate(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($move);
            $em->flush();

            return $this->redirectToRoute('show_character',['id'=>$id]);
        }

        return $this->render('create/move.html.twig', [
            'form' => $form->createView(),
        ]);
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