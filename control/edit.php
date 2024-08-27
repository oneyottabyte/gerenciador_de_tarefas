<?php
require_once("../classes/tarefas.class.php");

$tarefa = new Tarefas;

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];

$tarefa->getById($id); 
$tarefa->setTitulo($titulo);
$tarefa->setDescricao($descricao);
$tarefa->setStatus($status);

$result = $tarefa->update();

echo $result;
