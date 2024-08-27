<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqk1Q27o+wG+UejAKWx/15WgXypKeThb+l/h/l/q/PFqdq+Pv/gynnA2V0NEcYY5NwcFjwk/kg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <div id="mensagens" class="mt-3"></div>
        <h1 class="text-center mb-4">Gerenciador de Tarefas</h1>

        <div class="row mb-4">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#addTarefaModal">
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="addTarefaForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="editTarefaForm">
                    <input type="hidden" id="tarefaId" name="tarefaId">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tituloEdit">Título:</label>
                            <input type="text" class="form-control" id="tituloEdit" name="tituloEdit" required>
                        </div>
                        <div class="form-group">
                            <label for="descricaoEdit">Descrição:</label>
                            <textarea class="form-control" id="descricaoEdit" name="descricaoEdit" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>