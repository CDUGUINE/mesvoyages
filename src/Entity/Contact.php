<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraint as Assert;

/**
 * Description of Contact
 *
 * @author cdugu
 */
class Contact {
    #[Assert\NoBlank()]
    #[Assert\Length(min:2, max:100)]
    private ?string $nom;
    
    #[Assert\NoBlank()]
    #[Assert\Email()]
    private ?string $email;
    
    #[Assert\NoBlank()]
    private ?string $message;
    
    function getNom(): ?string {
        return $this->nom;
    }

    function getEmail(): ?string {
        return $this->email;
    }

    function getMessage(): ?string {
        return $this->message;
    }

    public function setNom(?string $nom) {
        $this->nom = $nom;
        return $this;
    }

    public function setEmail(?string $email) {
        $this->email = $email;
        return $this;
    }

    public function setMessage(?string $message) {
        $this->message = $message;
        return $this;
    }


}
