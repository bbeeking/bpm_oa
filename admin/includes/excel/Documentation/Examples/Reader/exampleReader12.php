<?php
 error_reporting(E_ALL); set_time_limit(0); date_default_timezone_set('Europe/London'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #12</title>

</head>
<body>

<h1>PHPExcel Reader Example #12</h1>
<h2>Reading a Workbook in "Chunks" Using a Configurable Read Filter (Version 2)</h2>
<?php
 set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/'); include 'PHPExcel/IOFactory.php'; $inputFileType = 'Excel5'; $inputFileName = './sampleData/example2.xls'; class chunkReadFilter implements PHPExcel_Reader_IReadFilter { private $_startRow = 0; private $_endRow = 0; public function setRows($startRow, $chunkSize) { $this->_startRow = $startRow; $this->_endRow = $startRow + $chunkSize; } public function readCell($column, $row, $worksheetName = '') { if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) { return true; } return false; } } echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />'; $objReader = PHPExcel_IOFactory::createReader($inputFileType); echo '<hr />'; $chunkSize = 20; $chunkFilter = new chunkReadFilter(); $objReader->setReadFilter($chunkFilter); for ($startRow = 2; $startRow <= 240; $startRow += $chunkSize) { echo 'Loading WorkSheet using configurable filter for headings row 1 and for rows ',$startRow,' to ',($startRow+$chunkSize-1),'<br />'; $chunkFilter->setRows($startRow,$chunkSize); $objPHPExcel = $objReader->load($inputFileName); $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true); var_dump($sheetData); echo '<br /><br />'; } ?>
<body>
</html>