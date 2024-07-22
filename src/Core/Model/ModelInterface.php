<?php

namespace Core\Model;

use Core\Database\DatabaseInterface;

interface ModelInterface
{
    public function all();

    public function save(array $data);

    public  function getEntityClass();

    public function delete(int $id);

    public function find(int $id);

    public function hasMany($model, $foreign_key, $local_key = 'id');

    public function hasOne($model, $foreign_key);

    public function belongsToMany($model, $foreign_key, $local_key = null);

    public function belongsToOne($model, $foreign_key, $local_key = null);
    public function setDatabase(DatabaseInterface $database);
    public function transaction(array $callback);
    

}