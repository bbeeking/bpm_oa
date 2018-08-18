<?php
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #15</title>

</head>
<body>

<h1>PHPExcel Reader Example #14</h1>
<h2>Reading a Large CSV file in "Chunks" to split across multiple Worksheets</h2>
<?php
 set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/'); include 'PHPExcel/IOFactory.php'; $inputFileType = 'CSV'; $inputFileName = './sampleData/example2.csv'; class chunkReadFilter implements PHPExcel_Reader_IReadFilter { private $_startRow = 0; private $_endRow = 0; public function setRows($startRow, $chunkSize) { $this->_startRow = $startRow; $this->_endRow = $startRow + $chunkSize; } public function readCell($column, $row, $worksheetName = '') { if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) { return true; } return false; } } echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />'; $objReader = PHPExcel_IOFactory::createReader($inputFileType); echo '<hr />'; $chunkSize = 100; $chunkFilter = new chunkReadFilter(); $objReader->setReadFilter($chunkFilter) ->setContiguous(true); $objPHPExcel = new PHPExcel(); $sheet = 0; for ($startRow = 2; $startRow <= 240; $startRow += $chunkSize) { echo 'Loading WorkSheet #',($sheet+1),' using configurable filter for headings row 1 and for rows ',$startRow,' to ',($startRow+$chunkSize-1),'<br />'; $chunkFilter->setRows($startRow,$chunkSize); $objReader->setSheetIndex($sheet); $objReader->loadIntoExisting($inputFileName,$objPHPExcel); $objPHPExcel->getActiveSheet()->setTitle('Country Data #'.(++$sheet)); } echo '<hr />'; echo $objPHPExcel->getSheetCount(),' worksheet',(($objPHPExcel->getSheetCount() == 1) ? '' : 's'),' loaded<br /><br />'; $loadedSheetNames = $objPHPExcel->getSheetNames(); foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) { echo '<b>Worksheet #',$sheetIndex,' -> ',$loadedSheetName,'</b><br />'; $objPHPExcel->setActiveSheetIndexByName($loadedSheetName); $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,false,false,true); var_dump($sheetData); echo '<br />'; } ?>
<body>
</html>