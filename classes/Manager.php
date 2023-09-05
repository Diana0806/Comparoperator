<?php 

require_once ('../config/database.php');
    class Manager {
        protected $pdo;
        protected $table;

        public function __construct() {
            $this->pdo = getPdo();
        }

        public function getAllDestination() {
            $query = $this->pdo->prepare("SELECT * FROM destination");
            $query->execute();
            $item = $query->fetchAll();
            return $item;
        }

        public function getAllOperator() {
            $query = $this->pdo->prepare("SELECT * FROM tour_operator");
            $query->execute();
            $item = $query->fetchAll();
            return $item;
        }
        public function getOperatorByDestination() {
            $query = $this->pdo->prepare("SELECT * FROM destination INNER JOIN tour_operator ON destination.tour_operator_id = tour_operator.id");
            $query->execute();
            $item = $query->fetchAll();
            return $item;
        }

     
        public function delete( int $id) : void{
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

        
            public function createReview($operatorId, $message, $authorId)
            {
                $sql = "INSERT INTO review (message, tour_operator_id, author_id) VALUES (:message, :tour_operator_id, :author_id)";
                $data = [
                    'message' => $message,
                    'tour_operator_id' => $operatorId,
                    'author_id' => $authorId,
                ];
        
                $query = $this->pdo->prepare($sql);
                $query->execute($data);
            }
        }
        
