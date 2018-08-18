<meta charset="utf-8" />
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="隐藏菜单">菜单控制器</a>
<div class="sidebar">				
	<div class="antiScroll">
		<div class="antiscroll-inner">
			<div class="antiscroll-content">
				<div class="sidebar_inner">

					<form action="{if trim(get_visit_uri()) != 'index.php'}../product/search_page.php{else}./product/search_page.php{/if}" class="input-append" method="get" >
						<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="查找任务信息..." value="{$_GET['query']}" /><button type="submit" class="btn"><i class="icon-search"></i></button>
					</form>

					<div id="side_accordion" class="accordion">

						<!-- sidebar只做三次循环输出三级的目录 四五级目录放到功能中显示 -->
						{php $i=1}
						{loop $menuDataInfo $key=>$depth1}

							<div class="accordion-group">
								<div class="accordion-heading">
									<a href="#{$i}" onclick="set_click_module_sign('{$depth1['module_sign']}');" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
										<i class="{if isset($sidebarIconGlyphs[$key])}{$sidebarIconGlyphs[$key]}{else}icon-folder-close{/if}"></i> {$depth1['m_name']}
									</a>
								</div>

								{if $depth1['module_sign'] == $_SESSION['user_record']['last_mod']}
								<div class="accordion-body collapse in" id="{$i}">
								{else}
								<div class="accordion-body collapse" id="{$i}">
								{/if}

									<div class="accordion-inner">
										<ul class="nav nav-list">

											{loop $depth1['list'] $key=>$depth2}

											<!-- 控制已选中模块 -->
											{if $depth2['module_sign']==$_SESSION['user_record']['last_visit']}
											<li class="active">
											{else}
											<li>
											{/if}
												<a style="cursor: pointer;" onclick="set_click_module_sign('{$depth2['module_sign']}','{DAEM_PATH}admin/{$depth2['m_url']}');">{$depth2['m_name']}</a></li>

											{/loop}
										</ul>
									</div>
								</div>
							</div>

						{php $i++}
						{/loop}


							<div class="accordion-inner">
								<ul class="nav nav-list">
									<li class="">
										<a style="color:#222;" href="{DAEM_PATH}admin/system/password.php">修改用户密码</a>
									</li>
								</ul>
							</div>

						</div>
					
					<div class="push"></div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		//* search typeahead
		$('.search_query').typeahead({
			source: ["123", "111"],
			items: 4
		});
	});

	/**
	 * 将点击过的侧栏都通过ajax存放校验
	 * 用于控制菜单的高亮标记显示
	 * uri不为空的话才执行请求记录到session中
	 */
	function set_click_module_sign(module_sign,uri){
		if(uri != '' && uri != undefined){
			$.ajax({
				type	: "post",
				url 	: "{DAEM_PATH}admin/ajax_process_menu.php",
				data    :{"module_sign" : module_sign},
				dataType: "json",
//			dataType: "HTML",
				success : function(rs){
//					alert(rs);
					window.location.href = uri;
//				}
//				$('#section_html').html(rs['section_html']);
				},
				error : function(){
					alert("记录用户操作数据异常!");
				}
			});
		}
	}
</script>