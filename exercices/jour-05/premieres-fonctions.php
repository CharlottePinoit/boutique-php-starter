<?php

// fonction sans parametre
function greet()
{
    echo "Bienvenue sur la boutique !<br>";
}

// fonction avec parametre
function greetClient($name)
{
    echo "Bonjour $name !<br>";
}

// appels des fonctions
greet();
greet();

greetClient("Alice");
greetClient("Bob");
greetClient("Charlie");
