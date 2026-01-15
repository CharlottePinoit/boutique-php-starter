<?php
class User
{
    public string $name;
    public string $email;
    public string $registrationDate;
    //constructeur
    public function __construct(string $name, string $email, ?string $registrationDate = null)
    {
        $this->name = $name;
        $this->email = $email;
        //si aucune date n'est fournie, on met la date du jour
        if ($registrationDate === null) {
            $this->registrationDate = date("Y-m-d");
        } else {
            $this->registrationDate = $registrationDate;
        }
    }
    //vérifie si l'utilisateur est inscrit depuis - de 30 jours
    public function isNewMember(): bool
    {
        $today = new DateTime();
        $registration = new DateTime($this->registrationDate);

        $difference = $registration->diff($today);

        return $difference->days < 30;
    }
}
//utilisation de la classe
$user1 = new User("Alice", "alice@test.com"); //date automatique
$user2 = new User("Bob", "bob@test.com", "2023-01-01");

echo $user1->name . " est nouveau ? ";
echo $user1->isNewMember() ? "Oui" : "Non";
echo "<br>";

echo $user2->name . " est nouveau ? ";
echo $user2->isNewMember() ? "Oui" : "Non";
