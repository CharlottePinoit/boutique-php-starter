<?php
require_once 'Product.php';
require_once 'Category.php';
require_once 'Database.php';

class ProductRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ? $this->hydrate($data) : null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    public function save(Product $product): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getStock(),
            $product->getCategory()?->getId()
        ]);

        $product->setId((int)$this->pdo->lastInsertId());
    }

    public function update(Product $product): void
    {
        $stmt = $this->pdo->prepare(
            "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ? WHERE id = ?"
        );
        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getStock(),
            $product->getCategory()?->getId(),
            $product->getId()
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }

    private function hydrate(array $data): Product
    {
        $category = null;

        if (!empty($data['category_id'])) {
            // On récupère le nom de la catégorie depuis la table categories
            $stmt = $this->pdo->prepare("SELECT nom FROM categories WHERE id = ?");
            $stmt->execute([$data['category_id']]);
            $catData = $stmt->fetch();
            $categoryName = $catData ? $catData['nom'] : '';
            $category = new Category((int)$data['category_id'], $categoryName);
        }

        return new Product(
            (int)$data['id'],
            $data['name'],
            $data['description'],
            (float)$data['price'],
            (int)$data['stock'],
            $category
        );
    }


    public function findByCategory(int $categoryId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE category_id = ?");
        $stmt->execute([$categoryId]);
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    public function findInStock(): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM products WHERE stock > 0"
        );

        return array_map(
            [$this, 'hydrate'],
            $stmt->fetchAll()
        );
    }
    public function findByPriceRange(float $min, float $max): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE price BETWEEN ? AND ?"
        );

        $stmt->execute([$min, $max]);

        return array_map(
            [$this, 'hydrate'],
            $stmt->fetchAll()
        );
    }
    public function search(string $term): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE name LIKE ?"
        );

        $stmt->execute([
            '%' . $term . '%'
        ]);

        return array_map(
            [$this, 'hydrate'],
            $stmt->fetchAll()
        );
    }
}
