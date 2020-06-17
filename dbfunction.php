<?php

date_default_timezone_set("Asia/Taipei");

class dbfunction
{
    private $db_host="localhost";
    private $db_name = "ciras"; 
    private $db_user = "root"; 
    private $db_pass = ''; 
    private $db;


    function connect()
    {
        try
        {
            $this->db=new PDO("mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8",$this->db_user,$this->db_pass);
            $this->db->exec("set names utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOEXCEPTION $e)
        {
            $e->getMessage();
        }
    }

    function db(){
        return $this->db;
     }

    function insert5($table, $column1,$column2,$column3,$column4, $column5,$value1,$value2,$value3,$value4,$value5)
    {
        $sql = "INSERT INTO $table ($column1, $column2, $column3,$column4,$column5) VALUES (?,?,?,?,?)";
        $this->db->prepare($sql)->execute([$value1,$value2,$value3,$value4,$value5]);
        //$condition = "INSERT INTO $table ($column) VALUES ($value)";
        //$query = $this->db->query($condition);
        //return $query;
    }

    function insert3($table, $column1,$column2,$column3,$value1,$value2,$value3)
    {
        $sql = "INSERT INTO $table ($column1, $column2, $column3) VALUES (?,?,?)";
        $this->db->prepare($sql)->execute([$value1,$value2,$value3]);
       
    }

    function insert2($table, $column1,$column2,$value1,$value2)
    {
        $sql = "INSERT INTO $table ($column1, $column2) VALUES (?,?)";
        $this->db->prepare($sql)->execute([$value1,$value2]);
    }

    function delete($table,$column,$value)
    {
        $sql = "DELETE FROM $table WHERE $column = ?";
        $this->db->prepare($sql)->execute(array($value));
    }

    function update($table,$column1,$colume2,$value1,$value2)
    {
        $sql = "UPDATE $table SET $column1=? WHERE $colume2=?";
        $this->db->prepare($sql)->execute(array($value1,$value2)); 
    }

    function select2($table,$column1,$column2,$value1,$value2)
    {
        $sth=$this->db() -> prepare("SELECT * FROM $table where $column1 LIKE ? AND $column2 LIKE ?");
        $sth -> execute(array($value1,$value2));
        $result = $sth -> fetch(PDO::FETCH_ASSOC) ;
        return $result;
    }

    function select1($table,$column1,$value1,$value2)
    {
        $sql= "SELECT $value1 FROM $table WHERE $column1 = $value2";
        $stmt = $this->db->query($sql); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
        //$folder_id= $row['folder_id'];
    }

    function select0($table)
    {
        $sql= "SELECT * FROM $table";
        $stmt = $this->db->query($sql); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
        //$folder_id= $row['folder_id'];
    
    }
}

?>