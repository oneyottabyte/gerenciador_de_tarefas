<?php
require_once("../classes/tarefas.class.php");

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$tarefa = new Tarefas;
$tarefa->setTitulo($titulo);
$tarefa->setDescricao($descricao);
$result = $tarefa->insert();

echo $result;