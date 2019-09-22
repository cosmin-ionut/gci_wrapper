<?php

class executor
{
    private $dbInstance;

    public function __construct(databaseContract $dbInstance)
    {
        $this->dbInstance = $dbInstance;
    }

    protected function executor(string $sql, array $parameters = null)
    {
        if($parameters)
        {
            $statement = $this->dbInstance->pdo->prepare($sql);
    
            $x=1;
            foreach($parameters as $field => $value)
            {
                $statement->bindValue($x, $value);
                $x++;
            }
            if($statement->execute())
            {
                $this->result = $statement;
            }
        }
        else
        {
            $statement = $this->dbInstance->pdo->prepare($sql);
            $statement->execute();
        }
        if(strpos($sql, 'SELECT') !== false)
            {
                print_r($statement->fetchAll(PDO::FETCH_ASSOC));
            }
    }

}
