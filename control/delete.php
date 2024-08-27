<?php
require_once("../classes/tarefas.class.php");

$user = new Tarefas;

$id = $_POST['id'];

$tarefa->getById($id);
$result = $tarefa->delete();

echo $result;
