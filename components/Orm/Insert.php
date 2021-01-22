<?php
namespace Components\Orm;

class Insert
{
    public $table = "";
    public $values = [];
    private $connection;

    public function __construct()
    {
        $connector = new Connector();
        $this->connection = $connector->connect();
    }

    public function into($table)
    {
        $this->table = $table;
    }

    public function values(array $values)
    {
        $this->values = $values;
    }

    public function prepareValues()
    {
        $fields = implode(", ", array_keys($this->values));
        $values = [];
        foreach (array_values($this->values) as $value) {
            $values[] = is_numeric($value)? $value: "\"$value\"";
        }
        $values = implode(", ", $values);
        
        return " ($fields) VALUES ($values)";
    }

    private function createSQL():string
    {
        return "INSERT INTO " . $this->table . $this->prepareValues();
    }

    public function execute()
    {
        $sql = $this->createSQL();
        return $this->connection->exec($sql);
    }
}