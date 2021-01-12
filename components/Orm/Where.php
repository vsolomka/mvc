<?php
namespace Components\Orm;

class Where
{
    const AND_CONDITION = "AND";
    const OR_CONDITION = "OR";
    public $condition;

    public function where($condition)
    {
        $this->condition = $condition;
    }

    public function getWhere($type = self::AND_CONDITION)
    {
        if (is_array($this->condition)) {
            $result = [];
            foreach ($this->condition as $column => $value) {
                $result[] = (empty($result)? "": "$type ") . "$column = " . (is_numeric($value)? $value: "\"$value\"");
            }
            $result = implode(" ", $result);
        } else {
            $result = $this->condition;
        }

        return empty($result)? "": " WHERE $result ";
    }

}