<?php
namespace Core\Database;

require '../vendor/autoload.php';

use Core\Database\DatabaseInterface as DatabaseDatabaseInterface;
use DatabaseInterface;
use Dotenv\Dotenv;
use \PDO;

class MysqlDatabase implements DatabaseDatabaseInterface
{
    private static $instance;
    private $pdo;

    public function __construct() {
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO(dsn, DB_USER, DB_PASSWORD, $options);
            // echo "Connexion à la base de données réussie";
        } catch (\PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }
    

    public function prepare(string $sql,array $data, string $classEntity, bool $single = false)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $classEntity);
        
        if ($classEntity != null) {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $classEntity);
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }

        if ($single) {
            return $stmt->fetch();
        } else {
            return $stmt->fetchAll();
        }
    }

    public function query(string $sql, string $classEntity, bool $single = false)
    {
        $stmt = $this->pdo->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $classEntity);
        if ($single) {
            return $stmt->fetch( );
        }
        return $stmt->fetchAll( );
    
    }


    public function beginTransaction()
    {
        $this->pdo->beginTransaction();
    }

    public function commit()
    {
        $this->pdo->commit();
    }

    public function rollBack()
    {
        $this->pdo->rollBack();
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }


}
