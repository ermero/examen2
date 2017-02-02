<?php

namespace FCTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
	function empresaToArray($empresa){
		$nombre=$empresa->getNombre();
		$direccion=$empresa->getDireccion();
		$cp=$empresa->getCp();
		$telefon1=$empresa->getTelefono1();
		$telefon2=$empresa->getTelefono2();
		$creacion=$empresa->getFechaCreacion();

		return array('nombre'=>$nombre,'direccion'=>$direccion,'cp'=>$cp,'telefono1'=>$telefon1,'telefono2'=>$telefon2,'fecha'=>$creacion);
	}
    public function getAction()
    {
    	$repository = $this->getDoctrine()->getRepository('FCTBundle:Empresa');
        $empresas = $repository->findAll();

        //pasar clientes de objetos a array
        $data = array('empresas' => array());
        foreach ($empresas as $empresa) {
            $data['empresas'][] = $this->empresaToArray($empresa);
        }
        //transforma array en json
        $response = new JsonResponse($data, 400);
        //devolvemos json
        return $response;
        //return $this->json($empresas);*/
    }
     public function postAction()
    {
        return $this->render('FCTBundle:Default:index.html.twig');
    }
}
