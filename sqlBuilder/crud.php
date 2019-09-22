<?php
/*
This class' purpose is to create the very basic crud queries.
For the class that creates the clauses, please see 'build.php'

*/


class CRUD extends executor
{
    public $sql = null;
    public $values = [];

    public function insert(string $table, array $parameters)
    {   
        $queryFields = '';
        $queryValues = '';
        
        
        foreach($parameters as $field => $value)
        {
            $queryFields .= $field.', ';
            $queryValues .= '?,';
            array_push($this->values, $value);
        }

        $queryFields = rtrim($queryFields, ', ');
        $queryValues = rtrim($queryValues, ', ');

        $this->sql = "INSERT INTO $table ($queryFields) VALUES ($queryValues)";
       return $this;
    }

    public function update(string $table, array $set)
    {        
        $queryFields = '';

        foreach($set as $field => $value)
            {
                $queryFields .= $field.' = ?, ';
                array_push($this->values, $value);
            }
            $queryFields = rtrim($queryFields, ', ');

            $this->sql = "UPDATE $table SET $queryFields";
            return $this;
    }

    public function select(string $table, array $parameters = ['*'], $distinct = '')
    {   
        $fields = '';

        foreach($parameters as $field)
        {
            $fields .= $field.', ';
        }

        $fields = rtrim($fields, ', ');

        $this->sql = "SELECT $distinct".' '."$fields FROM $table";
        return $this;
        
    }

    public function delete(string $table)
    {        
        $this->sql = "DELETE FROM $table";
        return $this;
    }
    
}


