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
        $stmt = $pdo->prepare("SELECT u.* FROM users u JOIN class_instructors ci on ci.instructor_id = u.id and  ci.class_id = :classId");
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
        $stmt = $pdo->prepare(
            "INSERT INTO class_instructors(class_id, instructor_id)
            values(:classId, :instructorId)
            ON CONFLICT (class_id, instructor_id) DO NOTHING;"
        );
        $stmt->bindValue(':classId', $classId, PDO::PARAM_INT);
        $stmt->bindValue(':instructorId', $instructorId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function getInstructorClasses($instructorId): array
    {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare(
            "SELECT c.* FROM classes c
            join class_instructors ci 
            on ci.class_id = c.id and ci.instructor_id = :instructorId"
            );
        $stmt->execute([':instructorId' => $instructorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}