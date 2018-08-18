<?php
 set_time_limit(0); ob_end_clean(); echo str_pad('',1024); for($i = 1;$i<=100;$i++) { echo $i."<br />"; flush(); sleep(1); }