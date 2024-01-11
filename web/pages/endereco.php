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
</head>

<body>

    <div class="container">
        <h1 style="text-align: center;">Endereço - Contato</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>CEP</th>
                </tr>
            </thead>
            <tbody>
                <?php $idContato = $_GET['id']; include('crud/read/BuscarEnderecoContato.php'); ?>
                <?php while ($contato = mysql_fetch_assoc($queryEndereco)) { ?>
                    <tr>
                        <td><?php echo utf8_encode($contato['RUA']); ?></td>
                        <td><?php echo utf8_encode($contato['NUMERO']); ?></td>
                        <td><?php echo utf8_encode($contato['BAIRRO']); ?></td>
                        <td><?php echo utf8_encode($contato['CIDADE']); ?></td>
                        <td><?php echo utf8_encode($contato['ESTADO']); ?></td>
                        <td><?php echo utf8_encode($contato['CEP']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>