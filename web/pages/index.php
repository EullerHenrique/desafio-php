<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
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
            <h1 style="text-align: center;">Contatos</h1>
        </div>
    </header>

    <main>
        <div class="container">

        <div class="row">

            <div class="d-flex align-items-center mt-3 mb-3">
                <span class="ms-4">Exibir</span>
                <select class="form-select perPage ms-3 me-3" onChange="alterarPerPage()">
                    <option value="5" <?php if ($_GET['perPage'] == 5) echo 'selected'; ?>>5</option>
                    <option value="10" <?php if ($_GET['perPage'] == 10) echo 'selected'; ?>>10</option>
                    <option value="15" <?php if ($_GET['perPage'] == 15) echo 'selected'; ?>>15</option>
                    <option value="20" <?php if ($_GET['perPage'] == 20) echo 'selected'; ?>>20</option>
                    <option value="25" <?php if ($_GET['perPage'] == 25) echo 'selected'; ?>>25</option>
                    <option value="50" <?php if ($_GET['perPage'] == 50) echo 'selected'; ?>>50</option>
                    <option value="100" <?php if ($_GET['perPage'] == 100) echo 'selected'; ?>>100</option>
                </select>
                <span>resultados por página</span>
            </div>
        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($contato = mysql_fetch_assoc($queryContatos)) { ?>
                        <tr>
                            <td><?php echo utf8_encode($contato['NOME']); ?></td>
                            <td><?php echo utf8_encode($contato['EMAIL']); ?></td>
                            <td><?php echo utf8_encode($contato['TELEFONE']); ?></td>
                            <td><a href="endereco.php?id=<?php echo $contato['ID']; ?>">Visualizar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

             
            <div class="d-flex justify-content-center">
                <nav>                
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=1">
                                    <span>&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $paginaAnterior ?>">
                                    <span>&lt;</span>
                            </a>
                        </li>
                        <?php for ($page=1; $page <= $totalPaginas; $page++) { 
                                $active = ($page == $paginaAtual) ? 'active' : '';
                                echo "<li class='page-item $active'>
                                        <a class='page-link' href='index.php?page=$page'>$page</a>
                                     </li>";    
                        } ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $paginaPosterior ?>">
                                    <span>&gt;</span>
                        </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $totalPaginas ?>" >
                                    <span >&raquo;</span>
                            </a>
                         </li>
                    </ul>
                </nav>
            </div>

    </main>

<script>
        function alterarPerPage() {
            let perPage = $('.perPage').val();
            window.location.href = 'index.php?page='+<?php echo $paginaAtual ?>+'&perPage=' + perPage;
        }
</script>    
<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
