<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 23.7.18
 * Time: 11:39
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Character;
use AppBundle\Form\CharacterType;
use AppBundle\Service\FileUploader;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

class CharacterController extends Controller
{
    /**
     *  @Route("/create/character", name="create_character")
     */
    public function createAction(Request $request){
        $character = new Character();
        $form = $this->createForm(CharacterType::class, $character);
        $form
            ->add('submit', SubmitType::class,[
                'label' => 'Create',
                'attr' => [
                    'class' => 'button',
                ]
            ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($character);
            $em->flush();

            return $this->redirectToRoute('list_character');
        }

        return $this->render('create/character.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *  @Route("/list/character", name="list_character")
     */
    public function listAction(){
        $characters = $this->getDoctrine()
            ->getManager()
            ->getRepository(Character::class)
            ->findAll(['name'=>'ASC']);

        return $this->render('list/character.html.twig', [
            'characters' => $characters,
        ]);
    }

    /**
     * @Route("/show/character/{id}", name="show_character")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id){
        $character = $this->getDoctrine()
            ->getManager()
            ->getRepository(Character::class)
            ->find($id);

        return $this->render('show/character.html.twig',[
           'character' => $character
        ]);
    }

    /**
     * @Route("/delete/character/{id}", name="delete_character")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id){
        $character = $this->getDoctrine()
            ->getRepository(Character::class)
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($character);
        $em->flush();

        return $this->redirectToRoute('list_character');
    }

    /**
     * @Route("/edit/character/{id}", name="edit_character")
     *
     */
    public function editAction(Request $request, $id){
        $character = $this->getDoctrine()
            ->getRepository(Character::class)
            ->find($id);

        $form = $this->createForm(CharacterType::class, $character);
        $form->remove(Character::FIELD_MINIATURE_FILE);
        $form->remove(Character::FIELD_IMAGE_FILE);
        $form->add('submit', SubmitType::class,[
            'label' => 'Edit',
            'attr' => [
                'class' => 'button',
            ]
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($character);
            $em->flush();

            return $this->redirectToRoute('list_character');
        }

        return $this->render('edit/character.html.twig', [
            'form' => $form->createView(),
            'character'=>$character,
        ]);
    }
}