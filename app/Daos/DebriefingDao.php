<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class DebriefingDao {

    public static function getAllDebriefings(): array {
        $db = Database::getInstance()->getconnection();
        $stmt = $db->prepare("SELECT * FROM debriefings");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}