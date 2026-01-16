<?php

class Address
{
    public function __construct(
        private string $street,
        private string $city,
        private string $postalCode,
        private string $country
    ) {}

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    // Pour affichage simple
    public function __toString(): string
    {
        return "{$this->street}, {$this->city}, {$this->postalCode}, {$this->country}";
    }
}
