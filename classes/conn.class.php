<?php
class Conn
{
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'kURz4pC9@s6zyiYk$SLp';
    private $banco = 'tarefas';
    private $result;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->banco);
        if ($this->conn->connect_error) {
            die("Erro ao conectar o servidor do banco de dados. Favor contactar o administrador:" . $this->conn->connect_error);
        }
        mysqli_query($this->conn, "SET NAMES 'utf8'");
        mysqli_query($this->conn, 'SET character_set_connection=utf8');
        mysqli_query($this->conn, 'SET character_set_client=utf8');
        mysqli_query($this->conn, 'SET character_set_results=utf8');
    }
    public function query($query)
    {
        $sql = mysqli_query($this->conn, $query);
        return $sql;
    }
    public function fetch($sql)
    {
        $result = mysqli_fetch_object($sql);
        return $result;
    }
    public function fetchAll($sql)
    {
        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $result;
    }
    public function num($sql)
    {
        $num = mysqli_num_rows($sql);
        return $num;
    }
    public function last()
    {
        $id = mysqli_insert_id($this->conn);
        return $id;
    }
    public function error()
    {
        $error = mysqli_error($this->conn);
    }
    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}
