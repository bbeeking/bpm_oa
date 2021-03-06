<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 样式控制 header start -->
<?php include "../templates/header.html.php"?>
<!-- 样式控制 header end -->
    </head>
<body class="ptrn_a">
<div id="loading_layer" style="display:none"><img src="../templates/img/ajax_loader.gif" alt="" /></div>

<!-- 加载颜色风格选择器 -->
<?php include "../templates/style_switcher.html.php"?> 

<div id="maincontainer" class="clearfix">

<!-- 顶部导航栏 top start -->
            <?php include "../top.php"?>
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
                    系统设置
                </li>
                <li>群组列表</li>
            </ul>
        </div>
    </nav>
    
<div class="row-fluid">

<div class="span12">

<div class="heading clearfix">
<h3 class="pull-left">群组管理</h3>
<span class="pull-right label label-important"><?php echo count($group);?> Orders</span>
</div>
<table class="table table-striped table-bordered mediaTable" id="dt_d">
<thead>
<tr>
    <th class="essential"><?php echo L("群组名称");?></th>
    <th class="essential"><?php echo L("群组描述");?></th>
    <th class="optional"><?php echo L("操作");?></th>
</tr>
</thead>

<tbody>
<?php if(is_array($group)) foreach($group AS $item=>$group) { ?>
<tr>
    <td><?php echo $group['g_name'];?></td>
    <td><?php echo $group['g_description'];?></td>
    <td><?php if($group['g_name'] != 'administrator') { ?>
    		<a href="purview.php?gid=<?php echo $group['g_id'];?>"><?php echo L("权限分配");?></a>&nbsp;&nbsp;
    	<?php } ?>
    	<a href="group_list.php?gid=<?php echo $group['g_id'];?>"><?php echo L("修改");?></a>&nbsp;&nbsp;
    	<a href="del.php?id=<?php echo $group['g_id'];?>&type=group" onclick="if(!confirm('<?php echo L("您真的要删除");?>《<?php echo $group['g_name'];?>》<?php echo L("群组？删除后将不能恢复。");?>')){return false;}"><?php echo L("删除");?></a>
    </td>
</tr>

<?php } ?>

</tbody>
</table>

</br>

<form action="group_post.php" method="post" onsubmit="return chksubmit();">
<div class="formSep">
<p><span class="label label-inverse"><?php if($grouprow == '') { ?><?php echo L("添加群组");?><?php } else { ?><?php echo L("修改群组");?><?php } ?></span></p>
<div class="row-fluid">
<div class="span5">
<label for="">群组名称</label>
<input type="text" class="span8" name="g_name" id="g_name" value="<?php echo $grouprow['g_name'];?>" <?php if($grouprow['g_name'] == 'administrator') { ?>readonly<?php } ?> />
<span class="help-block"></span>
</div>
<div class="span5">
<label for="">群组描述</label>
<input type="text" class="span8" name="g_description" id="g_description" value="<?php echo $grouprow['g_description'];?>" <?php if($grouprow['g_name'] == 'administrator') { ?>readonly<?php } ?> />
<span class="help-block" id="submitmsg"><?php if($grouprow['g_name'] == 'administrator') { ?><?php echo L("不能对超级管理员进行修改任何信息。");?><?php } ?></span>
</div>
<input class="btn" type="submit" name="submit1" id="submit1" value="<?php echo L("提交");?>" <?php if($grouprow['g_name'] == 'administrator') { ?>disabled<?php } ?> style="margin-top:22px;" />
<?php if($grouprow != '') { ?>
    <input class="btn" type="button" name="fanhui" id="fanhui" value="<?php echo L("返回");?>" onclick="window.location.href='group_list.php';"  style="margin-top:22px;" />
    <?php } ?>
</div>
</div>
</form>

</div>
</div>
</div>
</div>
<!-- 主加载程序main content end -->
            
<!-- 左侧菜单导航栏 sidebar start -->
            <?php include "../sidebar.php"?>
            <!-- 左侧菜单导航栏 sidebar end -->
            
<!-- 尾部js加载 footer start -->
<?php include "../templates/footer.html.php"?>
<!-- 尾部js加载 footer end -->

</div>
</body>
</html>