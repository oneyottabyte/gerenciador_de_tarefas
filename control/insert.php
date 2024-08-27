<?php
require_once("../classes/tarefas.class.php");

$tarefa = new Tarefas;

$tarefa->setTitulo($titulo);
$tarefa->setDescricao($descricao);
$result = $tarefa->insert();

echo $result;