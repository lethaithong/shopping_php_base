<?php
    class Database extends PDO{
        public function __construct($connect,$user,$pass){
            parent::__construct($connect,$user,$pass);
        }

        public function select($sql,$data = array(), $fetchstyle = PDO::FETCH_ASSOC){
            $statement = $this->prepare($sql);

            foreach($data as $k=>$v){
                $statement->bindParam($k, $v);
            }

            $statement->execute();
            return $statement->fetchAll($fetchstyle);   
        }

        public function insert($table,$data){

        $keys = implode(",", array_keys($data));
        $values = ":" .implode(", :", array_keys($data));

        $sql = "INSERT INTO $table($keys) VALUES($values)";
        $statement = $this->prepare($sql);

        foreach($data as $k => $v){
            $statement->bindValue(":$k", $v);
        }   
        return $statement->execute();
        }

        public function update($table,$data,$cond){
            $updatekeys = null;
            foreach($data as $k => $v){
                $updatekeys .= "$k = :$k,";
            }   
            $updatekeys = rtrim($updatekeys,',');
            $sql = "UPDATE $table SET $updatekeys WHERE $cond";
            $statement = $this->prepare($sql);
            $statement->bindValue(":$k", $v);
            foreach($data as $k => $v){
                $statement->bindValue(":$k", $v);
            }   
            return $statement->execute();
        }

        public function delete($table,$cond,$limit=1 ){
            $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
            return $this->exec($sql);
        }

        public function delete1($table,$cond){
            $sql = "DELETE FROM $table WHERE $cond";
            return $this->exec($sql);
        }

        public function affectedRows($sql, $email, $password){

            $statement = $this->prepare($sql);
            $statement->execute(array($email, $password));
            return $statement->rowCount();
        }

        public function selectUser($sql, $email, $password){

            $statement = $this->prepare($sql);
            $statement->execute(array($email, $password));
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
?>