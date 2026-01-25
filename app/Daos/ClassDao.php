<?php
namespace App\Daos;
use App\Core\Database;
use PDO;
class ClassDao {
    
    public static function countAll(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM classes");
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
    public static function create(array $inputData): void {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("INSERT INTO classes(name, promotion_year) values(:name, :promotionYear)");
        $stmt->execute(['name' => $inputData['name'], 'promotionYear' => $inputData['promotionYear']]);
    }

    public static function getById(int $id): ?array
{
    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->prepare(
        "SELECT c.*, 
                (SELECT COUNT(*) FROM users u WHERE u.class_id = c.id) AS students_count
         FROM classes c
         WHERE c.id = :id"
    );

    $stmt->execute(['id' => $id]);
    $class = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$class) {
        return null;
    }

    $stmt = $pdo->prepare(
        "SELECT u.*
         FROM users u
         JOIN class_instructors ci ON ci.instructor_id = u.id
         WHERE ci.class_id = :id"
    );

    $stmt->execute(['id' => $id]);
    $class['instructors'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $class;
}


    public static function delete(int $id): void
    {
        $pdo = Database::getInstance()->getconnection();

        $stmt = $pdo->prepare("DELETE FROM classes WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public static function getClassLearners(int $classId): array
    {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare(
            "SELECT *
            FROM users
            WHERE class_id = :class_id
        ");

        $stmt->execute([
            ':class_id' => $classId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getClassInstructors(int $classId): array
    {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare(
            "SELECT u.*
            FROM users u
            INNER JOIN class_instructors ci ON ci.instructor_id = u.id
            WHERE ci.class_id = :class_id
        ");

        $stmt->execute([
            ':class_id' => $classId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}