<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
    <input type="radio" class="btn-check" name="btnradio" id="newEquipamento" autocomplete="off">
    <label class="btn btn-outline-primary" for="newEquipamento">Novo Equipamento</label>

    <input type="radio" class="btn-check" name="btnradio" id="list" autocomplete="off" checked>
    <label class="btn btn-outline-primary" for="list">Lista de Equipamento</label>

    <input type="radio" class="btn-check" name="btnradio" id="location" autocomplete="off">
    <label class="btn btn-outline-primary" for="location">Maps/Localização</label>

    <input type="radio" class="btn-check" name="btnradio" id="editClient" autocomplete="off">
</div>
<div id="novoEquipamento" class="d-none">
    <div class="p-4">
        <h3>Preenchar corretamente os Dados Abaixo!</h3>
        <p>Vincule o Equipamento ao Cliente Responsável por Ele</p>
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
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="mao_obra" id="mao_obra" placeholder="Valor da Mão de Obra" class="form-control">
                                <label for="mao_obra">Valor da Mão de Obra</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="valor_pecas" id="valor_pecas" placeholder="Valor das Peças" class="form-control">
                                <label for="valor_pecas">Valor das Peças</label>
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
        </form>
    </div>
</div>
<div id="listView">
    <div class="p-4">
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
            data:{},
            success: function(html) {
                $('.table').html(html)
            }
        })
    }

    lista()
</script>