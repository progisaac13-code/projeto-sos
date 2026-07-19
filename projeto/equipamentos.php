<?php
$pag = $_GET["pag"];
?>
<div class="d-flex flex-wrap align-items-center mb-3">
    <div class="col-md-3 mx-2">
        <input type="text" name="pesquisa_eq" id="pesquisa_eq" class="form-control" placeholder="Pesquisar Equipamento" oninput="pesquisa()">
    </div>
    <div class="col-md-3">
        <i class="fa-solid fa-table" title="Exibição em Blocos" style="font-size: 18px; color: gray; cursor: pointer;" title="Tabela de Clientes" onclick="buscarListaUsuarios('table')"></i>
        <i class="fa-solid fa-list" title="Exibição em Tabela" style="font-size: 18px; color: gray; cursor: pointer;" title="Lista de Clientes" onclick="buscarListaUsuarios('list')"></i>
        <i class="fa-solid fa-plus" title="Adicionar Cliente" style="font-size: 18px; color: gray; cursor: pointer;" title="Lista de Clientes" onclick="chamarAdicionar()"></i>
    </div>
</div>

<div class="lst-equipamentos">

</div>

<!-- Modal -->
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="fecharEQ()">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="concluir()">Cadastrar Equipamento</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var pag = "<?= $pag ?>"

    function concluir() {

        var nome = $('#nome').val();
        var valor = $('#valor');
        var fabricacao = $('#fabricacao');
        var id_cliente = $('#clientes');
        var manutencao = $('#manutencao');
        var obs = $('#obs').val()
        var cod = $('#input_cod').val()

        $(document).ready(function() {
            $.ajax({
                url: pag + '/concluir.php',
                method: 'post',
                data: {
                    nome: nome,
                    valor: valor,
                    fabricacao:fabricacao,
                    id_cliente: id_cliente,
                    manutencao: manutencao,
                    obs: obs,
                    cod: cod
                },
                success: function(result) {
                    lst();
                }
            })
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
    lst()
</script>