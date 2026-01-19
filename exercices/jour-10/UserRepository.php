<?php
require_once 'User.php';
require_once 'Database.php';

class UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch();
        return $data ? new User((int)$data['id'], $data['nom'], $data['email'], $data['password'], $data['role']) : null;
    }

    public function save(User $user): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (nom, email, password, role) VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([
            $user->getNom(),
            $user->getEmail(),
            password_hash($user->getPassword(), PASSWORD_DEFAULT),
            $user->getRole()
        ]);
        $user->setId((int)$this->pdo->lastInsertId());
    }
}
