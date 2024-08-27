$(document).ready(function () {

    carregarTarefas();

    $("#addTarefaForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "control/insert.php",
            type: "POST",
            data: formData,
            success: function (response) {
                if (response === "ok") {
                    $("#addTarefaModal").modal("hide");
                    $("#addTarefaForm")[0].reset();
                    carregarTarefas();
                    exibirMensagem("Tarefa adicionada com sucesso!", "success");
                } else {
                    exibirMensagem("Erro ao adicionar tarefa: " + response, "danger");
                }
            },
            error: function (xhr, status, error) {
                exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
            }
        });
    });


    $(document).on("click", ".btn-editar", function () {
        var tarefaId = $(this).data("tarefa-id");
        $.ajax({
            url: "control/getById.php",
            type: "POST",
            data: { id: tarefaId },
            success: function (res) {
                response = JSON.parse(res)
                console.log(response)
                if (response !== null) {
                    $("#tarefaId").val(response.id);
                    $("#tituloEdit").val(response.titulo);
                    $("#descricaoEdit").val(response.descricao);
                    $("#statusEdit").val(response.status);
                    $("#editTarefaModal").modal("show");
                } else {
                    exibirMensagem("Tarefa não encontrada.", "danger");
                }
            },
            error: function (xhr, status, error) {
                exibirMensagem("Erro ao obter a tarefa: " + error, "danger");
            }
        });
    });

    // Salvar edição
    $("#editTarefaForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        console.log(this);
        $.ajax({
            url: "control/edit.php",
            type: "POST",
            data: formData,
            success: function (response) {
                if (response === "ok") {
                    $("#editTarefaModal").modal("hide");
                    carregarTarefas();
                    exibirMensagem("Tarefa editada com sucesso!", "success");
                } else {

                    exibirMensagem("Erro ao editar tarefa: " + response, "danger");
                }
            },
            error: function (xhr, status, error) {
                exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
            }
        });
    });

    $(document).on("click", ".btn-excluir", function () {
        var tarefaId = $(this).data("tarefa-id");
        if (confirm("Tem certeza que deseja excluir esta tarefa?")) {
            $.ajax({
                url: "control/delete.php",
                type: "POST",
                data: { id: tarefaId },
                success: function (response) {
                    if (response === "ok") {
                        carregarTarefas();
                        exibirMensagem("Tarefa excluída com sucesso!", "success");
                    } else {

                        exibirMensagem("Erro ao excluir tarefa: " + response, "danger");
                    }
                },
                error: function (xhr, status, error) {
                    exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
                }
            });
        }
    });


    $(document).on("click", ".btn-concluir", function () {
        var tarefaId = $(this).data("tarefa-id");
        $.ajax({
            url: "control/concluir.php",
            type: "POST",
            data: { id: tarefaId },
            success: function (response) {
                if (response === "ok") {

                    carregarTarefas();
                    exibirMensagem("Tarefa marcada como concluída!", "success");
                } else {

                    exibirMensagem("Erro ao concluir tarefa: " + response, "danger");
                }
            },
            error: function (xhr, status, error) {
                exibirMensagem("Erro ao processar a solicitação: " + error, "danger");
            }
        });
    });

    function carregarTarefas() {
        $.ajax({
            url: "control/getAll.php",
            type: "GET",
            success: function (response) {
                $("#listaTarefas tbody").empty();
                if (response) {
                    $.each(JSON.parse(response), function (index, tarefa) {
                        var linha = `<tr>
                                        <td>${tarefa.titulo}</td>
                                        <td>${tarefa.descricao}</td>
                                        <td>${tarefa.data_criacao}</td>
                                        <td>${tarefa.status}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Ações">
                                                <button class="btn btn-warning btn-editar" data-tarefa-id="${tarefa.id}" title="Editar"><i class="fa-regular fa-pen-to-square"></i></button>
                                                <button class="btn btn-danger btn-excluir" data-tarefa-id="${tarefa.id}" title="Excluir"><i class="fa-solid fa-trash"></i></button>
                                                <button class="btn btn-success btn-concluir" data-tarefa-id="${tarefa.id}" title="Concluir"><i class="fa-regular fa-square-check"></i></i></button>
                                            </div>
                                        </td>
                                    </tr>`;
                        $("#listaTarefas tbody").append(linha);
                    });
                } else {
                    $("#listaTarefas tbody").append('<tr><td colspan="5" class="text-center">Nenhuma tarefa encontrada</td></tr>');
                }
            },
            error: function (xhr, status, error) {
                exibirMensagem("Erro ao carregar as tarefas: " + error, "danger");
            }
        });
    }

    function exibirMensagem(mensagem, tipo) {
        const alerta = $(`
            <div class="alert alert-${tipo} alert-dismissible fade show" role="alert">
                ${mensagem}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);

        $('#mensagens').append(alerta);

        setTimeout(() => {
            alerta.alert('close');
        }, 5000);
    }
});