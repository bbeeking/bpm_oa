<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; include_once '../includes/task.func.php'; $project = ShowProjectList(0); include template(); function ShowProjectList($parent_pid) { global $db; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."task_project where parent_pid='".$parent_pid."' order by locality"; $query = $db->query($sql); while ($row = $db->fetch_array($query)) { if ($row['parent_pid'] == 0) { $string .= '<tr>
							<td bgcolor="#FFEEEE">&nbsp;<img src="../images/menu_plus.gif">&nbsp;'.L($row["project_name"]).'</td>
							<td bgcolor="#FFEEEE">'.$row["locality"].'</td>
							<td bgcolor="#FFEEEE">'.$row["status"].'</td>
							<td bgcolor="#FFEEEE">
								<a href="edit_project.php?pid='.$row["pid"].'">修改</a>&nbsp;&nbsp;
								<a href="del.php?pid='.$row["m_id"].'&type=project&name='.urlencode($row['project_name']).'" onclick="if(confirm(\'你真的要删除《'.L($row["project_name"]).'》项目吗？\')){return true;}else{return false;}">删除</a>
							</td>
						</tr>'; $string .= ShowProjectList($row['pid']); } else { $string .= '<tr>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/menu_arrow.gif">&nbsp;'.L($row["project_name"]).'</td>
							<td>'.$row["locality"].'</td>
							<td>'.$row["status"].'</td>
							<td>
								<a href="edit_project.php?pid='.$row["pid"].'">修改</a>&nbsp;&nbsp;
								<a href="del.php?pid='.$row["pid"].'&type=project&name='.urlencode($row['project_name']).'" onclick="if(confirm(\'你真的要删除《'.L($row["project_name"]).'》菜单吗？\')){return true;}else{return false;}">删除</a>
							</td>
						</tr>'; } } return $string; } 