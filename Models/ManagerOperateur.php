<?php


function insertOperateur($name, $link)
{
    $pdo = getPdo();
    $query = $pdo->prepare('INSERT INTO tour_operator SET  name = :name, link = :link');
    $query->execute(compact('name', 'link'));
}
