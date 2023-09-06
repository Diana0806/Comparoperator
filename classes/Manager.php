<?php

require_once('./config/database.php');
class Manager
{
    protected $pdo;
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
}
