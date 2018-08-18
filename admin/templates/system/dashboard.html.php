<!DOCTYPE html>
<html lang="en">
    <head>

		<!-- 样式控制 header start -->
		{php include "../templates/header.html.php"}
		<!-- 样式控制 header end -->

		<!-- flags -->
		<link rel="stylesheet" href="../templates/img/flags/flags.css" />
		<!-- calendar -->
		<link rel="stylesheet" href="../templates/lib/fullcalendar/fullcalendar_gebo.css" />


	</head>
    <body>
		<div id="loading_layer" style="display:none"><img src="../templates/img/ajax_loader.gif" alt="" /></div>

		<!-- 加载颜色风格选择器 -->
		{php include "../templates/style_switcher.html.php"}
		
		<div id="maincontainer" class="clearfix">

			<!-- 顶部导航栏 top start -->
			{php include "../top.php"}
			<!-- 顶部导航栏 top end -->
            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    
					<div class="row-fluid">
						<div class="span12 tac">
							<ul class="ov_boxes">
								<li>
									<div class="p_line_up p_canvas">{$weekStaticStr}</div>
									<div class="ov_text">
										<strong>{$thisWeekCount}条</strong>
										本周提交流程
									</div>
								</li>
								<li>
									<div class="p_line_down p_canvas">{$monthStaticStr}</div>
									<div class="ov_text">
										<strong>{$thisMonthCount}条</strong>
										本月提交流程
									</div>
								</li>
								<li>
									<div class="p_line_up p_canvas">3,5,9,7,12,8,16</div>
									<div class="ov_text">
										<strong>{$finishCaseNum}/{$totalCaseNum}</strong>
										累计办结流程/总流程
									</div>
								</li>
								<li>
									<div class="p_line_down p_canvas">20,16,14,18,15,14,14,13,12,10,10,8</div>
									<div class="ov_text">
										<strong>30240</strong>
										表单信息录入
									</div>
								</li>
								<li>
									<div class="p_line_up p_canvas">3,5,9,7,12,8,16</div>
									<div class="ov_text">
										<strong>2304</strong>
										访问人数 (当天)
									</div>
								</li>

							</ul>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<ul class="dshb_icoNav tac">
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/edit.png)">添加任务</a></li>
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/push-pin.png)">我的工作台</a></li>
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/add-item.png)"> 发起流程</a></li>
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/edit.png)"><span class="label label-important">+10</span>流程签审</a></li>
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/database.png)"> 录入信息</a></li>
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/multi-agents.png)"><span class="label label-info">+10</span> 注册用户数</a></li>
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/email.png)"><span class="label label-success">$2851</span> 邮件消息</a></li>
								<li><a href="javascript:void(0)" style="background-image: url(../templates/img/gCons/configuration.png)">设置</a></li>
							</ul>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span5">
							<h3 class="heading">流程办结比例 <small>截止当天</small></h3>
							<div id="fl_2" style="height:200px;width:80%;margin:50px auto 0"></div>
						</div>
						<!--
						<div class="span7">
							<div class="heading clearfix">
								<h3 class="pull-left">Another Chart</h3>
								<span class="pull-right label label-info ttip_t" title="Here is a sample info tooltip">Info</span>
							</div>
							<div id="fl_1" style="height:270px;width:100%;margin:15px auto 0"></div>
						</div>
						-->
					</div>
                    <div class="row-fluid">
                        <div class="span6">
							<div class="heading clearfix">
								<h3 class="pull-left">最新提交流程</h3>
								<span class="pull-right label label-important">5 Orders</span>
							</div>
							<table class="table table-striped table-bordered mediaTable">
								<thead>
									<tr>
										<th class="optional">id</th>
										<th class="essential persist">Customer</th>
										<th class="optional">Status</th>
										<th class="optional">Date Added</th>
										<th class="essential">Total</th>
										<th class="essential">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>134</td>
										<td>Summer Throssell</td>
										<td>Pending</td>
										<td>24/04/2012</td>
										<td>$120.23</td>
										<td>
											<a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
											<a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
											<a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
										</td>
									</tr>
									<tr>
										<td>133</td>
										<td>Declan Pamphlett</td>
										<td>Pending</td>
										<td>23/04/2012</td>
										<td>$320.00</td>
										<td>
											<a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
											<a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
											<a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
										</td>
									</tr>
									<tr>
										<td>132</td>
										<td>Erin Church</td>
										<td>Pending</td>
										<td>23/04/2012</td>
										<td>$44.00</td>
										<td>
											<a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
											<a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
											<a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
										</td>
									</tr>
									<tr>
										<td>131</td>
										<td>Koby Auld</td>
										<td>Pending</td>
										<td>22/04/2012</td>
										<td>$180.20</td>
										<td>
											<a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
											<a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
											<a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
										</td>
									</tr>
									<tr>
										<td>130</td>
										<td>Anthony Pound</td>
										<td>Pending</td>
										<td>20/04/2012</td>
										<td>$610.42</td>
										<td>
											<a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a>
											<a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a>
											<a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
                        </div>
                        <div class="span6">
							<div class="heading clearfix">
								<h3 class="pull-left">最新上传图片 <small>(文件库筛选)</small></h3>
								<span class="pull-right label label-success">10</span>
							</div>
							<div id="small_grid" class="wmk_grid">
								<ul>
									<li class="thumbnail">
										<a title="Image_4 title long title long title long" href="../templates/gallery/Image04.jpg">
											<img alt="" src="../templates/gallery/Image04_tn.jpg">
										</a>
										<p>
											<span>302KB<br>15/05/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_5 title long title long title long" href="../templates/gallery/Image05.jpg">
											<img alt="" src="../templates/gallery/Image05_tn.jpg">
										</a>
										<p>
											<span>336KB<br>24/05/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_6 title long title long title long" href="../templates/gallery/Image06.jpg">
											<img alt="" src="../templates/gallery/Image06_tn.jpg">
										</a>
										<p>
											<span>258KB<br>27/06/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_7 title long title long title long" href="../templates/gallery/Image07.jpg">
											<img alt="" src="../templates/gallery/Image07_tn.jpg">
										</a>
										<p>
											<span>338KB<br>22/06/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_8 title long title long title long" href="../templates/gallery/Image08.jpg">
											<img alt="" src="../templates/gallery/Image08_tn.jpg">
										</a>
										<p>
											<span>381KB<br>25/06/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_9 title long title long title long" href="../templates/gallery/Image09.jpg">
											<img alt="" src="../templates/gallery/Image09_tn.jpg">
										</a>
										<p>
											<span>176KB<br>11/06/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_10 title long title long title long" href="../templates/gallery/Image10.jpg">
											<img alt="" src="../templates/gallery/Image10_tn.jpg">
										</a>
										<p>
											<span>380KB<br>20/06/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_11 title long title long title long" href="../templates/gallery/Image11.jpg">
											<img alt="" src="../templates/gallery/Image11_tn.jpg">
										</a>
										<p>
											<span>340KB<br>17/06/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_12 title long title long title long" href="../templates/gallery/Image12.jpg">
											<img alt="" src="../templates/gallery/Image12_tn.jpg">
										</a>
										<p>
											<span>191KB<br>27/05/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_13 title long title long title long" href="../templates/gallery/Image13.jpg">
											<img alt="" src="../templates/gallery/Image13_tn.jpg">
										</a>
										<p>
											<span>314KB<br>24/05/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_14 title long title long title long" href="../templates/gallery/Image14.jpg">
											<img alt="" src="../templates/gallery/Image14_tn.jpg">
										</a>
										<p>
											<span>141KB<br>17/06/2012</span>
										</p>
									</li>
									<li class="thumbnail">
										<a title="Image_15 title long title long title long" href="../templates/gallery/Image15.jpg">
											<img alt="" src="../templates/gallery/Image15_tn.jpg">
										</a>
										<p>
											<span>183KB<br>13/05/2012</span>
										</p>
									</li>
									 
								</ul>
							</div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
							<h3 class="heading">流程办结历</h3>
							<div id="calendar"></div>
                        </div>
                        <div class="span4" id="user-list">
							<h3 class="heading">通讯录 </h3>
							<div class="row-fluid">
								<div class="input-prepend">
									<span class="add-on ad-on-icon"><i class="icon-user"></i></span><input type="text" class="user-list-search search" placeholder="Search user" />
								</div>
								<ul class="nav nav-pills line_sep">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort by <b class="caret"></b></a>
										<ul class="dropdown-menu sort-by">
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_name">by name</a></li>
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_status">by status</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
										<ul class="dropdown-menu filter">
											<li class="active"><a href="javascript:void(0)" id="filter-none">All</a></li>
											<li><a href="javascript:void(0)" id="filter-online">Online</a></li>
											<li><a href="javascript:void(0)" id="filter-offline">Offline</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list">
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">John Doe</a><br />
									<small class="s_color sl_email">johnd@example1.com</small>
								</li>
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">Kate Miller</a><br />
									<small class="s_color sl_email">kmiller@example1.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">James Vandenberg</a><br />
									<small class="s_color sl_email">jamesv@example2.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">Donna Doerr</a><br />
									<small class="s_color sl_email">donnad@example3.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">Perry Weitzel</a><br />
									<small class="s_color sl_email">perryw@example2.com</small>
								</li>
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">Charles Bledsoe</a><br />
									<small class="s_color sl_email">charlesb@example3.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">Wendy Proto</a><br />
									<small class="s_color sl_email">wnedyp@example1.com</small>
								</li>
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">Nancy Ibrahim</a><br />
									<small class="s_color sl_email">nancyi@example2.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">Eric Cantrell</a><br />
									<small class="s_color sl_email">ericc@example4.com</small>
								</li>
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">Andre Hill</a><br />
									<small class="s_color sl_email">andreh@example2.com</small>
								</li>
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">Laura Taggart</a><br />
									<small class="s_color sl_email">laurat@example3.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">Doug Singer</a><br />
									<small class="s_color sl_email">dougs@example2.com</small>
								</li>
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">Douglas Arnott</a><br />
									<small class="s_color sl_email">douglasa@example1.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">Lauren Henley</a><br />
									<small class="s_color sl_email">laurenh@example3.com</small>
								</li>
								<li>
									<span class="label label-important pull-right sl_status">offline</span>
									<a href="#" class="sl_name">William Jardine</a><br />
									<small class="s_color sl_email">williamj@example4.com</small>
								</li>
								<li>
									<span class="label label-success pull-right sl_status">online</span>
									<a href="#" class="sl_name">Yves Ouellet</a><br />
									<small class="s_color sl_email">yveso@example2.com</small>
								</li>
							</ul>
							<div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    </div>
                        
                </div>
            </div>

			<!-- 左侧菜单导航栏 sidebar start -->
			{php include "../sidebar.php"}
			<!-- 左侧菜单导航栏 sidebar end -->

			<!-- 尾部js加载 footer start -->
			{php include "../templates/footer.html.php"}
			<!-- 尾部js加载 footer end -->

			<!-- touch events for jquery ui-->
			<script src="../templates/js/forms/jquery.ui.touch-punch.min.js"></script>
			<!-- multi-column layout -->
			<script src="../templates/js/jquery.imagesloaded.min.js"></script>
			<script src="../templates/js/jquery.wookmark.js"></script>
			<!-- responsive table -->
			<script src="../templates/js/jquery.mediaTable.min.js"></script>
			<!-- charts -->
			<script src="../templates/lib/flot/jquery.flot.min.js"></script>
			<script src="../templates/lib/flot/jquery.flot.resize.min.js"></script>
			<script src="../templates/lib/flot/jquery.flot.pie.min.js"></script>
			<!-- calendar -->
			<script src="../templates/lib/fullcalendar/fullcalendar.min.js"></script>
			<!-- sortable/filterable list -->
			<script src="../templates/lib/list_js/list.min.js"></script>
			<script src="../templates/lib/list_js/plugins/paging/list.paging.min.js"></script>
			<!-- dashboard functions -->
			<script src="../templates/js/gebo_dashboard.js"></script>
            
		</div>
	</body>
</html>