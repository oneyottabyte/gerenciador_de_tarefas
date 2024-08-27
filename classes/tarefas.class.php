<?php
require_once("conn.class.php");
class Tarefas {
    private $conn;
    private $id;
    private $titulo;
    private $descricao;
    private $dataCriacao;
    private $status;

    public function __construct() {
        $this->conn = new Conn;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function insert(){
        $query = "INSERT INTO tarefas (titulo, descricao) VALUES ('{$this->titulo}', '{$this->descricao}')";
        $sql = $this->conn->query($query);
        if($sql){
            return "ok";
        } else {
            return $this->conn->error();
        }
    }

    public function update(){
        $query = "UPDATE tarefas SET titulo = '{$this->titulo}', descricao = '{$this->descricao}', 
                  status = '{$this->status}' WHERE id = {$this->id}";
        $sql = $this->conn->query($query);
        if($sql){
            return "ok";
        } else {
            return $this->conn->error();
        }
    }

    public function delete(){
        $query = "DELETE FROM tarefas WHERE id = {$this->id}";
        $sql = $this->conn->query($query);
        if($sql){
            return "ok";
        } else {
            return $this->conn->error();
        }
    }

    public function getAll(){
        $query = "SELECT * FROM tarefas ORDER BY data_criacao ASC";
        $sql = $this->conn->query($query);
        $result = $this->conn->fetchAll($sql);
        return $result;
    }

    public function getById($id){
        $query = "SELECT * FROM tarefas WHERE id = {$id}";
        $sql = $this->conn->query($query);
        $result = $this->conn->fetch($sql);
        if($result) {
            $this->id = $result->id;
            $this->titulo = $result->titulo;
            $this->descricao = $result->descricao;
            $this->status = $result->status;
            $this->dataCriacao = $result->data_criacao;
        }
        return $result;
    }

    public function concluir() {
        $query = "UPDATE tarefas SET status = 'concluída' WHERE id = {$this->id}";
        $sql = $this->conn->query($query);
        if ($sql) {
            return "ok";
        } else {
            return $this->conn->error();
        }
    }
}