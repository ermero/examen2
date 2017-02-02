<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FCTBundle\Entity\Alumno;
use FCTBundle\Form\AlumnoType;
use Symfony\Component\HttpFoundation\Request;

class AlumnoController extends Controller
{
    public function allAction()
    {
    	//OBTENGO EL REPOSITORIO DE LA ENTITY EMPRESA
    	$repository=$this->getDoctrine()->getRepository('FCTBundle:Alumno');

    	//RECUPERAMOS TODOS LOS REGISTROS DE LA TABLA EMPRESA
    	$alumnos=$repository->findAll();

        return $this->render('FCTBundle:Alumno:all.html.twig', array("alumnos"=>$alumnos));
    }
}
