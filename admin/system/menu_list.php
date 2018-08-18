<?php
 define('IN_DAEM', true); include_once '../includes/init.php'; include_once '../includes/system.func.php'; $menu = ShowMenuList(0); include template('system','menu_list'); function ShowMenuList($parentid) { global $db; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."db_menu where m_parentid='".$parentid."' order by m_locality"; $result = $db->query($sql); while ($row = $db->fetch_array($result)) { if ($row['m_isview'] == '1') $show = '显示'; elseif ($row['m_isview'] == '2') $show = '<font color="#FDHFEE">所有可见</font>'; else $show = '<font color="#ff0000">不显示</font>'; if ($row['m_parentid'] == 0) { $string .= '<tr>
							<td bgcolor="#FFEEEE">'.get_divide_char($row['level'],8).'<img src="../images/menu_plus.gif">&nbsp;'.L($row["m_name"]).'</td>
							<td bgcolor="#FFEEEE">'.$row["m_url"].'</td>
							<td bgcolor="#FFEEEE">'.$row["module_sign"].'</td>
							<td bgcolor="#FFEEEE">'.$row["level"].'</td>
							<td bgcolor="#FFEEEE">'.$row["m_locality"].'</td>
							<td bgcolor="#FFEEEE">'.$show.'</td>
							<td bgcolor="#FFEEEE">
								<a href="edit_menu.php?id='.$row["m_id"].'">修改</a>&nbsp;&nbsp;
								<a href="del.php?id='.$row["m_id"].'&type=menu&name='.urlencode($row['m_name']).'" onclick="if(confirm(\'你真的要删除《'.L($row["m_name"]).'》菜单吗？\')){return true;}else{return false;}">删除</a>
							</td>
						</tr>'; } else { $string .= '<tr>
							<td>'.get_divide_char($row['level'],8).'<img src="../images/menu_arrow.gif">&nbsp;'.L($row["m_name"]).'</td>
							<td >'.$row["m_url"].'</td>
							<td>'.$row["module_sign"].'</td>
							<td>'.$row["level"].'</td>
							<td>'.$row["m_locality"].'</td>
							<td>'.$show.'</td>
							<td>
								<a href="edit_menu.php?id='.$row["m_id"].'">修改</a>&nbsp;&nbsp;
								<a href="del.php?id='.$row["m_id"].'&type=menu&name='.urlencode($row['m_name']).'" onclick="if(confirm(\'你真的要删除《'.L($row["m_name"]).'》菜单吗？\')){return true;}else{return false;}">删除</a>
							</td>
						</tr>'; } $string .= ShowMenuList($row['m_id']); } return $string; }