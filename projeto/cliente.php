<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
    <input type="radio" class="btn-check" name="btnradio" id="newClient" autocomplete="off" checked>
    <label class="btn btn-outline-primary" for="newClient">Novo Cliente</label>

    <input type="radio" class="btn-check" name="btnradio" id="list" autocomplete="off">
    <label class="btn btn-outline-primary" for="list">Lista de Clientes</label>

    <input type="radio" class="btn-check" name="btnradio" id="location" autocomplete="off">
    <label class="btn btn-outline-primary" for="location">Maps/Localização</label>

    <input type="radio" class="btn-check" name="btnradio" id="editClient" autocomplete="off">
    <label class="btn btn-outline-primary" for="editClient">Editar Cliente</label>
</div>
<div id="novoCliente" class="d-block mx-auto">
    <div class="d-flex flex-wrap">
        <div class="col-md-3">
            <h5>Formulário de Cadastro de Clientes</h5>
            <p>Preencha corretamente os dados Abaixo:</p>
            <form method="post">
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" name="nome" id="nome" placeholder="Nome do Cliente" class="form-control">
                                <label for="nome">Nome do Cliente*</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-form">
                            <div class="form-floating">
                                <input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control">
                                <label for="cpf">CPF*</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="tel" name="telefone" id="telefone" class="form-control" placeholder="Telefone">
                                <label for="telefone">Telefone*</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Enrdereço">
                            <label for="endereco">Endereço*</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" name="id_cliente" id="id_cliente">
                    <div class="btn btn-primary" id="upDados">Cadastrar Cliente</div>
                </div>
            </form>
        </div>
        <div class="col-md-9 px-5">
            <div class="listaSimples"></div>
        </div>
    </div>
</div>
<div id="listView" class="d-none">
    <div class="listaCompleta"></div>
</div>
<div id="locationView" class="d-none">
    Olá, Mundo 2
</div>
<div id="edit" class="d-none">
    Olá, Mundo 3
</div>

<script>
    var pag = "<?= $_GET['pag']; ?>"


    function alternar() {
        let client = document.getElementById('newClient')
        let location = document.getElementById('location')
        let edit = document.getElementById('editClient')
        let list = document.getElementById('list')
        if (client.checked) {
            $('#novoCliente').removeClass();
            $('#locationView').removeClass();
            $('#edit').removeClass();
            $("#listView").removeClass();
            $('#novoCliente').addClass('d-block')
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
            $('#novoCliente').removeClass();
            $('#locationView').removeClass();
            $('#edit').removeClass();
            $("#listView").removeClass();
            $('#novoCliente').addClass('d-none')
            $('#locationView').addClass('d-none');
            $('#edit').addClass('d-none')
            $('#listView').addClass('d-block');
        }
    }

    $("#newClient").on('change', function() {
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

    function lista(id='') {
        $.ajax({
            url: pag + '/lista_simple.php',
            method: 'post',
            data: {
                id: id
            },
            success: function(resp) {
                $('.listaSimples').html(resp)
            }
        })
    }

    function listaCompleta() {
        $.ajax({
            url: pag + '/lista_completa.php',
            method: 'post',
            data: {},
            success: function(resp) {
                $('.listaCompleta').html(resp)
            }
        })
    }

    $("#upDados").click(function() {
        var id = $('#id_cliente').val();
        var nome = $('#nome').val();
        var cpf = $("#cpf").val();
        var telefone = $('#telefone').val();
        var endereco = $('#endereco').val();

        $.ajax({
            url: pag + '/adicionar_cliente.php',
            method: 'post',
            data: {
                id: id,
                nome: nome,
                cpf: cpf,
                telefone: telefone,
                endereco: endereco
            },
            success: function(msg) {
                $('#mensage').text(msg);
                $('#btnClose').text('Fechar');
                $('#modalMensage').modal('show');
                lista()
                listaCompleta()
            }
        })
    })

    function excluir(id) {
        var r = confirm('Tem certeza que deseja excluir este Cliente?')
        event.preventDefault();
        if (r) {
            $.ajax({
                url: pag + '/excluir.php',
                method: 'post',
                data: {
                    id: id
                },
                success: function(msg) {
                    $('#mensage').text(msg);
                    $('#btnClose').text('Fechar');
                    $('#modalMensage').modal('show');
                    listaCompleta()
                    lista()
                }
            })
        }
    }

    function editar(id, nome, cpf, telefone, endereco) {
        event.preventDefault()

        let client = document.getElementById('newClient');
        if (!(client.checked)) {
            client.checked = true;
        }
        alternar();
        $('#id_cliente').val(id)
        $('#nome').val(nome)
        $('#cpf').val(cpf)
        $("#endereco").val(endereco)
        $('#telefone').val(telefone)
        $('#upDados').text("Salvar")
        lista(id)
    }

    lista()
    listaCompleta();
</script>