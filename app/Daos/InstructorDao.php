<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class InstructorDao {

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

    public static function getById($id): ?array
    {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id AND role = 'Instructor'");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?? null;
    }

    public static function assignClass(int $classId,int $instructorId): void
    {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("insert into class_instructors(class_id, instructor_id) values(:classId, :instructorId)");
        $stmt->bindValue(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindValue(':instructorId', $instructorId, PDO::PARAM_INT);
        $stmt->execute();
    }

}