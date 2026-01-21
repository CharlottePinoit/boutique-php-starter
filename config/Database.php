<?php

namespace config;



class Database
{
    // Instance unique de PDO
    private static ?\PDO $instance = null;

    // Méthode pour récupérer l'instance
    public static function getInstance(): \PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new \PDO(
                    "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
                    "dev",      // ton user MySQL
                    "dev",      // ton mot de passe MySQL
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    ]
                );
            } catch (\PDOException $e) {
                // Arrêt du script et affichage de l'erreur
                die("Erreur de connexion à la base : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
