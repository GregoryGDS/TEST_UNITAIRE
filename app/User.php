<?php

//namespace App;

class User
{
    public $nom;
    public $prenom;
    public $email;
    public $age;
    
    public function __construct($nom, $prenom, $email, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->age = $age;
    }
   
    public function isValid(){
        if(!empty($this->email) && !empty($this->prenom) && !empty($this->nom) && !empty($this->age)){
            $this->verifEmail($this->email);
            $this->verifAge($this->age);
        }else{
            throw new InvalidArgumentException('Remplir tous les champs !!');
        }
        return true;
    }

    public function verifAge($age)
    {
        if($age >= 13){
            return true;
        }else{
            throw new InvalidArgumentException('Age inférieur à 13 ans !!');
        }
    }

    public function verifEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            throw new InvalidArgumentException('Format email invalide !!');
        }
    }


    public function gets()
    {
        return [
            'nom' => $this->nom, 
            'prenom' => $this->prenom,
            'email' => $this->email,
            'age' => $this->age
        ]; 
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAge(): int
    {
        return $this->age;
    }

}