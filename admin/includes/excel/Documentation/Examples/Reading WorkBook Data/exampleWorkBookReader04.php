<?php
 error_reporting(E_ALL); set_time_limit(0); date_default_timezone_set('Europe/London'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reading WorkBook Data Example #04</title>

</head>
<body>

<h1>PHPExcel Reading WorkBook Data Example #04</h1>
<h2>Get a List of the Worksheets in a WorkBook</h2>
<?php
 set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/'); include 'PHPExcel/IOFactory.php'; $inputFileType = 'Excel5'; $inputFileName = './sampleData/example2.xls'; $objReader = PHPExcel_IOFactory::createReader($inputFileType); $objPHPExcel = $objReader->load($inputFileName); echo '<hr />'; echo 'Reading the number of Worksheets in the WorkBook<br />'; $sheetCount = $objPHPExcel->getSheetCount(); echo 'There ',(($sheetCount == 1) ? 'is' : 'are'),' ',$sheetCount,' WorkSheet',(($sheetCount == 1) ? '' : 's'),' in the WorkBook<br /><br />'; echo 'Reading the names of Worksheets in the WorkBook<br />'; $sheetNames = $objPHPExcel->getSheetNames(); foreach($sheetNames as $sheetIndex => $sheetName) { echo 'WorkSheet #',$sheetIndex,' is named "',$sheetName,'"<br />'; } ?>
<body>
</html>
