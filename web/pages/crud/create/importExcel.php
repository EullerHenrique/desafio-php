<?php 
    include ('../../../lib/PHPExcel/PHPExcel.php');
    include ('../../../inc/conecta.php');
    include ('functions/insertsContato.php');
   
    $dados = file_get_contents('php://input');

    $tmpFilePath = '/tmp/uploaded_file.xls'; 
    file_put_contents($tmpFilePath, $dados);

    $objPHPExcel = PHPExcel_IOFactory::load($tmpFilePath);

    $planilha = $objPHPExcel->getActiveSheet();

    $quantidadeLinhas = $planilha->getHighestRow();
    $quantidadeColunas = PHPExcel_Cell::columnIndexFromString($planilha->getHighestColumn());

    realizarInserts($planilha, $quantidadeLinhas, $quantidadeColunas, $link);
   
    //gerarExcel();

    // --------------------------------- FUNÇÕES -------------------------------- //
    function realizarInserts($planilha, $quantidadeLinhas, $quantidadeColunas, $link){
        $nomeTabela = "CONTATO";
        $sqlInsert = "INSERT INTO $nomeTabela";
        
        $valoresLinhasErros = array();
        for ($linha = 1; $linha <= $quantidadeLinhas; $linha++) {        
            
            $valoresColunas = array();
            for ($coluna = 0; $coluna < $quantidadeColunas; $coluna++) {
                $valor = $planilha->getCellByColumnAndRow($coluna, $linha)->getValue();
                array_push($valoresColunas, $valor);
            }

            if($linha === 1){
                $sqlInsert .= " ('$valoresColunas[0]', '$valoresColunas[1]', '$valoresColunas[2]')";
                continue;
            }

            $sqlInsert = "INSERT INTO CONTATO (NOME, EMAIL, TELEFONE) VALUES ('$valoresColunas[0]', '$valoresColunas[1]', '$valoresColunas[2]');";
            try{
                realizarInsertContato($sqlInsert, $link);
            }catch(Exception $e){
                array_push($valoresColunas, $e->getMessage());
                $valoresLinhasErros[$linha] = $valoresColunas;
            }
        }

        if(count($valoresLinhasErros) > 0){
            gerarExcelErros($valoresLinhasErros);
        }
    }
  
    function gerarExcelErros($insertsErros){    
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();

        $sheet->setCellValue('A1', 'Nome');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Telefone');
        $sheet->setCellValue('D1', 'Erro');

        $linha = 1;
        $coluna = 'A';
        $maxColuna = 'D';
        for ($i = 0; $i < count($insertsErros); $i++) {
            for ($j = 0; $j < count($insertsErros[$i]); $j++) {
                $sheet->setCellValue($coluna . $linha, $insertsErros[$i][$j]);
                if($coluna == $maxColuna){
                    $coluna = 'A';
                }else{
                    $coluna++;
                }
            }
            $linha++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Inserções com erros');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="InsercoesComrrErros.xls"');
        $objWriter->save('php://output');
    }
    

    function gerarExcel(){
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();
        
        $sheet->setCellValue('A1', 'Nome');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Telefone');
        
        for ($i = 2; $i <= 10001; $i++) {
            $sheet->setCellValue('A' . $i, 'Euller' . ($i-1));
            $sheet->setCellValue('B' . $i, 'euller' . ($i-1) . '@outlook.com');
            $sheet->setCellValue('C' . $i, ($i-1));
        }
        
        $objPHPExcel->getActiveSheet()->setTitle('Planilha de Contatos');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');
        $objWriter->save('php://output');
    }
?>