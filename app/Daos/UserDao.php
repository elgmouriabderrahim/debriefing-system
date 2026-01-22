<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class UserDao {

    public static function countAll(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM users");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    public static function countAllLearners(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM users WHERE role = 'Learner'");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    public static function countAllInstructors(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM users WHERE role = 'Instructor'");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    public static function getById(int $id): ?array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public static function getRecentUserActivity(int $limit): array {
        $pdo = Database::getInstance()->getconnection();
        $sql = "
            (
                SELECT
                    CONCAT(u.first_name, ' ', u.last_name) AS user,
                    'registered an account' AS action,
                    u.created_at AS date
                FROM users u
            )
            UNION ALL
            (
                SELECT
                    CONCAT(i.first_name, ' ', i.last_name) AS user,
                    CONCAT('created brief \"', b.title, '\"') AS action,
                    b.start_date AS date
                FROM briefs b
                JOIN users i ON i.id = b.instructor_id
            )
            UNION ALL
            (
                SELECT
                    CONCAT(i.first_name, ' ', i.last_name) AS user,
                    CONCAT('debriefed learner ', l.first_name, ' ', l.last_name) AS action,
                    d.created_at AS date
                FROM debriefings d
                JOIN users i ON i.id = d.instructor_id
                JOIN users l ON l.id = d.learner_id
            )
            ORDER BY date DESC
            LIMIT :limit
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}