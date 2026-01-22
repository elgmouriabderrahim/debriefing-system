<?php
namespace App\Daos;
use App\Core\Database;
use PDO;
class ClassDao {
    
    public static function countAll(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM classes");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
    public static function getAll(): array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM classes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function countStudentsInClass(int $classId): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE class_id = :classId and role = 'Learner'");
        $stmt->bindValue(':classId', $classId, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
}