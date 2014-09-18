<?php

namespace Eticsol\EticsolBundle\Entity;

use FOS\UserBundle\Entity\User as FSuser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuario extends FSuser
{
    /**
     *
     * @var type  * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $groups;
     
     public function getId() {
         return $this->id;
     }

     public function getUsername() {
         return $this->username;
     }

     public function getPassword() {
         return $this->password;
     }

     public function getEmail() {
         return $this->email;
     }

     public function getGroups() {
         return $this->groups;
     }

     public function getRoles() {
         return $this->roles;
     }

     public function setId(type $id) {
         $this->id = $id;
     }

     public function setUsername($username) {
         $this->username = $username;
     }

     public function setPassword($password) {
         $this->password = $password;
     }

     public function setEmail($email) {
         $this->email = $email;
     }

     public function setGroups($groups) {
         $this->groups = $groups;
     }

  

      public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    

}
