<?php
namespace Core\Database;
interface DatabaseInterface
{
     public function prepare(string $sql,array $data, string $classEntity, bool $single);
     public function query(string $sql, string $classEntity,  bool $single);
      public function lastInsertId();
      public function beginTransaction();
      public function commit();
      public function rollBack();
}