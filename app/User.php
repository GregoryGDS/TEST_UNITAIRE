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
        if(!empty($this->mail) && !empty($this->prenom) && !empty($this->nom) && !empty($this->age)){
            $this->verifEmail($this->mail);
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

    public function verifEmail($email){
        if(filter_var($email, FILTER_VALIDATE_mail)){
            return true;
        } else {
            throw new InvalidArgumentException('Fomat email invalide !!');
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

    public function getmail(): string
    {
        return $this->mail;
    }

    public function getprenom(): string
    {
        return $this->prenom;
    }

    public function getnom(): string
    {
        return $this->nom;
    }

    public function getAge(): int
    {
        return $this->age;
    }

}