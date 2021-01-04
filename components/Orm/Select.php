<?php
namespace Components\Orm;

class Select
{
    protected $tableName = "";
    protected $columns = "*";
    protected $orderBy = "";
    protected $groupBy = "";
    protected $limit = "";
    protected $join = [];

    private $connection;

    public function __construct()
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

    public function orderBy($columns)
    {
        $this->orderBy = $columns;
    }

    public function groupBy($columns)
    {
        $this->groupBy = $columns;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
    }

    public function join($join)
    {
        $this->join = $join;
    }

    private function prepareColumns()
    {
        if (is_array($this->columns)) {
            $result = [];
            foreach ($this->columns as $key => $value) {
                $result[] = $value . (is_int($key)? "": " AS $key");
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
                $result[] = $value . (is_int($key)? "": " AS $key");
            }
            return implode(", ", $result);
        } else {
            return $this->tableName;
        }
    }

    private function prepareOrder()
    {
        if (empty($this->orderBy))
            return "";

        if (is_array($this->orderBy)) {
            $result = [];
            foreach ($this->orderBy as $key => $value) {
                $result[] = $value . (strtoupper($key) === "DESC"? " DESC": "");
            }
            $result = implode(", ", $result);
        } else {
            $result .= $this->orderBy;
        }

        return " ORDER BY $result";
    }

    private function prepareGroup()
    {
        if (empty($this->groupBy))
            return "";

        if (is_array($this->groupBy)) {
            $result = implode(", ", $this->groupBy);
        } else {
            $result = $this->groupBy;
        }

        return " GROUP BY $result";
    }

    private function prepareLimit()
    {
        if (empty($this->limit))
            return "";

        $result = is_array($this->limit)? implode(", ", $this->limit): $this->limit;
        return " LIMIT $result";
    }

    private function prepareJoin()
    {
        if (empty($this->join))
            return "";

        extract($this->join);

        $result = " ";
        switch (strtoupper($type)) {
            case "INNER":
            case "LEFT":
            case "RIGHT":
                $result .= "$type JOIN $table $alias";
                if (isset($using)) {
                    $result .= " USING ($using)";
                } elseif (isset($on)) {
                    $result .= " ON $on";
                } else {
                    return "";
                }
                break;
            case "CROSS":
                $result = " CROSS JOIN $table $alias";
                break;
        }
        return $result;
    }

    private function createSQL():string
    {
        return "SELECT " 
            . $this->prepareColumns()
            . " FROM " 
            . $this->prepareTableNames()
            . $this->prepareJoin()
            . $this->prepareGroup()
            . $this->prepareOrder()
            . $this->prepareLimit();
    }

    public function execute()
    {
        $sql = $this->createSQL();
        echo $sql;
        return $this->connection->query($sql);
    }
}