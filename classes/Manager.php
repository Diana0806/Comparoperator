<?php 

require_once ('./config/database.php');
    class Manager {
        protected $pdo;
        protected $table;

        public function __construct() {
            $this->pdo = getPdo();
        }

        public function getAll(): array {
            $query = $this->pdo->prepare("SELECT * FROM {$this->table}");
            $query->execute();
            $items = [];
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $destination = new Destination();
                $destination->id = $row['id'];
                $destination->location = $row['location'];
                $destination->price = $row['price'];
                $items[] = $destination;
            }
            return $items;
        }

        public function delete( int $id) : void{
          $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
          $query->execute(['id' => $id]);  
    }

        public function findAllBy(?string $order ="") : array {
            $sql = $this->pdo->prepare("SELECT * FROM {$this->table}");
            if($order) {
                $sql .= " ORDER BY " . $order;
            }
            $resulats = $this->pdo->query($sql);
            $articles = $resulats->fetchAll();
            return $articles;
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

?>