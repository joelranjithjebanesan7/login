<?php
namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseUser implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    
    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
    }


    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return user
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }
    

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    
    public function getIsActive()
    {
        return $this->isActive;
    }
   

    public function getRoles()
    {
        return array('RO /**
        * Set password
        *
        * @param string $password
        *
        * @return user
        */
       public function setPassword($password)
       {
           $this->password = $password;
   
           return $this;
       }
       public function getPassword()
       {
           return $this->password;
       }LE_USER');
    }

    public function eraseCredentials()
    {
    }
     /** @see \Serializable::serialize() */
     public function serialize()
     {
         return serialize(array(
             $this->id,
             $this->username,
             $this->password,
             // see section on salt below
             //$this->salt,
         ));
     }
 
     /** @see \Serializable::unserialize() */
     public function unserialize($serialized)
     {
         list (
             $this->id,
             $this->username,
             $this->password,
             // see section on salt below
              //$this->salt
         ) = unserialize($serialized, array('allowed_classes' => false));
     }

     public function setIsActive(bool $isActive): self
     {
         $this->isActive = $isActive;

         return $this;
     }
}