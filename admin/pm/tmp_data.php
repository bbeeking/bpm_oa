<?php
require_once('../js/dhtmlx/common/connector/scheduler_connector.php'); include ('../js/dhtmlx/common/config.php'); $scheduler = new schedulerConnector($res, $dbtype); $sql = "select * from task_job where builder = '".$_GET['user']."' and create_time = '".$_GET['time']."'"; $scheduler->render_complex_sql($sql, 'id',"start_time,end_time,title,content" ); 