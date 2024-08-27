<?php
require_once("../classes/tarefas.class.php");

$tarefa = new Tarefas;

$id = $_POST['id'];

$tarefa->getById($id);
$result = $tarefa->concluir();

echo $result;