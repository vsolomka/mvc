<?php
namespace Components\Orm;

class Select
{
    protected $tableName = "";
    protected $columns = "*";
    private $connection;

    public function __consruct()
    {
        $connector = new Connector();
        $this->connection = $connector->connect();
    }

    public function from($tableName)
    {
        $this->tableName = $tableName;
    }

    public function columns($columns)
    {
        $this->columns = $columns;
    }

    private function prepareColumns()
    {
        if (is_array($this->columns)) {
            $result = [];
            foreach ($this->columns as $key => $value) {
                $result[] = $value . (is_int($key)? " AS $key": "");
            }
            return implode(", ", $result);
        } else {
            return $this->columns;
        }
    }

    private function prepareTableNames()
    {
        if (is_array($this->tableName)) {
            $result = [];
            foreach ($this->tableName as $key => $value) {
                $result[] = $value . (is_int($key)? " AS $key": "");
            }
            return implode(", ", $result);
        } else {
            return $this->tableName;
        }
    }

    private function createSQL():string
    {
        return "SELECT " 
            . $this->prepareColumns()
            . " FROM " 
            . $this->prepareTableNames();
    }

    public function execute()
    {
        var_export($this->connection);
        $sql = $this->createSQL();
        return $this->connection->query($sql);
    }
}