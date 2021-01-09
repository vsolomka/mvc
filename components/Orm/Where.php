<?php
namespace Components\Orm;

class Where
{
    public $condition;

    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

    public function getCondition()
    {
        if (is_array($this->condition)) {
            $result = [];
            foreach ($this->condition as $field => $value) {
                $result[] =  (is_int($field)? "": "$field == ") . $value;
            }
            $result = implode(" AND ", $result);
        } else {
            $result = $this->condition;
        }

        return " WHERE $result ";
    }
}