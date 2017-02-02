<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FCTBundle\Entity\Conf;
use FCTBundle\Form\ConfType;
use Symfony\Component\HttpFoundation\Request;

class ConfiguracionController extends Controller
{
    public function configuracionAction()
    {
    	//OBTENGO EL REPOSITORIO DE LA ENTITY EMPRESA
    	$repository=$this->getDoctrine()->getRepository('FCTBundle:Maestro');

    	//RECUPERAMOS TODOS LOS REGISTROS DE LA TABLA EMPRESA
    	$maestros=$repository->findAll();

        return $this->render('FCTBundle:Maestro:configuracion.html.twig', array("maestros"=>$maestros));
    }
     public function confAction(Request $request){
        $conf=new Conf();
    	$conf=$this->createForm(EmpresaType::class,$conf);

        $conf->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $conf=$form->getData();
            $doctrine=$this->getDoctrine()->getManager();
            $doctrine->persist($conf);
            $doctrine->flush();
            $roles=['ROLE_SUPER_ADMIN'];
            $conf $conf->setRoles($roles);
        }

    	return $this->render('FCTBundle:Maestro:registro.html.twig', array("form"=>$form->createView() ));


    }
}
