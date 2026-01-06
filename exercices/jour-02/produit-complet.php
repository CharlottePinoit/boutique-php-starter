<?php
$product = [
    "name" => "Sweat à capuche",
    "description" => "Sweat à capuche confortable, idéal pour le sport et le quotidien",
    "price" => 55,
    "images" => [
        "https://images.pexels.com/photos/8217544/pexels-photo-8217544.jpeg",
        "https://images.pexels.com/photos/8217308/pexels-photo-8217308.jpeg",
        "https://images.pexels.com/photos/8217416/pexels-photo-8217416.jpeg"
    ],
    "sizes" => ["S", "M", "L", "XL"],
    "reviews" => [
        [
            "author" => "Alice",
            "rating" => 5,
            "comment" => "Très confortable et de bonne qualité !"
        ],
        [
            "author" => "Bob",
            "rating" => 4,
            "comment" => "Bonne coupe, mais la couleur est un peu différente."
        ]
    ]
];
//affiche la 2nd image, pour qu'elle s'affiche bien sur navigateur->balise img et réduire sa taille
echo '<img src="' . $product['images'][1] . '" alt="Sweat à capuche blanc" width=300>';
echo "<br>";
//affiche le nbr de tailles dispos
echo "nombre de tailles disponibles: " . count($product["sizes"]);
echo "<br>";
//affiche la note du 1er avis
echo "note: " . $product["reviews"][0]["rating"];
