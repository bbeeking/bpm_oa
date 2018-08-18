<?php
 define('IN_DAEM', true); include '../includes/init.php'; $gid = ceil($_GET['gid']); if ($gid>0) { $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."db_admingroup where g_id='".$gid."'"; if (!$row = $db->query_first($sql)) { $db->close(); gourl('未查询到相关信息。','',-1); } if ($row['g_name'] == 'administrator') { $db->close(); gourl('不能对超级管理员进行权限分配。','',-1); } } $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."db_admingroup where 1"; $dbs = $db->query($sql); while ($q = mysql_fetch_assoc($dbs)) { $groups[] = $q; } $resourceAry = array(); $sql = "select p_rid from ".DB_DAEMDB.".".TB_SUFFIX."db_purview where p_gid='".$gid."'"; $result = $db->query($sql); while ($row = $db->fetch_array($result)) { $resourceAry[$row['p_rid']] = 1; } $modList = ShowModList(0); function ShowModList($parentid) { global $db,$resourceAry; $sql = "select * from ".DB_DAEMDB.".".TB_SUFFIX."db_menu where m_parentid='".$parentid."' order by m_locality"; $result = $db->query($sql); while ($row = $db->fetch_array($result)) { if ($row['m_isview'] == '1') $show = '显示'; elseif ($row['m_isview'] == '2') $show = '<font color="#FDHFEE">所有可见</font>'; else $show = '<font color="#ff0000">不显示</font>'; if (isset($resourceAry[$row['m_id']])){ $checked = 'checked'; } else { $checked = ''; } if ($row['m_parentid'] == 0) { $string .= '<tr>
							<td bgcolor="#FFEEEE">'.get_divide_char($row['level'],8).'<img src="../images/menu_plus.gif">&nbsp;'.L($row["m_name"]).'</td>
							<td bgcolor="#FFEEEE">'.$row["m_url"].'</td><td bgcolor="#FFEEEE">'.$row["m_locality"].'</td>
							<td bgcolor="#FFEEEE">'.$show.'</td>
							<td bgcolor="#FFEEEE">
								<input type="checkbox" name="purview[]" value="'.$row['m_id'].'" '.$checked.' onclick="selectpurview(this)" />
							</td>
						</tr>'; } else { $string .= '<tr>
							<td>'.get_divide_char($row['level'],8).'<img src="../images/menu_arrow.gif">&nbsp;'.L($row["m_name"]).'</td>
							<td >'.$row["m_url"].'</td>
							<td>'.$row["m_locality"].'</td>
							<td>'.$show.'</td>
							<td>
								<input type="checkbox" name="purview[]" value="'.$row['m_id'].'" '.$checked.' />
							</td>
						</tr>'; } $string .= ShowModList($row['m_id']); } return $string; } include template('system','purview');