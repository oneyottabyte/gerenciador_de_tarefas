<?php
require_once("../classes/tarefas.class.php");

$tarefa = new Tarefas;

$id = $_POST['tarefaId'];
$titulo = $_POST['tituloEdit'];
$descricao = $_POST['descricaoEdit'];
$status = $_POST['statusEdit'];

$tarefa->getById($id); 
$tarefa->setTitulo($titulo);
$tarefa->setDescricao($descricao);
$tarefa->setStatus($status);

$result = $tarefa->update();

echo $result;
