<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endereço - Contato</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- PHP -->
    <?php include('crud/read/BuscarEnderecoContato.php'); ?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

<header class="mt-4">
    
        <div class="container">
            <h1 style="text-align: center;">Endereço - <?php echo $_GET['nome'] ?></h1>
        </div>
        
    </header>

    <main class="d-flex align-items-center">
        
        <div class="container">

            <div>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th class="col-1">CEP</th>
                            <th class="col-1">Estado</th>
                            <th class="col-3">Cidade</th>
                            <th class="col-3">Bairro</th>
                            <th class="col-2">Rua</th>
                            <th class="col-1">Número</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($contato = mysql_fetch_assoc($queryEndereco)) { ?>
                            <tr>
                                <td class="col-1"><?php echo utf8_encode($contato['CEP']); ?></td>
                                <td class="col-1"><?php echo utf8_encode($contato['ESTADO']); ?></td>
                                <td class="col-3"><?php echo utf8_encode($contato['CIDADE']); ?></td>
                                <td class="col-3"><?php echo utf8_encode($contato['BAIRRO']); ?></td>
                                <td class="col-2"><?php echo utf8_encode($contato['RUA']); ?></td>
                                <td class="col-1"><?php echo utf8_encode($contato['NUMERO']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-start mt-3">
                <a class="btn btn-primary me-3"  href="index.php">Voltar</a>
            </div>
        </div>

    </main>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>