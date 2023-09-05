<?php

function insertDestination($location, $price, $tourOperatorId)
{
    $pdo = getPdo();
    $query = $pdo->prepare('INSERT INTO destination (location, price, tour_operator_id) 
                            SELECT :location, :price, t.id
                            FROM tour_operator t
                            WHERE t.id = :tour_operator_id');
    
    $query->execute([
        'location' => $location,
        'price' => $price,
        'tour_operator_id' => $tourOperatorId
    ]);
}
