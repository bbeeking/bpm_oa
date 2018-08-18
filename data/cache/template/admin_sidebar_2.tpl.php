<?php defined('IN_DAEM') or exit('Access Denied'); ?><meta charset="utf-8" />
<a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="隐藏菜单">菜单控制器</a>
<div class="sidebar">				
<div class="antiScroll">
<div class="antiscroll-inner">
<div class="antiscroll-content">
<div class="sidebar_inner">

<form action="<?php if(trim(get_visit_uri()) != 'index.php') { ?>../product/search_page.php<?php } else { ?>./product/search_page.php<?php } ?>" class="input-append" method="get" >
<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="查找任务信息..." value="<?php echo $_GET['query'];?>" /><button type="submit" class="btn"><i class="icon-search"></i></button>
</form>

<div id="side_accordion" class="accordion">

<!-- sidebar只做三次循环输出三级的目录 四五级目录放到功能中显示 -->
<?php $i=1?>
<?php if(is_array($menuDataInfo)) foreach($menuDataInfo AS $key=>$depth1) { ?>
<div class="accordion-group">
<div class="accordion-heading">
<a href="#<?php echo $i;?>" onclick="set_click_module_sign('<?php echo $depth1['module_sign'];?>');" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
<!--										<i class="<?php if(isset($sidebarIconGlyphs[$key])) { ?><?php echo $sidebarIconGlyphs[$key];?><?php } else { ?>icon-folder-close<?php } ?>"></i> <?php echo $depth1['m_name'];?>-->
<i class="<?php if(!empty($depth1['icon'])) { ?><?php echo $depth1['icon'];?><?php } else { ?>icon-folder-close<?php } ?>"></i> <?php echo $depth1['m_name'];?>
</a>
</div>

<?php if($depth1['module_sign'] == $_SESSION['user_record']['last_mod']) { ?>
<div class="accordion-body collapse in" id="<?php echo $i;?>">
<?php } else { ?>
<div class="accordion-body collapse" id="<?php echo $i;?>">
<?php } ?>

<div class="accordion-inner">
<ul class="nav nav-list">

<?php if(is_array($depth1['list'])) foreach($depth1['list'] AS $key=>$depth2) { ?>

<!-- 控制已选中模块 -->
<?php if($depth2['module_sign']==$_SESSION['user_record']['last_visit']) { ?>
<li class="active">
<?php } else { ?>
<li>
<?php } ?>
<a style="cursor: pointer;" onclick="set_click_module_sign('<?php echo $depth2['module_sign'];?>','<?php echo DAEM_PATH;?>admin/<?php echo $depth2['m_url'];?>');">
<i class="<?php if(!empty($depth2['icon'])) { ?><?php echo $depth2['icon'];?><?php } ?>"></i><?php echo $depth2['m_name'];?>
</a></li>


<?php } ?>

</ul>
</div>
</div>
</div>
<?php $i++?>

<?php } ?>



<div class="accordion-inner">
<ul class="nav nav-list">
<li class="">
<a style="color:#222;" href="<?php echo DAEM_PATH;?>admin/system/password.php">修改用户密码</a>
</li>
</ul>
</div>

</div>

<div class="push"></div>
</div>

<!--
<div class="sidebar_info">
<ul class="unstyled">
<li>
<span class="act act-warning">65</span>
<strong>新评论</strong>
</li>
<li>
<span class="act act-success">10</span>
<strong>新文章</strong>
</li>
<li>
<span class="act act-danger">85</span>
<strong>新会员注册人数</strong>
</li>
</ul>
</div>
-->

<!-- 版权信息 -->
<div class="sidebar_info">
<a target="_blank" href="http://bpm.centone.info"><img src="../images/logo.png"></a>
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
url 	: "<?php echo DAEM_PATH;?>admin/ajax_process_menu.php",
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
window.location.href = uri;
//alert("记录用户操作数据异常!");
}
});
}
}
</script>