<?php

namespace FCTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conf
 *
 * @ORM\Table(name="conf")
 * @ORM\Entity(repositoryClass="FCTBundle\Repository\ConfRepository")
 */
class Conf
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="param", type="string", length=255)
     @Assert\NotBlank(
     *     message="Debes rellenar el parametro"
     * )
     
     */
    private $param;

    /**
     * @var string
     *
     * @ORM\Column(name="configuracion", type="string", length=255)
     @Assert\NotBlank(
     *     message="Debes rellenar la configuracion"
     * )
     
     */
    private $configuracion;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=255)
     @Assert\NotBlank(
     *     message="Debes rellenar el role"
     * )
     
     */
    private $roles;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
    * @Assert\NotBlank(
    *     message="Debes rellenar el parametro"
    * )
    /**
    * @Assert\NotBlank(
    *     message="Debes rellenar la configuracion"
    * )

    /**
     * Set param
     *
     * @param string $param
     *
     * @return Conf
     */
    public function setParam($param)
    {
        $this->param = $param;

        return $this;
    }

    /**
     * Get param
     *
     * @return string
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * Set configuracion
     *
     * @param string $configuracion
     *
     * @return Conf
     */
    public function setConfiguracion($configuracion)
    {
        $this->configuracion = $configuracion;

        return $this;
    }

    /**
     * Get configuracion
     *
     * @return string
     */
    public function getConfiguracion()
    {
        return $this->configuracion;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return Conf
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return string
     */
    public function getRoles()
    {
        return $this->roles;
    }
    private $roles=array();
    public function setRoles(array $roles){
        $this->roles=$roles;
        return $this;
    }
    public function getRoles(){
        return $this->roles;
    }
}

