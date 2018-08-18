<html>
<head>
<title>Quadratic Equation Solver</title>
</head>
<body>
<?php
 error_reporting(E_ALL); set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/../Classes/'); ?>
<h1>Quadratic Equation Solver</h1>
<form action="Quadratic.php" method="POST">
Enter the coefficients for the Ax<sup>2</sup> + Bx + C = 0
<table border="0" cellpadding="0" cellspacing="0">
	<tr><td><b>A&nbsp;</b></td>
		<td><input name="A" type="text" size="8" value="<?php echo (isset($_POST['A'])) ? htmlentities($_POST['A']) : ''; ?>"></td>
	</tr>
	<tr><td><b>B&nbsp;</b></td>
		<td><input name="B" type="text" size="8" value="<?php echo (isset($_POST['B'])) ? htmlentities($_POST['B']) : ''; ?>"></td>
	</tr>
	<tr><td><b>C&nbsp;</b></td>
		<td><input name="C" type="text" size="8" value="<?php echo (isset($_POST['C'])) ? htmlentities($_POST['C']) : ''; ?>"></td>
	</tr>
</table>
<input name="submit" type="submit" value="calculate"><br />
If A=0, the equation is not quadratic.
</form>

<?php
 if (isset($_POST['submit'])) { if ($_POST['A'] == 0) { echo 'The equation is not quadratic'; } else { include 'PHPExcel/IOFactory.php'; $objPHPExcel = PHPExcel_IOFactory::load('./Quadratic.xlsx'); $objPHPExcel->getActiveSheet()->setCellValue('A1', $_POST['A']); $objPHPExcel->getActiveSheet()->setCellValue('B1', $_POST['B']); $objPHPExcel->getActiveSheet()->setCellValue('C1', $_POST['C']); echo '<hr /><b>Roots:</b><br />'; $callStartTime = microtime(true); echo $objPHPExcel->getActiveSheet()->getCell('B5')->getCalculatedValue().'<br />'; echo $objPHPExcel->getActiveSheet()->getCell('B6')->getCalculatedValue().'<br />'; $callEndTime = microtime(true); $callTime = $callEndTime - $callStartTime; echo '<hr />Call time for Quadratic Equation Solution was '.sprintf('%.4f',$callTime).' seconds<br /><hr />'; echo ' Peak memory usage: '.(memory_get_peak_usage(true) / 1024 / 1024).' MB<br />'; } } ?>

</body>
<html>
