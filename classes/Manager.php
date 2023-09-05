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
}

?>