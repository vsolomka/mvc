<?php
namespace Components\Orm;

class Delete
{
    public $table = "";
    public $where = [];
    private $connection;

    public function __construct()
    {
        $connector = new Connector();
        $this->connection = $connector->connect();
    }

    public function from($table)
    {
        $this->table = $table;
    }

    public function where($condition, $type = "AND")
    {
        $this->where = $condition;
        $this->where_type = $type;
    }

    private function prepareWhere()
    {
        $where = new Where();
        $where->where($this->where);
        return $where->getWhere($this->where_type);
    }

    private function createSQL():string
    {
        return "DELETE FROM " . $this->table . $this->prepareWhere();
    }

    public function execute()
    {
        $sql = $this->createSQL();
        $this->connection->query($sql);
    }
}