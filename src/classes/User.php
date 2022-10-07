<?php

namespace src\classes;

use models\Model;

class UserModel extends Model
{
    private $id;
    private $nom;
    private $prenom;
    private $email;

    public function __construct()
    {
        $this->table = "users";
    }

    /**
     * set id
     */
    public function setId($id):int {
        return $this->id = $id;
    }


     /**
      * get id
      */
      public function getId() {
        return $this->id;
    }


     /**
     * set nom
     */
    public function setNom(string $nom) {
        return $this->nom = $nom;
    }


     /**
      * get nom
      */
      public function getNom():string {
        return $this->nom;
    }

     /**
     * set prenom
     */
    public function setPrenom(string $prenom) {
        return $this->prenom = $prenom;
    }


     /**
      * get prenom
      */
      public function getPrenom():string {
        return $this->prenom;
    }

     /**
     * set email
     */
    public function setEmail(string $email) {
        return $this->email = $email;
    }


     /**
      * get email
      */
      public function getEmail(): string {
        return $this->email;
    }
   
    

}

?>