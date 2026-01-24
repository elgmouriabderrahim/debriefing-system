<?php
namespace App\Daos;
use App\Core\Database;
use PDO;

class CompetenceDao {
    
    public static function getAll(): array {
        $pdo = Database::getInstance()->getconnection();
        $stmt = $pdo->prepare("SELECT * FROM competences");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(array $data): bool
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO competences (code, label) VALUES (:code, :label)");
        return $stmt->execute([
            ':code' => $data['code'],
            ':label' => $data['label'],
        ]);
    }

    public static function delete(int $competenceId): void
    {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("DELETE FROM competences WHERE id = :id");
        $stmt->execute([':id' => $competenceId]);
    }

    public static function isCompetenceExists($code): bool
    {
        $pdo = Database::getInstance()->getConnection();

        $stmt = $pdo->prepare("select 1 from competences where code = :code limit 1");
        $stmt->execute(['code' => $code]);
        return (bool) $stmt->fetchColumn();
    } 
}