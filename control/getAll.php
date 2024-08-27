<?php
require_once("../classes/tarefas.class.php");

$tarefa = new Tarefas();
$result = $tarefa->getAll();

echo json_encode($result);
