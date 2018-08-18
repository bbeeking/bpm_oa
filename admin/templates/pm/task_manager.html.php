<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 样式控制 header start -->
		{php include "../header.php"}
		<!-- 样式控制 header end -->
    </head>
    <body>
		<div id="loading_layer" style="display:none"><img src="../templates/img/ajax_loader.gif" alt="" /></div>
		
		<!-- 加载颜色风格选择器 -->
		{php include "../templates/style_switcher.html.php"} 
		
		<div id="maincontainer" class="clearfix">
			
			<!-- 顶部导航栏 top start -->
            {php include "../top.php"}
            <!-- 顶部导航栏 top end -->
            
            <!-- 主加载程序main content start -->
			<div id="contentwrapper">
			<div class="main_content">
			    <nav>
			        <div id="jCrumbs" class="breadCrumb module">
			            <ul>
			                <li>
			                    <a href="#"><i class="icon-home"></i></a>
			                </li>
			                <li>
			                    <a href="#">HRMS</a>
			                </li>
			                <li>
			                    <a href="#">学员信息列表</a>
			                </li>
			                <li>show</li>
			            </ul>
			        </div>
			    </nav>
			    
				<div class="row-fluid">
					<div class="span12">
						<div class="heading clearfix">
							<h3 class="pull-left">任务管理器</h3>
							<span class="pull-right label label-important">{count($user)} Orders</span>
						</div>
						<table class="table table-condensed table-striped" id="dt_d">
							<thead>
								<tr>
									<th class="optional">{L("#")}</th>
<!--									<th class="optional">{L("项目")}</th>-->
									<th class="essential persist">{L("跟踪")}</th>
<!--									<th class="optional">{L("父任务")}</th>-->
									<th class="optional">{L("状态")}</th>
									<th class="optional">{L("优先级")}</th>
									<th class="essential">{L("项目")}</th>
									<th class="essential">{L("主题")}</th>
									<th class="essential">{L("指派给")}</th>
<!--									<th class="essential">{L("目标版本")}</th>-->
									<th class="essential">{L("开始日期")}</th>
									<th class="essential">{L("完成日期")}</th>
									<th class="essential">{L("% 完成进度")}</th>
								</tr>
							</thead>
							<tbody>
								{loop $dataAry $key=>$val}
									<tr>
										<td>{$val['id']}</td>
<!--										<td>晨曦mlight项目</td>-->
										<td>{$trackerStatusAry[$val['type']]}</td>
<!--										<td>无</td>-->
										<td><font style="color:#ffffff;font-weight:bold;background:{$jobStatusBgColor[$val['status']]};">{$jobStatus[$val['status']]}</font></td>
										<td>{$priorityStatusAry[$val['priority']]}</td>
										<td><font {set_font_style($projectInfo[$val['pid']]['color'])}>{$projectAllAry[$val['pid']]}</font></td>
										<td><a href="task_view.php?id={$val['id']}">{$val['title']}</a></td>
										<td>
											<a href="?performer={$val['performer']}">
							        			{if $val['performer']==$_SESSION['UserName']}
							        				<font style="color:#ffffff;font-weight:bold;background:#507AAA;">
							        				{$userAry[$val['performer']]}
							        				</font>
							        			{else}
							        				{$userAry[$val['performer']]}
							        			{/if}
							        		</a>
										</td>
<!--										<td>v1.0.1</td>-->
										<td>{date('Y-m-d',strtotime($val['start_time']))}</td>
										<td>{date('Y-m-d',strtotime($val['end_time']))}</td>
										<td>
											<div class="sepH_b progress progress-success progress-striped active">
												<div class="bar" style="width: {$val['progress']}%"></div>
											</div>
										</td>
										<!--  
										<td>
											<table class="progress" style="width: 80px;" title="任务完成{$val['progress']}%">
												<tbody>
													<tr>
														{if $val['progress'] == 100 }
															<td class="closed" style="width: {$val['progress']}%;"></td>
														{else}
															{if $val['progress'] == 0 }
															<td class="todo" style="width: {$val['progress']}%;"></td>
															{else}
															<td class="closed" style="width: {$val['progress']}%;"></td>
															<td class="todo" style="width: {number_format(100-$val['progress'])}%;"></td>
															{/if}
														{/if}
													</tr>
												</tbody>
											</table>
										</td>
										-->
									</tr>
								{/loop}
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
			<!-- 主加载程序main content end -->
            
            
			<!-- 左侧菜单导航栏 sidebar start -->
            {php include "../sidebar.php"}
            <!-- 左侧菜单导航栏 sidebar end -->
            
			<!-- 尾部js加载 footer start -->
			{php include "../templates/footer.html.php"}
			<!-- 尾部js加载 footer end -->
			
		</div>
	</body>
</html>