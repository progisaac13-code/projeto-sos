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
<div class="modal fade" id="adicionarEQ" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Equipamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="cod" id="cod" val="" placeholder="Código do Equipamento" class="form-control">
                                <label for="cod">Código do Equipamento</label>
                            </div>
                        </div>
                    </div>
                </form>
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
            success: function (res) {
                $('#cod').val(res)
            }
        })
        $('#adicionarEQ').modal('show')
    }
    lst()
</script>