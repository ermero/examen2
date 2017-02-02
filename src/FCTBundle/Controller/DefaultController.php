<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkBundle\Configuration\Route;
use FCTBundle\Entity\User;
use FCTBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FCTBundle:Default:index.html.twig');
    }
    public function adminAction()
    {
    	return $this->render('FCTBundle:Default:admin.html.twig');
    }
    
}
