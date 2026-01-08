<?php
$status = "canceled";
switch ($status) {
    case "standby":
        $message = "Commande en attente de validation";
        $color = "orange";
        break;
    case "validated":
        $message = "Commande validée";
        $color = "blue";
        break;
    case "shipped":
        $message = "Commande expédiée";
        $color = "purple";
        break;
    case "delivered":
        $message = "Commande livrée";
        $color = "green";
        break;
    case "canceled":
        $message = "Commande annulée";
        $color = "red";
        break;
    default:
        $message = "Statut inconnu";
        $color = "black";
        break;
}

// Affichage
echo "<span style='color: $color'> $message</span>";
echo "<br>";


[$message, $color] = match ($status) {
    "standby"    => ["Commande en attente de validation", "orange"],
    "validated"  => ["Commande validée", "blue"],
    "shipped"    => ["Commande expédiée", "purple"],
    "delivered"  => ["Commande livrée", "green"],
    "canceled"   => ["Commande annulée", "red"],
    default      => ["Statut inconnu", "black"],
};

echo "<span style='color: $color'> $message</span>";
