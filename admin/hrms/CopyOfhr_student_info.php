<?php
 define('IN_DAEM', true); require_once '../includes/init.php'; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."hr_student"; $query = $db->query($sql); $dataAry = array(); $i = 0; while ($row = $db->fetch_array($query)) { $dataAry[$i] = $row; $dataAry[$i]['course'] = parse_couse_info($row['course']); $i++; } include template(); function parse_couse_info($course) { global $EnumCourseAry; $courseNameStr = ''; $courseAry = explode(',', $course); foreach ($courseAry as $courseId) { $courseNameStr .= $EnumCourseAry[$courseId]."<br />"; } $courseNameStr = rtrim($courseNameStr,','); return $courseNameStr; } 