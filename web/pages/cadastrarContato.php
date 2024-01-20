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
                        <labe class="form-label" for ="nome">Nome</label>
                        <input type="text" class="form-control mb-1" id="nome" name="nome" style="width: 400px;">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control mb-1" id="email" name="email" placeholder="xxxx@domain.com" style="width: 400px;">
                        <label class="form-label" for="telefone">Telefone</label>
                        <input type="text" class="form-control mb-3" id="telefone" name="telefone" placeholder="xx xxxxx-xxxx" style="width: 400px;" pattern="^([0-9]{2}) ?([0-9]{5})-?([0-9]{4})$" title="Utilize o formato correto: xx xxxxx-xxxx">
                        <h5 class="text-center">Endereço</h5>
                        <label class="form-label" for="cep">CEP</label>
                        <input type="text" class="form-control mb-1" id="cep" name="cep" placeholder="xxxxx-xx" style="width: 400px;" pattern = "!/^[0-9]{5}-[0-9]{3}$/" title = "Utilize o formato correto: xxxxx-xxx">
                        <label class="form-label" for="estado">Estado</label>
                        <select class="form-select mb-1" id="estado" name="estado" style="width: 400px;">
                            <option value=""></option>
                            <option value="AC">AC - Acre</option>
                            <option value="AL">AL - Alagoas</option>
                            <option value="AP">AP - Amapá</option>
                            <option value="AM">AM - Amazonas</option>
                            <option value="BA">BA - Bahia</option>
                            <option value="CE">CE - Ceará</option>
                            <option value="DF">DF - Distrito Federal</option>
                            <option value="ES">ES - Espírito Santo</option>
                            <option value="GO">GO - Goiás</option>
                            <option value="MA">MA - Maranhão</option>
                            <option value="MT">MT - Mato Grosso</option>
                            <option value="MS">MS - Mato Grosso do Sul</option>
                            <option value="MG">MG - Minas Gerais</option>
                            <option value="PA">PA - Pará</option>
                            <option value="PB">PB - Paraíba</option>
                            <option value="PR">PR - Paraná</option>
                            <option value="PE">PE - Pernambuco</option>
                            <option value="PI">PI - Piauí</option>
                            <option value="RJ">RJ - Rio de Janeiro</option>
                            <option value="RN">RN - Rio Grande do Norte</option>
                            <option value="RS">RS - Rio Grande do Sul</option>
                            <option value="RO">RO - Rondônia</option>
                            <option value="RR">RR - Roraima</option>
                            <option value="SC">SC - Santa Catarina</option>
                            <option value="SP">SP - São Paulo</option>
                            <option value="SE">SE - Sergipe</option>
                            <option value="TO">TO - Tocantins</option>
                        </select>
                        <label class="form-label" for="cidade">Cidade</label>
                        <input type="text" class="form-control mb-1" id="cidade" name="cidade" style="width: 400px;">  
                        <label class="form-label" for="bairro">Bairro</label>                  
                        <input type="text" class="form-control mb-1" id="bairro" name="bairro"style="width: 400px;">
                        <label class="form-label" for="rua">Rua</label>
                        <input type="text" class="form-control mb-1" id="rua" name="rua" style="width: 400px;">
                        <label class="form-label" for="numero">Número</label>
                        <input type="text" class="form-control mb-1" id="numero" name="numero" style="width: 400px;">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 mb-3">
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

<!-- JS -->
<script src="../js/script.js"></script>  
<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
