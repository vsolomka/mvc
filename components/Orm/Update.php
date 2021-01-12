<?php
namespace Components\Orm;

class Update
{
    protected $table = "";
    protected $values = [];
    protected $where = "";
    protected $where_type = "";
    private $connection;

    public function __construct()
    {
        $connector = new Connector();
        $this->connection = $connector->connect();
    }

    public function table($table)
    {
        $this->table = $table;
    }

    public function values($values)
    {
        $this->values = $values;
    }

    public function where($condition, $type = "AND")
    {
        $this->where = $condition;
        $this->where_type = $type;
    }

    public function prepareValues()
    {
        if (is_array($this->values)) {
            foreach ($this->values as $field => $value) {
                $values[] = "$field = " . (is_numeric($value)? $value: "\"$value\"");
            }
            $result = implode(", ", $values);
        } else {
            $result = $this->values;
        }
        
        return " SET $result";
    }

    private function prepareWhere()
    {
        $where = new Where();
        $where->where($this->where);
        return $where->getWhere($this->where_type);
    }

    private function createSQL():string
    {
        return "UPDATE " 
            . $this->table 
            . $this->prepareValues()
            . $this->prepareWhere();
    }

    public function execute()
    {
        $sql = $this->createSQL();
        $this->connection->query($sql);
    }
}