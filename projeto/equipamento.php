<?php
require_once('../database/conexao.php');
date_default_timezone_set('America/Sao_Paulo')
?>
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
    <input type="radio" class="btn-check" name="btnradio" id="newEquipamento" autocomplete="off">
    <label class="btn btn-outline-primary newEqText" for="newEquipamento">Novo Equipamento</label>

    <input type="radio" class="btn-check" name="btnradio" id="list" autocomplete="off" checked>
    <label class="btn btn-outline-primary" for="list">Lista de Equipamento</label>

    <input type="radio" class="btn-check" name="btnradio" id="location" autocomplete="off">
    <label class="btn btn-outline-primary" for="location">Maps/Localização</label>

    <input type="radio" class="btn-check" name="btnradio" id="editClient" autocomplete="off">
</div>
<div id="novoEquipamento" class="d-none">
    <div class="p-4">
        <h3>Preenchar corretamente os Dados Abaixo!</h3>
        <p class="p_add">Vincule o Equipamento ao Cliente Responsável por Ele</p>
        <form method="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" id="tipo" name="tipo" class="form-control" placeholder="Tipo do Equipamento...">
                        <label for="tipo">Tipo do Equipamento*</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" name="modelo" id="modelo" placeholder="Modelo do Equipamento..." class="form-control">
                        <label for="modelo">Modelo do Equipamento</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" name="marca" id="marca" placeholder="Marca do Equipamento..." class="form-control">
                        <label for="marca">Marca do Equipamento</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <select name="id_cliente" id="id_cliente" class="form-select">
                            <option value="0" selected>Selecione um Cliente</option>
                            <?php
                            $query = $pdo->query("SELECT * FROM clientes;");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            if (count($res) > 0) {
                                for ($i = 0; $i < count($res); $i++) {
                            ?>
                                    <option value="<?= $res[$i]['id_cliente'] ?>"><?= $res[$i]['nome'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <label for="id_cliente">Cliente</label>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea name="problema" id="problema" class="form-control" style="height: 130px;" placeholder="Problema Relatado"></textarea>
                        <label for="problema">Problema Relatado</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="mao_obra" id="mao_obra" placeholder="Valor da Mão de Obra" class="form-control" value="1.00">
                                <label for="mao_obra">Valor da Mão de Obra</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="valor_pecas" id="valor_pecas" placeholder="Valor das Peças" class="form-control" value="1.00">
                                <label for="valor_pecas">Valor das Peças</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="valor_total" id="valor_total" placeholder="Valor Total" class="form-control" value="1.00">
                                <label for="valor_total">Valor Total</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="servico" id="servico" class="form-control" placeholder="Serviço Prestado">
                                <label for="servico">Serviço Prestado</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="status" id="status" class="form-select">
                            <option value="Aguardando diagnóstico" selected>Aguardando diagnóstico</option>
                            <option value="Em diagnóstico">Em diagnóstico</option>
                            <option value="Aguardando aprovação">Aguardando aprovação</option>
                            <option value="Aguardando peça">Aguardando peça</option>
                            <option value="Em conserto">Em conserto</option>
                            <option value="Em teste">Em teste</option>
                            <option value="Pronto para entrega">Pronto para entrega</option>
                            <option value="Entregue">Entregue</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                        <label for="status">Selecione um Status para o Equipamento</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="data_entrada" id="data_entrada" class="form-control" placeholder="Data Entrada" value="<?= date('Y-m-d') ?>">
                                <label for="data_entrada">Data de Entrada</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="data_entrega" id="data_entrega" class="form-control" placeholder="Data Entrada" value="<?= date('Y-m-d') ?>">
                                <label for="data_entrega">Data de Entrega</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea name="obs" id="obs" placeholder="Observações..." class="form-control" style="height: 180px;"></textarea>
                        <label for="obs">Observações...</label>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <input type="hidden" name="id_equipamento" id="id_equipamento">
                    <button type="submit" class="btn btn-primary py-3 btn-form">Salvar Equipamento</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="listView">
    <div class="py-4">
        <h3>Lista de Equipamento</h3>
        <p>Faça suas alterações!</p>
        <div class="table"></div>
    </div>
</div>

<script>
    var pag = '<?= $_GET['pag']; ?>'

    function alternar() {
        let novoEQ = document.getElementById('newEquipamento')
        let location = document.getElementById('location')
        let edit = document.getElementById('editClient')
        let list = document.getElementById('list')
        if (novoEQ.checked) {
            $('#novoEquipamento').removeClass();
            $('#locationView').removeClass();
            $('#edit').removeClass();
            $("#listView").removeClass();
            $('#novoEquipamento').addClass('d-block')
            $('#locationView').addClass('d-none');
            $('#edit').addClass('d-none')
            $('#listView').addClass('d-none');
        }
        if (location.checked) {
            $('#novoCliente').removeClass();
            $('#locationView').removeClass();
            $('#edit').removeClass();
            $("#listView").removeClass();
            $('#novoCliente').addClass('d-none')
            $('#locationView').addClass('d-block');
            $('#edit').addClass('d-none')
            $('#listView').addClass('d-none');
        }
        if (edit.checked) {
            $('#novoCliente').removeClass();
            $('#locationView').removeClass();
            $('#edit').removeClass();
            $("#listView").removeClass();
            $('#novoCliente').addClass('d-none')
            $('#locationView').addClass('d-none');
            $('#edit').addClass('d-block')
            $('#listView').addClass('d-none');
        }
        if (list.checked) {
            $('#novoEquipamento').removeClass();
            $('#locationView').removeClass();
            $('#edit').removeClass();
            $("#listView").removeClass();
            $('#novoEquipamento').addClass('d-none')
            $('#locationView').addClass('d-none');
            $('#edit').addClass('d-none')
            $('#listView').addClass('d-block');
        }
    }

    $("#newEquipamento").on('change', function() {
        alternar();
    })
    $('#location').on('change', function() {
        alternar();
    })
    $('#editClient').on('change', function() {
        alternar();
    })
    $('#list').on('change', function() {
        alternar();
    })

    function lista() {
        $.ajax({
            url: pag + '/lista.php',
            method: 'post',
            data: {},
            success: function(html) {
                $('.table').html(html)
            }
        })
    }

    $('form').submit(function(event) {
        var list = document.getElementById('list');
        var id = $('#id_equipamento').val()
        var nome = $('#tipo').val();
        var modelo = $("#modelo").val()
        var marca = $('#marca').val()
        var id_clientes = $('#id_cliente').val()
        var problema = $('#problema').val()
        var mao_obra = $('#mao_obra').val()
        var valor_pecas = $('#valor_pecas').val()
        var servico = $('#servico').val()
        var status = $("#status").val()
        var data_entrega = $('#data_entrega').val();
        var data_entrada = $('#data_entrada').val()
        var obs = $('#obs').val()
        var valor_total = $('#valor_total').val();
        $.ajax({
            url: pag + '/salvar.php',
            method: 'post',
            data: {
                id: id,
                nome: nome,
                marca: marca,
                modelo: modelo,
                id_cliente: id_clientes,
                problema: problema,
                mao_obra: mao_obra,
                valor_pecas: valor_pecas,
                servico: servico,
                status: status,
                data_entrega: data_entrega,
                data_entrada: data_entrada,
                obs: obs,
                valor_total: valor_total
            },
            success: function(msg) {
                window.location.reload();
            }
        })
    })

    function excluir(id) {
        var resp = confirm('Tem certeza que deseja excluir esse equipamento?')
        if (resp) {
            $.ajax({
                url: pag + '/excluir.php',
                method: 'post',
                data: {
                    id: id
                },
                success: function(msg) {
                    window.location.reload();
                }
            })
        }
    }


    function editar(id, nome, marca, modelo, problema, id_cliente, servico, status, mao_obra, valor_pecas, valor_total, entrega, entrada, obs) {
        event.preventDefault();
        var New = document.getElementById('newEquipamento')
        if (!(New.checked)) {
            New.checked = true;
        }
        $('.newEqText').text('Editar Equipamento')
        alternar()

        $('#id_equipamento').val(id);
        $('#tipo').val(nome);
        $("#modelo").val(modelo)
        $('#marca').val(marca)
        $('#id_cliente').val(id_cliente)
        $('#problema').val(problema)
        $('#mao_obra').val(mao_obra)
        $('#valor_pecas').val(valor_pecas)
        $('#servico').val(servico)
        $("#status").val(status)
        $('#data_entrega').val(entrega);
        $('#data_entrada').val(entrada)
        $('#obs').val(obs)
        $('#valor_total').val(valor_total);

        $('.p_add').text("Edite os dados do equipamento conforme solicitado.")

        $('.btn-form').text('Editar Equipamento')
    }

    function enviar_status(id, status) {
        event.preventDefault();
        $.ajax({
            url: pag + '/status.php',
            method: 'post',
            data: {
                id: id,
                status: status
            },
            success: function(msg) {
                lista()
            }
        })
    }

    lista()
</script>