<?php

namespace Framework\Database\Query{
    
    use Framework\Database as Database;
    use Framework\ArrayMethods as ArrayMethods;
    use Framework\Database\Exception as Exception;
    
    class Mysql extends Database\Query {

        public function all(){

            $sql = $this->_buildSelect();
            $result = $this->connector->execute($sql);
 //           print_r($sql);
 //           exit();
            if($result === false){
                
                $error = $this->connector->lastError;
                
                if($error === "Table"." '{$this->connector->schema}.{$this->from}'"." doesn't exist"){
                    $class = ucfirst($this->from);
                    $this->connector->sync(new $class());
                    $sql = $this->_buildSelect();
                    $result = $this->connector->execute($sql);
                    
                    if($result === false){
                        
                        $error = $this->connector->lastError;
                        throw new Exception\Sql("There was an error with your SQL query: {$error}");
                    }
                    
                    $rows = array();
            
                    for($i = 0; $i < $result->num_rows; $i++){

                        $rows[] = $result->fetch_array(MYSQLI_ASSOC);

                    }
            
                    return $rows;
                    
                }
                
                throw new Exception\Sql("SQL query: {$error}");
                
            }
            
            $rows = array();
            
            for($i = 0; $i < $result->num_rows; $i++){

                $rows[] = $result->fetch_array(MYSQLI_ASSOC);
                
            }

//            return ArrayMethods::flatten($rows);
            return $rows;
            
        }
    }
    
}

