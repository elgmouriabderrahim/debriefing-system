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
    public static function findAll(): array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM sprints");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create(array $data): void
    {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare(
            "INSERT INTO sprints (name, duration_days, sprint_order)
            VALUES (:name, :duration_days, :sprint_order)
        ");

        $stmt->execute([
            ':name' => $data['name'],
            ':duration_days' => $data['duration_days'],
            ':sprint_order' => $data['sprint_order'],
        ]);
    }

    public static function delete(int $id): void
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("DELETE FROM sprints WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public static function insertAssignment(int $sprintId, int $classId)
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO class_sprints (sprint_id, class_id) VALUES (:sprint_id, :class_id)");
        $stmt->execute(['sprint_id' => $sprintId, 'class_id' => $classId]);
    }

    public static function deleteAssignmentsBySprint(int $sprintId)
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("DELETE FROM class_sprints WHERE sprint_id = :sprint_id");
        $stmt->execute(['sprint_id' => $sprintId]);
    }

    public static function getAssignedClassIds(int $sprintId): array
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT class_id FROM class_sprints WHERE sprint_id = :sprint_id");
        $stmt->execute(['sprint_id' => $sprintId]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

}