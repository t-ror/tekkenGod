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
    public function createAction(Request $request, $id)
    {
        $move = new Move();
        $form = $this->createForm(MoveType::class, $move);
        $form->add('submit', SubmitType::class, [
            'label' => 'Create',
            'attr' => [
                'class' => 'button',
            ]
        ])->add('submitNext', SubmitType::class, [
            'label' => 'Create and add next',
            'attr' => [
                'class' => 'button',
            ]
        ]);
        $form->handleRequest($request);
        $stances = $this->getDoctrine()
            ->getRepository(Move::class)
            ->getStances($id);
        if ($form->isSubmitted() && $form->isValid()) {
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
            if ($form->get('submitNext')->isClicked()){
                return $this->redirectToRoute('create_move', ['id' => $id]);
            }
            return $this->redirectToRoute('show_character', ['id' => $id]);
        }

        return $this->render('create/move.html.twig', [
            'form' => $form->createView(),
            'stances' => $stances,
        ]);
    }

    /**
     * @Route("delete/move/{id}", name="delete_move")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function deleteAction($id){
       $move = $this->getDoctrine()
           ->getRepository(Move::class)
           ->find($id);
       $charId = $move->getCharacter()->getId();

       $em = $this->getDoctrine()->getManager();
       $em->remove($move);
       $em->flush();

       return $this->redirectToRoute('show_character',['id'=>$charId]);
    }
}