<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/TpComparator/Comparoperator/config/database.php');

class Manager
{
    protected PDO $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    public function getAllDestination()
    {
        $query = $this->pdo->prepare("SELECT * FROM destination");
        $query->execute();
        $item = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $destination = new Destination();
            $destination->id = $row['id'];
            $destination->location = $row['location'];
            $destination->price = $row['price'];
            $item[] = $destination;
        }
        return $item;
    }

    public function getAllOperator()
    {
        $query = $this->pdo->prepare("SELECT * FROM tour_operator");
        $query->execute();
        $item = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $TO = new Tour_operator();
            $TO->id = $row['id'];
            $TO->name = $row['name'];
            $TO->link = $row['link'];
            $item[] = $TO;
        }
        return $item;
    }

    public function getOperatorsByLocation($location)
    {
        $query = $this->pdo->prepare("SELECT tour_operator.id, tour_operator.name, tour_operator.link 
                                    FROM tour_operator
                                    INNER JOIN destination ON tour_operator.id = destination.tour_operator_id
                                    WHERE destination.location = :location");
        $query->execute(['location' => $location]);
        $operators = $query->fetchAll(PDO::FETCH_CLASS, 'Tour_operator');
        return $operators;
    }



    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }



    public function registerAuthor(Author $author): void
    {
        // Check if author already exists
        $sql = "SELECT * FROM author WHERE name = :name";
        $request = $this->pdo->prepare($sql);
        $request->execute(['name' => $author->getName()]);
        $authorExist = $request->fetch();

        if ($authorExist) {
            echo "Nom existe deja.";
        } else {
            // Adding new user
            $data = [
                'name' => $author->getName(),
                'grade' => $author->getGrade(),
                'password' => $author->getPassword(),

            ];

            $sql = "INSERT INTO author (name, grade, password) VALUES (:name, :grade, :password)";
            $request = $this->pdo->prepare($sql);


            $request->execute($data);
        }
    }


    function getAuthorIdByName($authorName)
{
    
    
    // Requête SQL pour obtenir l'ID de l'auteur en fonction de son nom
    $query = $this->pdo->prepare('SELECT id FROM author WHERE name = :author_name');
    $query->execute(['author_name' => $authorName]);

    $row = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($row !== false) {
        return $row['id'];
    } else {
        return null; // Auteur non trouvé, retourne null
    }
}

function createReview($message, $tourOperatorId, $authorName)
{
    
    // Obtenir l'ID de l'auteur en fonction de son nom
    $authorId = $this->getAuthorIdByName($authorName); // Utilisez $this pour appeler la méthode de la classe courante
    
    // Vérifier si l'auteur existe, sinon l'ajouter
    if ($authorId === null) {
        // Insérer l'auteur dans la table 'author' et récupérer son nouvel ID
        $insertAuthorQuery = $this->pdo->prepare('INSERT INTO author (name) VALUES (:name)');
        $insertAuthorQuery->execute(['name' => $authorName]);
        $authorId = $this->pdo->lastInsertId();
    }
    
    // Insérer le commentaire dans la table 'review'
    $insertReviewQuery = $this->pdo->prepare('INSERT INTO review (message, tour_operator_id, author_id) VALUES (:message, :tour_operator_id, :author_id)');
    $insertReviewQuery->execute([
        'message' => $message,
        'tour_operator_id' => $tourOperatorId,
        'author_id' => $authorId
    ]);
}


// public function getAllAuthorMessagesByOperator(int $tour_operator_id){
//     try {
//         $query = $this->pdo->prepare('SELECT * FROM review INNER JOIN author ON review.author_id = author.id INNER JOIN tour_operator ON review.tour_operator_id = tour_operator.id WHERE tour_operator_id = :tour_operator_id');
//         $query->execute([
//             ':tour_operator_id' => $tour_operator_id
//         ]);
//         $items = $query->fetchAll();
//         return $items;
//     } catch (PDOException $e) {
//         die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
//     }
// }


public function getAllAuthorMessagesByOperator(int $tour_operator_id){
    $query = $this->pdo->prepare('SELECT author.name AS author_name, review.message, tour_operator.id AS operator_id
        FROM review
        INNER JOIN author ON review.author_id = author.id
        INNER JOIN tour_operator ON review.tour_operator_id = tour_operator.id
        WHERE tour_operator.id = :tour_operator_id');
    
    $query->execute([':tour_operator_id' => $tour_operator_id]);
    
    $items = [];
    
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $messagesByOperator = new Review();
        $messagesByOperator->author = $row['author_name'];
        $messagesByOperator->message = $row['message'];
        $messagesByOperator->id = $row['operator_id'];
        $items[] = $messagesByOperator;
    }
    
    return $items;
}
   
}
