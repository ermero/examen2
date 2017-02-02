<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FCTBundle\Entity\Empresa;
use FCTBundle\Form\EmpresaType;
use Symfony\Component\HttpFoundation\Request;

class EmpresaController extends Controller
{
    public function allAction()
    {
    	//OBTENGO EL REPOSITORIO DE LA ENTITY EMPRESA
    	$repository=$this->getDoctrine()->getRepository('FCTBundle:Empresa');

    	//RECUPERAMOS TODOS LOS REGISTROS DE LA TABLA EMPRESA
    	$empresas=$repository->findAll();

        return $this->render('FCTBundle:Empresa:all.html.twig', array("empresas"=>$empresas));
    }
    public function newAction(Request $request){
        $empresa=new Empresa();
    	$form=$this->createForm(EmpresaType::class,$empresa);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $empresa=$form->getData();
            $doctrine=$this->getDoctrine()->getManager();
            $doctrine->persist($empresa);
            $doctrine->flush();
        }

    	return $this->render('FCTBundle:Empresa:new.html.twig', array("form"=>$form->createView() ));


    }
}
