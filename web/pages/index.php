<?php 
    session_start(); 
    $_SESSION['perPage'] = isset($_GET['perPage'])? $_GET['perPage'] : 5;; 
?>
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
    
    <header class="mt-4">
    
        <div class="container">
            <h1 style="text-align: center;">Contatos</h1>
        </div>
        
    </header>

    <main class="d-flex align-items-center">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mt-3 mb-3">
                    <span>Exibir</span>
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
                <div>
                    <a class="btn btn-warning me-2" href="#" data-bs-toggle="modal" data-bs-target="#importModal">Importar Excel</a>
                    <div class="modal fade" id="importModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="background-color: #212529">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importModalLabel">Importar Excel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body" >
                                    <label for="file" class="form-label">Selecione um arquivo .xls</label>
                                    <input class="form-control" type="file" id="file" accept="application/excel, application/vnd.ms-excel, application/msexcel">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-primary" onClick="importarExcel()">Importar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary"  href="cadastrarContato.php">Novo Contato</a>
                </div>
            </div>
            
            <div>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th class="col-4">Nome</th>
                            <th class="col-4">Email</th>
                            <th class="col-4">Telefone</th>
                            <th class="col-1">Endereço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($contato = mysql_fetch_assoc($queryContatos)) { ?>
                            <tr>
                                <td class="col-4"><?php echo utf8_encode($contato['NOME']); ?></td>
                                <td class="col-4"><?php echo utf8_encode($contato['EMAIL']); ?></td>
                                <td class="col-4"><?php echo utf8_encode($contato['TELEFONE']); ?></td>
                                <td class="col-1"><a class="btn btn-success" href="endereco.php?id=<?php echo $contato['ID'];?>&nome=<?php echo $contato['NOME'] ?>">Exibir</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
             
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
                                $perPage = $_SESSION['perPage'];
                                echo "<li class='page-item $active'>
                                        <a class='page-link' href='index.php?page=$page&perPage=$perPage'>$page</a>
                                     </li>";    
                        } ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $paginaPosterior ?>">
                                    <span>&gt;</span>
                        </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $totalPaginas ?>&" >
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

<!-- JS -->
<script src="../js/script.js"></script>  
<!-- BOOTSTRAP JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
