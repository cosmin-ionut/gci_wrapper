<?php

/*
This class is the class instantiated in a controller file to interogate the database.
It doesn't matter if you want to run basic queries, or more complex ones (using clauses), this is the class
you wanna instantiate.
It's purpose is to create the clauses, and execute the query through the go() method.

*/

class buildSQL extends CRUD
{
    public function where(array $parameters) : object //-----where() method to chain to a query----------------------------------------
    {
        $ands = '';

        if(count($parameters) == 1)
        {
            foreach($parameters as $field => $value)
            {
                if(strpos($value, '%') !== false){
                    $this->sql .= ' WHERE '.$field.' LIKE ?';
                }
                else{
                    $this->sql .= ' WHERE '.$field.' = ?';
                }
                array_push($this->values, $value);
            }
        }
        else
        {
            foreach($parameters as $field => $value)
            {
                if(strpos($value, '%') !== false){
                    $ands .= 'AND '.$field.' LIKE ? ';
                }
                else{
                    $ands .= 'AND '.$field.' = ? ';
                }
                array_push($this->values, $value);
            }
            $aa = ltrim($ands, ' AND');
            $this->sql .= ' WHERE '.$aa;
        }
        return $this;
    }

    public function not(array $parameters) : object//----------------------------the wherenot method to chain to query---------------------------------------
    {

        $notWhere = '';
        $notFields = '';

        foreach($parameters as $notField => $notValues)
        {
            if(is_array($notValues))
            {
                foreach($notValues as $value)
                {
                    $notFields .= ' AND NOT '.$notField.' = ?';
                    array_push($this->values, $value);
                }
            $notFields = ltrim($notFields, ' AND NOT ');
            }
            else
            {
                $notWhere .= $notField.' = ? AND NOT ';
                array_push($this->values, $notValues);
            }   
        }
        if($notFields != '')
        {
            $notWhere = ' AND NOT '.$notWhere;   
        }    
        $notWhere = rtrim($notWhere, ' AND NOT ');
        $this->sql .= ' WHERE NOT '.$notFields.$notWhere;
        return $this; 
    }

    public function or(array $parameters) : object//------or() method that can be chained to a query-----------------------------------------
    {
        $fields = '';

        foreach($parameters as $field => $valori)
        {
            if(is_array($valori))
            {
                foreach($valori as $value)
                {
                    $fields .= ' OR '.$field.' = ?';
                    array_push($this->values, $value);
                }
            }
            else
            {
                $fields .= ' OR '.$field.' = ?';
                array_push($this->values, $valori);
            }   
                
        }
        $this->sql .= $fields;
        return $this;
    }

    public function order(array $parameters) : object//------order() method that can be chained to a query-----------------------------------------
    {   
        foreach($parameters as $field => $condition)
        {
          $order = ' ORDER BY '.$field.' '.$condition;
                
        }
        $this->sql .= $order;
        return $this;
    }  

    public function go()
    {
        print_r($this->sql);
        $this->executor($this->sql, $this->values);
    }

}