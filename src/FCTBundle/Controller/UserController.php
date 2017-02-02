<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkBundle\Configuration\Route;
use FCTBundle\Entity\User;
use FCTBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Author;

class UserController extends Controller
{
    public function userAction()
    {
        return $this->render('FCTBundle:User:index.html.twig');
    }
    public function registerAction(Request $request){
        $user=new User();
    	$form=$this->createForm(UserType::class,$user);


        $form->handleRequest($request);
        //validación de formularios
        $validator=$this->get('validator');
        $errors= $validator->validate($user);
        

        if($form->isSubmitted() && $form->isValid()){
        	$password=$this->get('security.password_encoder')
        		->encodePassword($user, $user->getPlainPassword());

        	$user->setPassword($password);
            
            $user=$form->getData();

            //creamos roles de usuario

            $roles= ["ROLE_USUARIO"];
            $user->setRoles($roles);

            $doctrine=$this->getDoctrine()->getManager();
            $doctrine->persist($user);

            $doctrine->flush();

            return new Response("Usuario registrado!");
        }

    	return $this->render('FCTBundle:User:register.html.twig', array("form"=>$form->createView()  ));


    }
    public function loginAction(Request $request){
        //autenticacion
        $autenticacion=$this->get('security.authentication_utils');

        //login de error
        $error=$autenticacion->getLastAuthenticationError();

        //el último usuario que hemos insertado
        $ultimo_usuario=$autenticacion->getLastUsername();

        return $this->render('FCTBundle:User:login.html.twig',array(
            'ultimo_usuario'=>$ultimo_usuario,
            'error' =>$error,
        ));
    }
}
