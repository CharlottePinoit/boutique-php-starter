<?php

require_once 'Cart.php';
require_once 'User.php';

class Order
{
    private int $id;
    private User $user;
    private array $items = [];
    private \DateTime $date;
    private string $status;

    public function __construct(int $id, User $user, Cart $cart)
    {
        $this->id = $id;
        $this->user = $user;
        $this->items = $cart->getItems();
        $this->date = new \DateTime();
        $this->status = "En cours"; // statut par défaut
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    public function getItemCount(): int
    {
        $count = 0;
        foreach ($this->items as $item) {
            $count += $item->getQuantity();
        }
        return $count;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getItems(): array
    {
        return $this->items;
    }
    public function getId(): int
    {
        return $this->id;
    }
}
