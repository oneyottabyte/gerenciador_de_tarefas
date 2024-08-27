<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mt-5">
        <div id="mensagens" class="position-fixed bottom-0 start-0 p-3" style="z-index: 1050;"></div>
        <h1 class="text-center mb-4">Gerenciador de Tarefas</h1>

        <div class="row mb-4">
            <div class="col-md-12 text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTarefaModal">
                    <i class="fas fa-plus"></i> Adicionar Tarefa
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover" id="listaTarefas">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data de Criação</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addTarefaModal" tabindex="-1" aria-labelledby="addTarefaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTarefaModalLabel">Adicionar Nova Tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addTarefaForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTarefaModal" tabindex="-1" aria-labelledby="editTarefaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTarefaModalLabel">Editar Tarefa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editTarefaForm">
                    <input type="hidden" id="tarefaId" name="tarefaId">
                    <input type="hidden" id="statusEdit" name="statusEdit">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tituloEdit" class="form-label">Título:</label>
                            <input type="text" class="form-control" id="tituloEdit" name="tituloEdit" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricaoEdit" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricaoEdit" name="descricaoEdit" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmarExclusaoModal" tabindex="-1" aria-labelledby="confirmarExclusaoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarExclusaoModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir esta tarefa?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmarExclusaoBtn">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <div id="spinner" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-none">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/site.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>