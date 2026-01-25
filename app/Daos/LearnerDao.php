<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class LearnerDao {

    public static function countAllLearners(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM users WHERE role = 'Learner'");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    public static function getById($id): ?array
    {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id AND role = 'Learner'");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?? null;
    }

}