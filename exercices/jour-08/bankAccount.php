<?php

class BankAccount
{
    private float $balance = 0;

    public function deposit(float $amount): bool
    {
        if ($amount <= 0) { //si le montant à déposer n'est pas positif 
            return false; //opération interdite
        }

        $this->balance += $amount; //ajoute le montant au solde actuel
        return true;
    }

    public function withdraw(float $amount): bool
    {
        if ($amount <= 0 || $amount > $this->balance) { //si le montant à retirer est 0 ou négatif ou si on retire plus que le solde du compte
            return false; //opération interdite
        }

        $this->balance -= $amount; //on soustrait le montant du solde actuel
        return true;
    }

    public function getBalance(): float //ne modifie rien , juste lit/affiche l'état 
    {
        return $this->balance;
    }
}

$account = new BankAccount();
$account->deposit(100);
echo "Dépot effectué";
echo "<br>";
$success = $account->withdraw(40);

if ($success) {
    echo "Retrait effectué.";
    echo "<br>";
} else {
    echo "Impossible de retirer ce montant.";
    echo "<br>";
}
echo "Solde actuel : " . $account->getBalance() . " €";
