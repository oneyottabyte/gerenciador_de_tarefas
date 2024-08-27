$(document).ready(function() {
    
    carregarTarefas();

    $("#addTarefaForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "control/insert.php",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response === "ok") {
                    $("#addTarefaModal").modal("hide");
                    $("#addTarefaForm")[0].reset();
                    carregarTarefas();
                    exibirMensagem("Tarefa adicionada com sucesso!", "success");
                } else {
                    exibirMensagem("Erro ao adicionar tarefa: " + response, "danger");
                }
            },
            error: function(xhr, status, error) {
                exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
            }
        });
    });

   
    $(document).on("click", ".btn-editar", function() {
        var tarefaId = $(this).data("tarefa-id");
        $.ajax({
            url: "control/edit.php", 
            type: "POST",
            data: {acao: "obterTarefa", tarefaId: tarefaId},
            success: function(response) {
                if (response !== null) {
                    
                    $("#tarefaId").val(response.id);
                    $("#tituloEdit").val(response.titulo);
                    $("#descricaoEdit").val(response.descricao);
                    $("#dataLimiteEdit").val(response.dataLimite);
                    $("#editTarefaModal").modal("show");
                } else {
                    exibirMensagem("Tarefa não encontrada.", "danger");
                }
            },
            error: function(xhr, status, error) {
                exibirMensagem("Erro ao obter a tarefa: " + error, "danger");
            }
        });
    });

    // Salvar edição
    $("#editTarefaForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "control/edit.php", 
            type: "POST",
            data: formData,
            success: function(response) {
                if (response === "ok") {
                    
                    $("#editTarefaModal").modal("hide");
                    carregarTarefas(); 
                    exibirMensagem("Tarefa editada com sucesso!", "success");
                } else {
                    
                    exibirMensagem("Erro ao editar tarefa: " + response, "danger");
                }
            },
            error: function(xhr, status, error) {
                exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
            }
        });
    });

    // Excluir Tarefa
    $(document).on("click", ".btn-excluir", function() {
        var tarefaId = $(this).data("tarefa-id");
        if (confirm("Tem certeza que deseja excluir esta tarefa?")) {
            $.ajax({
                url: "control/delete.php",
                type: "POST",
                data: {acao: "excluirTarefa", tarefaId: tarefaId},
                success: function(response) {
                    if (response === "ok") {
                        
                        carregarTarefas();
                        exibirMensagem("Tarefa excluída com sucesso!", "success");
                    } else {
                        
                        exibirMensagem("Erro ao excluir tarefa: " + response, "danger");
                    }
                },
                error: function(xhr, status, error) {
                    exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
                }
            });
        }
    });

    
    $(document).on("click", ".btn-concluir", function() {
        var tarefaId = $(this).data("tarefa-id");
        $.ajax({
            url: "control/concluir.php", 
            type: "POST",
            data: {acao: "concluirTarefa", tarefaId: tarefaId},
            success: function(response) {
                if (response === "ok") {
                    
                    carregarTarefas();
                    exibirMensagem("Tarefa marcada como concluída!", "success");
                } else {
                    
                    exibirMensagem("Erro ao concluir tarefa: " + response, "danger");
                }
            },
            error: function(xhr, status, error) {
                exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
            }
        });
    });

    function carregarTarefas() {
        $.ajax({
            url: "control/carregarTodas.php",
            type: "GET",
            success: function(response) {
                $("#listaTarefas tbody").empty();
                if (response) {
                    $.each(JSON.parse(response), function(index, tarefa) {
                        var linha = `<tr>
                                        <td>${tarefa.titulo}</td>
                                        <td>${tarefa.descricao}</td>
                                        <td>${tarefa.dataCriacao}</td>
                                        <td>${tarefa.status}</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning btn-editar" data-tarefa-id="${tarefa.id}">Editar</button>
                                            <button class="btn btn-danger btn-excluir" data-tarefa-id="${tarefa.id}">Excluir</button>
                                            <button class="btn btn-success btn-concluir" data-tarefa-id="${tarefa.id}">Concluir</button>
                                        </td>
                                    </tr>`;
                        $("#listaTarefas tbody").append(linha);
                    });
                } else {
                    $("#listaTarefas tbody").append('<tr><td colspan="5" class="text-center">Nenhuma tarefa encontrada</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                exibirMensagem("Erro ao carregar as tarefas: " + error, "danger");
            }
        });
    }

    function exibirMensagem(mensagem, tipo) {
        $("#mensagens").html(`<div class="alert alert-${tipo} alert-dismissible fade show" role="alert">
                                    ${mensagem}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>`);
    }
});