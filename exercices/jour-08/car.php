<?php
//définition de la classe Car
class Car
{
    public string $brand;
    public string $model;
    public int $year;

    //constructeur : s'exécute à chaque création de voiture
    public function __construct(string $brand, string $model, int $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    //calcule l'âge de la voiture
    public function getAge(): int
    {
        $currentYear = date("Y"); // année actuelle
        return $currentYear - $this->year;
    }

    //retourne une phrase lisible
    public function display(): string
    {
        return $this->brand . " " . $this->model . " (" . $this->getAge() . " ans)";
    }
}

// 2. Utilisation de la classe

// Création des objets (voitures)
$car1 = new Car("Peugeot", "208", 2019);
$car2 = new Car("Renault", "Clio", 2016);
$car3 = new Car("Toyota", "Yaris", 2022);

// Affichage
echo $car1->display() . "<br>";
echo $car2->display() . "<br>";
echo $car3->display() . "<br>";
