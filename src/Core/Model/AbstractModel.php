<?php
namespace Core\Model;

use App\App;
use Core\Database\MysqlDatabase;
use Core\Model;
use Core\Model\ModelInterface;
use Core\Database\DatabaseInterface;

 abstract class AbstractModel implements ModelInterface{

    protected $table;
    protected DatabaseInterface $database;


    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

   abstract public function getEntityClass();
   
   public function findByColumn($column, $value, $one = false)
   {
       $sql = "SELECT * FROM {$this->table} WHERE {$column} = :value";
       return $this->database->prepare($sql, ['value' => $value], $this->getEntityClass(), $one);
   }

   public function  delete ($id){
    return   $this->database->prepare("DELETE FROM {$this->table} WHERE id = :id",['id'=>$id],$this->getEntityClass(),true);
   }
 

    public function all()
     {
        return $this->database->query("SELECT * FROM {$this->table}",$this->getEntityClass(),false);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->database->prepare($sql, [$id], $this->getEntityClass(),true);
        return $stmt;
    }
    public function insert(array $data){
         $sql = "INSERT INTO {$this->table} (";
        $sql .= implode(',', array_keys($data));
        $sql .= ') VALUES (';
        $sql .= ':' . implode(',:', array_keys($data));
     return   $sql .= ')';
    }
    public function update(array $data){
        $sql = "UPDATE {$this->table} SET ";
         $sql .= implode('=?,', array_keys($data));
         $sql .= '=:' . implode(',:', array_keys($data)) . ' WHERE id = ?';
         var_dump($sql);
     return   $sql .= '=? WHERE id = ?';
    }

    public function save(array $data){
        if(isset($data['id'])){
            // var_dump($data);
           $sql = $this->update($data);
        }else{
          //  var_dump($data);
            $sql = $this->insert($data);
            // var_dump($sql);
        }
        $this->database->prepare($sql, $data, $this->getEntityClass(),true);
    }

    public function getByForeignKey($value, $key) {
        $sql = "SELECT * FROM {$this->table} WHERE {$key} = :value";
        $stmt = $this->database->prepare($sql, [$value], $this->getEntityClass(),false);
        return $stmt;
    }
    public function updateTable(array $data){
        $id = $data['id'];
         
    $id = $data['id'];
    unset($data['id']); // Retirer l'ID des données à mettre à jour

    $fields = array_keys($data);
    $sql = "UPDATE {$this->table} SET ";

    $setClauses = [];
    foreach ($fields as $field) {
        $setClauses[] = "$field = :$field";
    }
    $sql .= implode(', ', $setClauses);
    $sql .= ' WHERE id = :id';

    $data['id'] = $id; // Réinjecter l'ID dans les paramètres

    $stmt = $this->database->prepare($sql, $data, $this->getEntityClass(),true);
}
    

// Méthode pour déterminer la clé étrangère
        public function foreignKey($relatedClass) {
            // Utiliser ReflectionClass pour obtenir le nom de la classe associée
            $relatedReflection = new \ReflectionClass($relatedClass);
            $relatedClassName = $relatedReflection->getShortName();

            // Construire la clé étrangère en suivant la convention {related_class_name}_id
            return strtolower($relatedClassName) . '_id';
        }

      public function hasMany($model, $foreign_key, $local_key = 'id') {
        $reflect = new \ReflectionClass($model);
        $modelInstance = $reflect->newInstance($this->database);
        return $modelInstance->getByForeignKey($local_key, $foreign_key);
    }


    public function hasOne($model, $foreign_key) {
        // $reflect = new \ReflectionClass($model);
        // $model = $reflect->newInstance($this->database);
        // return $model->getByForeignKey($foreign_key);
    }

    
    //belongsToMany
    public function belongsToMany($model, $foreign_key, $local_key = null){

        // $reflect = new \ReflectionClass($model);
        // $modelInstance = $reflect->newInstance($this->database);
        // return $modelInstance->getByForeignKey($local_key, $foreign_key);

    }
    //belongsToOne
    public function belongsToOne($model, $foreign_key, $local_key = null){

        // $reflect = new \ReflectionClass($model);
        // $modelInstance = $reflect->newInstance($this->database);
        // return $modelInstance->getByForeignKey($local_key, $foreign_key);

    }
    //ManyToMany
    public function ManyToMany($model, $foreign_key, $local_key = null){
    }
    //transanction
    public function transanction($model, $foreign_key, $local_key = null){


    }

    public function setDatabase(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    public function transaction(array $callback)
    {
        //$this->database->transaction($callback);
    }


}