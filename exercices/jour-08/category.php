<?php

class Category
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getSlug(): string
    {
        return str_replace(' ', '-', strtolower($this->name));
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$categories = [
    new Category("Vêtements homme"),
    new Category("Chaussures de ville"),
    new Category("Vêtements en Laine")
];

foreach ($categories as $cat) {
    echo $cat->getName() . " → " . $cat->getSlug() . "<br>";
}
