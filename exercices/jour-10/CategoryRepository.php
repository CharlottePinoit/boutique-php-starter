<?php
require_once 'Category.php';
require_once 'ProductRepository.php';
require_once 'Database.php';

class CategoryRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM categories");
        return array_map(fn($data) => new Category((int)$data['id'], $data['nom']), $stmt->fetchAll());
    }

    public function save(Category $category): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO categories (nom) VALUES (?)");
        $stmt->execute([$category->getName()]);
        $category->setId((int)$this->pdo->lastInsertId());
    }

    public function findWithProducts(): array
    {
        $categories = $this->findAll();
        $productRepo = new ProductRepository();

        foreach ($categories as $category) {
            $products = $productRepo->findByCategory($category->getId());
            $category->setProducts($products);
        }

        return $categories;
    }
}
