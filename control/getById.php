<?php
require_once("../classes/tarefas.class.php");

$id = $_POST['id'];

$tarefa = new Tarefas();

$result = $tarefa->getById($id);

echo json_encode($result);
