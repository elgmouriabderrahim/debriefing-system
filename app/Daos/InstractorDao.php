<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class InstractorDao {

    public static function countAllInstructors(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM users WHERE role = 'Instructor'");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }


    public static function getClassInstructors(int $classId): array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE class_id = :classId AND role = 'Instructor'");
        $stmt->bindValue(':classId', $classId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}