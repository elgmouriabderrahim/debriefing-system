<?php
namespace App\Daos;
use PDO;
use App\Core\Database;
class BriefDao {

    public static function countAll(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM briefs");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    public static function getRecentBriefs(int $limit): array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM briefs ORDER BY start_date DESC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}