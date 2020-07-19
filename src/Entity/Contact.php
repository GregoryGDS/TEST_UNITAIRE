<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le prénom ne peut pas être vide");
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom ne peut pas être vide");
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le mail ne peut pas être vide");
     * @Assert\Email(message="Le format de mail n'est pas valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=14, nullable=true)
     * @Assert\Length(min="10", minMessage="Le téléphone doit avoir au moins 10 caractères",
     * max="14", maxMessage="Le téléphone est trop long")
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champs ne peut pas être vide");
     */
    private $tag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function newContact(string $lastname, string $firstname, string $email, string $tag, ?string $phoneNumber = null)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->tag = $tag;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function verifPhoneNumber($number){
        if($number){
            $pattern = '/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/';
            if(preg_match($pattern,$number)){
                return false; //pas d'erreur
            }
            return 'Le numéro de téléphone n\'est pas valide';
        }
        return false;
    }

    public function verifEmail($mail){
        $pattern = '/^.+\@\S+\.\S+$/';
        if(preg_match($pattern,$mail)){
            return false; //pas d'erreur
        }
        return 'Le mail n\'est pas valide';
    }

}
