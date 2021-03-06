<?php
namespace Components\Orm;

class Select
{
    protected $tableName = "";
    protected $columns = "*";
    protected $orderBy = "";
    protected $groupBy = "";
    protected $limit = 0;
    protected $offset = 0;
    protected $join = [];
    protected $where = "";
    protected $where_type = "";

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

    public function limit(int $limit)
    {
        $this->limit = $limit;
    }

    public function offset(int $offset)
    {
        $this->offset = $offset;
    }

    public function join($join)
    {
        $this->join = $join;
    }

    public function where($condition, $type = "AND")
    {
        $this->where = $condition;
        $this->where_type = $type;
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

    private function prepareWhere()
    {
        $where = new Where();
        $where->where($this->where);
        return $where->getWhere($this->where_type);
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
        if (empty($this->limit)) return "";

        return " LIMIT " . ($this->offset !== 0? $this->offset . ", ": "") . $this->limit;
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
            . $this->prepareWhere()
            . $this->prepareGroup()
            . $this->prepareOrder()
            . $this->prepareLimit();
    }

    public function execute()
    {
        $sql = $this->createSQL();
        if ($result = $this->connection->query($sql))
            return $result->fetchAll();
        else
            return [];
    }
}