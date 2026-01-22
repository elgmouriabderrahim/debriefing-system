<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class CompetenceDao {
    
    public static function getAll(): array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM competences");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}