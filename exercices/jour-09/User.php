<?php

require_once 'Address.php';

class User
{
    private array $addresses = [];

    public function __construct(
        private string $name,
        private string $email,
        private ?\DateTime $dateInscription = null
    ) {
        $this->dateInscription = $dateInscription ?? new \DateTime();
    }

    public function addAddress(Address $address, bool $default = false): void
    {
        if ($default) {
            // Marquer cette adresse comme première
            array_unshift($this->addresses, $address);
        } else {
            $this->addresses[] = $address;
        }
    }

    public function getAddresses(): array
    {
        return $this->addresses;
    }

    public function getDefaultAddress(): ?Address
    {
        return $this->addresses[0] ?? null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDateInscription(): \DateTime
    {
        return $this->dateInscription;
    }
}
