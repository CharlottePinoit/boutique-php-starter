<?php

namespace App\Entity;

use DateTime;

class User
{
    public function __construct(
        private ?int $id,
        private string $nom,
        private string $email,
        private string $password,
        private string $role = 'user',
        private ?DateTime $created_at = null
    ) {
        $this->created_at = $created_at ?? new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}
