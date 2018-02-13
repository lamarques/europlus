<?php
/**
 * Created by PhpStorm.
 * User: lamarques
 * Date: 12/02/2018
 * Time: 17:50
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{

    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function indexAction(){
        return $this->render('default.html.twig');
    }

}