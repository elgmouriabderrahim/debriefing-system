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

}