<?php
require_once("../database/conexao.php");
$pag = $_GET["pag"];
?>
<style>
    .card {
        background: none
    }
</style>
<div class="d-flex flex-wrap align-items-center mb-3">
    <div class="">
        <button class="btn btn-primary" onclick="chamarAdicionar()">Adicionar Cliente <i class="fa-solid fa-plus"></i></button>

        <i class="fa-solid fa-table-cells"></i>
        <i class="fa-solid fa-rectangle-list"></i>
    </div>
    <div class="col-md-3 mx-2">
        <div class="form-group">
            <div class="form-floating">
                <select name="clientes_select" id="clientes_select" class="form-select">
                    <option value="0" default>Selecione um Cliente</option>
                    <?php
                    $query = $pdo->query("SELECT * FROM clientes;");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (count($res) > 0) {
                        for ($i = 0; $i < count($res); $i++) {
                            $id_clientes =  $res[$i]["id_cliente"];
                            $nome = $res[$i]["nome"];

                    ?>
                            <option value="<?= $id_clientes ?>"><?= $nome ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <label for="clientes_select">Pesquise por Cliente...</label>
            </div>
        </div>
    </div>
</div>

<div class="lst-equipamentos">

</div>

<!-- Modal -->
<div class="modal fade" id="adicionarFotos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Insira Fotos do Equipamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="fecharEQ()"></button>
            </div>
            <div class="modal-body">
                <div class="upload_img">
                    <div id="dropArea">
                        Arraste uma imagem aqui ou clique
                    </div>

                    <input
                        type="file"
                        id="fileInput"
                        accept="image/*"
                        hidden>

                    <div id="preview"></div>
                    <input type="hidden" id="ideq_upload">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="adicionarEQ" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Equipamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="fecharEQ()"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="form-floating">
                                <input type="text" name="nome" id="nome" placeholder="Nome do Equipamento..." class="form-control">
                                <label for="nome">Nome do Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-floating">
                                <input type="text" name="valor" id="valor" placeholder="Valor do Produto..." class="form-control">
                                <label for="valor">Valor do Produto</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-floating">
                                <input type="date" name="fabricacao" id="fabricacao" placeholder="Data de Fabricação" class="form-control">
                                <label for="fabricacao">Data de Fabricação</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-floating">
                                <select name="clientes" id="clientes" class="form-select">
                                    <?php
                                    $query = $pdo->query("SELECT * FROM clientes;");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    if (count($res) > 0) {
                                        for ($i = 0; $i < count($res); $i++) {
                                            $nome = $res[$i]["nome"];
                                            $inc = $res[$i]["codigo_entrada"];
                                            $id_cliente = $res[$i]["id_cliente"];

                                    ?>
                                            <option value="<?= $id_cliente ?>"><?= $inc . " . " . $nome ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="clientes">Vinculado a Quem(*)</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1">
                            <div class="form-floating">
                                <textarea name="manutencao" id="manutencao" style="height: 160px;" class="form-control" placeholder="Manutenções que vão ser executada"></textarea>
                                <label for="manuntencao">Manutenções</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea name="obs" id="obs" style="height: 120px;" class="form-control" placeholder="Observações"></textarea>
                                <label for="obs">Observaçõoes</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p>(OBS) O Código do Equipamento: <span id="cod"></span></p>
                <div>
                    <input type="hidden" id="input_cod">
                    <button type="button" class="btn btn-secondary d-none" data-bs-dismiss="modal" id="fecharID"></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="fecharEQ()">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="concluir()">Cadastrar Equipamento</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editarEQ" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Equipamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="fecharEQ()"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="form-floating">
                                <input type="text" name="nome" id="edit_nome" placeholder="Nome do Equipamento..." class="form-control">
                                <label for="nome">Nome do Equipamento</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-floating">
                                <input type="text" name="valor" id="edit_valor" placeholder="Valor do Produto..." class="form-control">
                                <label for="valor">Valor do Produto</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-floating">
                                <input type="date" name="fabricacao" id="edit_fabricacao" placeholder="Data de Fabricação" class="form-control">
                                <label for="fabricacao">Data de Fabricação</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1">
                            <div class="form-floating">
                                <textarea name="manutencao" id="edit_manutencao" style="height: 160px;" class="form-control" placeholder="Manutenções que vão ser executada"></textarea>
                                <label for="manuntencao">Manutenções</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea name="obs" id="edit_obs" style="height: 120px;" class="form-control" placeholder="Observações"></textarea>
                                <label for="obs">Observaçõoes</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="edit_input_cod">
                <button type="button" class="btn btn-secondary d-none" data-bs-dismiss="modal" id="fecharIDEdit"></button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="editar()">Editar Equipamento</button>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="showFotos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto do Equipamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-wrap gap-3" id="show"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    var pag = "<?= $pag ?>"

    function edit(id, nome, valor, data, manutencao, obs) {
        $('#edit_input_cod').val(id)
        $('#edit_nome').val(nome)
        $('#edit_valor').val(valor)
        $('#edit_fabricacao').val(data)
        $("#edit_manutencao").val(manutencao)
        $('#edit_obs').val(obs)
        $('#editarEQ').modal('show')
    }

    function editar() {
        var nome = $('#edit_nome').val();
        var valor = $('#edit_valor').val();
        var fabricacao = $('#edit_fabricacao').val();
        var id_cliente = $('#edit_clientes').val();
        var manutencao = $('#edit_manutencao').val();
        var obs = $('#edit_obs').val()
        var cod = $('#edit_input_cod').val()

        $.ajax({
            url: pag + '/editar.php',
            method: 'post',
            data: {
                nome: nome,
                valor: valor,
                fabricacao: fabricacao,
                id_cliente: id_cliente,
                manutencao: manutencao,
                obs: obs,
                cod: cod
            },
            success: function(result) {
                $('#fecharIDEdit').click()
                lst()
            }
        })
    }

    function upload(id) {
        $('#adicionarFotos').modal('show')
        $('#ideq_upload').val(id)
    }

    function concluir() {
        var nome = $('#nome').val();
        var valor = $('#valor').val();
        var fabricacao = $('#fabricacao').val();
        var id_cliente = $('#clientes').val();
        var manutencao = $('#manutencao').val();
        var obs = $('#obs').val()
        var cod = $('#input_cod').val()

        $.ajax({
            url: pag + '/concluir.php',
            method: 'post',
            data: {
                nome: nome,
                valor: valor,
                fabricacao: fabricacao,
                id_cliente: id_cliente,
                manutencao: manutencao,
                obs: obs,
                cod: cod
            },
            success: function(result) {
                $('#adicionarEQ').modal('hide')
                lst()
            }
        })
    }

    function lst() {
        $.ajax({
            url: pag + '/lst.php',
            method: 'post',
            data: {},
            dataType: 'html',
            success: function(result) {
                $('.lst-equipamentos').html(result)
            }
        })
    }

    function chamarAdicionar() {
        $.ajax({
            url: pag + '/novo_codigo.php',
            method: 'post',
            data: {},
            success: function(res) {
                $('#cod').text(res)
                $('#input_cod').val(res)
            }
        })
        $('#adicionarEQ').modal('show')
    }

    function fecharEQ() {
        $.ajax({
            url: pag + '/fechar-eq.php',
            method: 'post',
            data: {}
        })
    }

    function del(id_equipamento) {
        var r = window.confirm('Tem certeza que deseja excluir?');
        if (r) {
            $.ajax({
                url: pag + '/del.php',
                method: 'post',
                data: {
                    id: id_equipamento
                },
                success: function(res) {
                    lst()
                }
            })
        }
    }

    const dropArea = document.getElementById("dropArea");
    const fileInput = document.getElementById("fileInput");

    dropArea.onclick = () => fileInput.click();

    fileInput.onchange = () => {

        enviar(fileInput.files);

    }

    dropArea.addEventListener("dragover", (e) => {

        e.preventDefault();
        dropArea.classList.add("hover");

    });

    dropArea.addEventListener("dragleave", () => {

        dropArea.classList.remove("hover");

    });

    dropArea.addEventListener("drop", (e) => {

        e.preventDefault();

        dropArea.classList.remove("hover");

        enviar(e.dataTransfer.files);

    });

    function enviar(files) {
        var id_equipamento = $('#ideq_upload').val();
        [...files].forEach(file => {

            if (!file.type.startsWith("image/")) {

                alert("Arquivo inválido");
                return;

            }

            let form = new FormData();

            form.append("foto", file);
            form.append("id_equipamento", id_equipamento)

            fetch("equipamentos/imagens.php", {

                    method: "POST",
                    body: form

                })
                .then(r => r.text())
                .then(msg => {

                    lst()

                });

            // Preview

            let reader = new FileReader();

            reader.onload = function(e) {

                let img = document.createElement("img");
                img.src = e.target.result;

                document.getElementById("preview").appendChild(img);

            }

            reader.readAsDataURL(file);

        });

    }

    $('#clientes_select').on('change', function() {
        var id_cliente = $("#clientes_select").val()
        $.ajax({
            url: pag + '/lst.php',
            method: 'post',
            data: {
                id: id_cliente
            },
            success: function(result) {
                $('.lst-equipamentos').html(result)
            }
        })
    })

    function fotos(id_equipamento) {
        $.ajax({
            url: pag + '/fotos.php',
            method: 'post',
            data: {
                id: id_equipamento
            },
            success: function(res) {
                $('#show').html(res)
                $('#showFotos').modal('show')
            }
        })
    }

    function recycle(id, id_equipamento) {
        $.ajax({
            url: pag + '/recycle.php',
            method: 'post',
            data: {
                id: id
            },
            success: function() {
                fotos(id_equipamento)
                lst()
            }
        })
    }

    lst()
</script>