<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 25.7.18
 * Time: 13:56
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Character;
use AppBundle\Form\FrameDataHelperType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FrameDataHelperController extends Controller
{
    /**
     * @Route("/fdhelper/index", name="fdhelper_index")
     */
    public function indexAction(Request $request){
        $form = $this->createForm(FrameDataHelperType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $myCharacter = $form->get('character1')->getData();
            $opponent = $form->get('character2')->getData();

            return $this->redirectToRoute('fdhelper_compare',['opponent'=>$opponent->getId(),'character'=>$myCharacter->getId()]);
        }

        return $this->render("fdhelper/index.html.twig",[
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/fdhelper/compare/{opponent}/{character}", name="fdhelper_compare")
     */
    public function compareAction(Character $opponent,Character $character, Request $request){
        $form = $this->createFormBuilder()
            ->add('move', EntityType::class,[
                'label'=>'Choose move you want to punish:',
                'class'=> 'AppBundle\Entity\Character\Move',
                'query_builder'=>function(EntityRepository $er) use ($opponent){
                    return $er->createQueryBuilder('m')
                        ->where('m.character= :character')
                        ->setParameter('character',$opponent);
                }
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Find punishes'
            ])
            ->getForm();

        $moves = null;

        $form->handleRequest($request);

        if ($form->get('move')->getData() != null){
            $moves = $this->getDoctrine()
                ->getRepository(Character\Move::class)
                ->getPunishes($form->get('move')->getData(), $character->getId());
        }

        return $this->render(':fdhelper:compare.html.twig',[
            'form'=>$form->createView(),
            'moves'=>$moves,
            'character'=>$character,
            'opponent'=>$opponent,
        ]);
    }
}