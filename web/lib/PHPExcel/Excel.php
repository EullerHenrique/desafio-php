<?php

class Excel
{
    /**
     * @param array $options Define as opções para geração da planilha
     */
    private $options = array(
        "header" => array(
            "font" => "Calibri",
            "fontSize" => 9,
            "fontBold" => false,
            "color" => "000000",
            "bgColor" => "FFFFFF",
            "bordered" => false,
            "align" => "center",
            "columnsStyle" => false
        ),
        "body" => array(
            "font" => "Calibri",
            "fontSize" => 9,
            "fontBold" => false,
            "color" => "000000",
            "bgColor" => "FFFFFF",
            "bordered" => false,
            "align" => "left",
            "strippedRows" => array(
                "odd" => array(
                    "font" => "Calibri",
                    "fontSize" => 9,
                    "fontBold" => false,
                    "color" => "000000",
                    "bgColor" => "CCCCCC",
                    "bordered" => false
                ),
                "even" => array(
                    "font" => "Calibri",
                    "fontSize" => 9,
                    "fontBold" => false,
                    "color" => "000000",
                    "bgColor" => "FFFFFF",
                    "bordered" => false
                )
            ),
            // "columnsStyle" => array(
            //     "A" => array(
            //         "align" => "center", // | left | right
            //     )
            // )
            "columnsStyle" => false,
        ),
        "footer" => array(
            "font" => "Calibri",
            "fontSize" => 9,
            "fontBold" => true,
            "color" => "000000",
            "bgColor" => "FFFFFF",
            "bordered" => false,
            "align" => "center",
            "columnsStyle" => false
        )
    );

    public function __construct($options = array())
    {
        $this->setOptions($options);
    }

    /**
     * @name simpleExport Realiza a exportação simplificada dos dados
     * @param string $fileName
     * @param array $header
     * @param array $body
     * @param array $footer
     * @return void
     */
    public function simpleExport($fileName, $header, $body, $footer)
    {
        set_time_limit(300);
        $objPHPExcel = new PHPExcel();
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $headerOptions = $this->options['header'];
        $bodyOptions   = $this->options['body'];
        $footerOptions = $this->options['footer'];

        $columns = $this->getSheetColumns($header);
        $row = 1;
        if (!empty($header)) {
            foreach ($columns as $key => $col) {
                $sheet->setCellValue($col . $row, $header[$key])->getColumnDimension($col)->setAutoSize(true);
                $this->setStyle($sheet, $col . $row, $headerOptions);
                $objPHPExcel->getActiveSheet()->getStyle($col . $row)->getAlignment()->setHorizontal($this->getAlignment($headerOptions['align']));
                if ($headerOptions !== false) $this->setCustomColumnStyle($objPHPExcel, $col, $row, $headerOptions);
            }
        }

        if (!empty($body)) {
            $row = 2;
            foreach ($body as $bodyContent) {
                foreach ($columns as $colKey => $col) {
                    $sheet->setCellValue($col . $row, $bodyContent[$colKey])->getColumnDimension($col)->setAutoSize(true);
                    if ($bodyOptions['strippedRows'] !== false) {
                        $oddStyle  = $bodyOptions['strippedRows']['odd'];
                        $evenStyle = $bodyOptions['strippedRows']['even'];
                        $row % 2 == 0 ? $this->setStyle($sheet, $col . $row, $evenStyle) : $this->setStyle($sheet, $col . $row, $oddStyle);
                    } else {
                        $this->setStyle($sheet, $col . $row, $bodyOptions);
                    }
                    $objPHPExcel->getActiveSheet()->getStyle($col . $row)->getAlignment()->setHorizontal($this->getAlignment($bodyOptions['align']));
                    if ($bodyOptions !== false) $this->setCustomColumnStyle($objPHPExcel, $col, $row, $bodyOptions);
                }
                $row++;
            }
        }

        if (!empty($footer)) {
            foreach ($columns as $key => $col) {
                $sheet->setCellValue($col . $row, $footer[$key])->getColumnDimension($col)->setAutoSize(true);
                $this->setStyle($sheet, $col . $row, $footerOptions);
                $objPHPExcel->getActiveSheet()->getStyle($col . $row)->getAlignment()->setHorizontal($this->getAlignment($footerOptions['align']));
                if ($footerOptions !== false) $this->setCustomColumnStyle($objPHPExcel, $col, $row, $footerOptions);
            }
        }

        $this->downloadFile($objPHPExcel, $fileName);
    }

    /**
     * @name downloadFile Efetua o download do excel gerado
     * @param object $objPHPExcel Objeto da classe PHPExcel
     * @param string $fileName
     */
    public function downloadFile($objPHPExcel, $fileName)
    {
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_end_clean();
        $objWriter->save('php://output');
        exit();
    }

    /**
     * @name getOptions
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @name setOptions
     * @param array options
     * @return void
     */

    // rever função
    public function setOptions($options)
    {
        if (!empty($options)) {
            foreach ($options as $key => $option) {
                is_array($option) ? $this->setOptions($option) : $this->options[$key] = $option;
            }
            $aux = $this->options = $options;
        } else $aux = $this->options;
        $this->options = $aux;
    }

    /**
     * @name getSheetColumns Gera um array com as colunas para a exportação
     * @param array $header
     * @return array
     */
    private function getSheetColumns($header)
    {
        $col = 'A';
        $columns = array();
        for ($i = 0; $i < count($header); $i++) {
            $columns[] = $col;
            $col++;
        }
        return $columns;
    }

    /**
     * @name setStyle
     * @param object $sheet
     * @param string $cell
     * @param array $option
     * @return void
     */
    private function setStyle($sheet, $cell, $option)
    {
        if (!empty($option)) {
            $style = array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => $option['bgColor'])
                ),
                'font'  => array(
                    'bold'  => $option['fontBold'],
                    'color' => array('rgb' => $option['color']),
                    'size'  => $option['fontSize'],
                    'name'  => $option['font']
                ),
            );
            if ($option['bordered']) $style['borders'] = array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN));
            $sheet->getStyle($cell)->applyFromArray($style);
        }
    }

    /**
     * @name setCustomColumnStyle
     * @param object $objPHPExcel
     * @param string $col
     * @param int $row
     * @param array $option
     * @return void
     */
    private function setCustomColumnStyle($objPHPExcel, $col, $row, $option)
    {
        if (isset($option['columnsStyle'][$col]['align'])) {
            $objPHPExcel->getActiveSheet()->getStyle($col . $row)->getAlignment()->setHorizontal($this->getAlignment($option['columnsStyle'][$col]['align']));
        }
    }

    private function getAlignment($align)
    {
        switch ($align) {
            case 'center': return PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
            case 'left'  : return PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
            case 'right' : return PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
            default      : return PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
        }
    }
}
