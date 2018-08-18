<?php
 error_reporting(E_ALL); set_time_limit(0); date_default_timezone_set('Europe/London'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #09</title>

</head>
<body>

<h1>PHPExcel Reader Example #09</h1>
<h2>Simple File Reader Using a Read Filter</h2>
<?php
 set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/'); include 'PHPExcel/IOFactory.php'; $inputFileType = 'Excel5'; $inputFileName = './sampleData/example1.xls'; $sheetname = 'Data Sheet #3'; class MyReadFilter implements PHPExcel_Reader_IReadFilter { public function readCell($column, $row, $worksheetName = '') { if ($row >= 1 && $row <= 7) { if (in_array($column,range('A','E'))) { return true; } } return false; } } $filterSubset = new MyReadFilter(); echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />'; $objReader = PHPExcel_IOFactory::createReader($inputFileType); echo 'Loading Sheet "',$sheetname,'" only<br />'; $objReader->setLoadSheetsOnly($sheetname); echo 'Loading Sheet using filter<br />'; $objReader->setReadFilter($filterSubset); $objPHPExcel = $objReader->load($inputFileName); echo '<hr />'; $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true); var_dump($sheetData); ?>
<body>
</html>