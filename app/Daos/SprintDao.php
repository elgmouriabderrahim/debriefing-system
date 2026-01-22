<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class SprintDao {

    public static function countAll(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM sprints");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
    public static function getById(int $id): ?array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM sprints WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}