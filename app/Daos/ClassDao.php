<?php
namespace App\Daos;
use App\Core\Database;

class ClassDao {

    public static function countAll(): int {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM classes");
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    } 
}