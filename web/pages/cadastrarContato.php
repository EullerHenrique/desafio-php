<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Contato</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- PHP -->
    <?php include('crud/read/ListarContatos.php'); ?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <header>
    
        <div class="container">
            <h1 style="text-align: center;">Novo Contato</h1>
        </div>
        
    </header>

    <main>
        
        <div class="container">
            <form>
                <div class="d-flex justify-content-center"> 
                    <div>
                        <input type="text" class="form-control mb-1" id="nome" name="nome" placeholder="Nome" style="width: 400px;" required>
                        <input type="email" class="form-control mb-1" id="email" name="email" placeholder="Email"style="width: 400px;" required>
                        <input type="text" class="form-control mb-3" id="telefone" name="telefone" placeholder="Telefone"style="width: 400px;" required>
                        <label class="form-label">Endereço</label>
                        <input type="text" class="form-control mb-1" id="rua" name="rua" placeholder="Rua" style="width: 400px;" required>
                        <input type="text" class="form-control mb-1" id="numero" name="numero" placeholder="Número" style="width: 400px;" required>
                        <input type="text" class="form-control mb-1" id="bairro" name="bairro" placeholder="Bairro" style="width: 400px;" required>
                        <input type="text" class="form-control mb-1" id="cidade" name="cidade" placeholder="Cidade" style="width: 400px;" required>
                        <input type="text" class="form-control mb-1" id="estado" name="estado" placeholder="Estado" style="width: 400px;" required>
                        <input type="text" class="form-control mb-1" id="cep" name="cep" placeholder="CEP" style="width: 400px;" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div>
                        <a class="btn btn-primary me-3"  href="index.php">Voltar</a>
                    </div>    
                    <div>
                        <button type="button" class="btn btn-success ms-3" onclick="cadastrarContato()">Salvar</button>
                    </div>
                </div>
            </form>
        </div>

    </main>

<!-- JAVASCRIPT -->
<script src="../js/script.js"></script>  
<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
