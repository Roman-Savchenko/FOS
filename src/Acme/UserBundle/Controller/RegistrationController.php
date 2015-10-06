<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistrationController extends Controller
{
    /**
     * @Route ("/user", name = "new_user")
     */

    public function userAction()
    {
        $a = 5;
    }

    /**
     * @Route ("/register", name = "new_register")
     */

    public function registrationAction()
    {
        return $this->render('AcmeUserBundle:Registration:register.html.twig');
    }
}