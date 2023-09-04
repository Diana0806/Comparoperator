<?php 

require_once ('./config/database.php');
    class Manager {
        protected $pdo;
        protected $table;

        public function __construct() {
            $this->pdo = getPdo();
        }

        public function getAll( int $id) {
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $query->execute(['id' => $id]);
            $item = $query->fetchAll();
            return $item;
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