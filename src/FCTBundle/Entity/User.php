<?php

namespace FCTBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="FCTBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\Length(
     *      min = 4,
     *      max = 32,
     *      minMessage = "Debes introducir un usuario con mínimo de 4 caracteres",
     *      maxMessage = "Debes introducir un usuario con máximo de 32 caracteres"
     * )
     * @Assert\NotBlank(
     *     message="Debes rellenar el username"
     * )
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * )
     * @Assert\Regex(
     *     pattern="/.+@.+\..+/",
     *     match=true,
     *     message="El email debe ser del tipo email@dominio.extension"
     * )
     * @Assert\NotBlank(
     *     message="Debes rellenar el email"
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;
    /**
    *@var string
    *
    *@ORM\Column(name="roles",type="json_array")
    */
    private $roles=array();

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
    *     message="Debes rellenar la contraseña"
    * )
    * @Assert\Regex(
    *     pattern="/^.*[A-Z]+.*$/",
    *     match=true,
    *     message="La contraseña debe tener al menos una mayúscula"
    * )
    * @Assert\Regex(
    *     pattern="/^.*[0-9].*$/",
    *     match=true,
    *     message="La contraseña debe tener numeros del 0 al 9"
    * )
     @Assert\Regex(
    *     pattern="/^.*[a-z].*$/",
    *     match=true,
    *     message="La contraseña debe tener minúsculas"
    * )
    * @Assert\Length(
    *      min = 8,
    *      minMessage = "Debes introducir una contraseña de como mínimo de 8 caracteres"
    * )
    */
    private $plainPassword;

    public function getPlainPassword(){
        return $this->plainPassword;
    }
    public function setPlainPassword($password){
        $this->plainPassword=$password;
    }
    public function setRoles(array $roles){
        $this->roles=$roles;
        return $this;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
        
    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    //metodos que debe implementar el Entity por UserInterface
    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    } 
    public function getRoles(){
        return $this->roles;
    }
    public function eraseCredentials() {
        
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

}

