<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 25.7.18
 * Time: 13:56
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class FrameDataHelperController extends Controller
{
    /**
     * @Route("/fdhelper/index", name="fdhelper_index")
     */
    public function indexAction(){
        return $this->render("fdhelper/index.html.twig");
    }
}