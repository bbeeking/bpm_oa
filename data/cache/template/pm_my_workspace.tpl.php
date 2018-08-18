<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <!-- 样式控制 header start -->
<?php include "../templates/header.html.php"?>
<!-- 样式控制 header end -->
    </head>
    <body>
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
                    <a href="#">HRMS</a>
                </li>
                <li>
                    <a href="#">我的工作台</a>
                </li>
                <li>show</li>
            </ul>
        </div>
    </nav>
    
    <div class="row-fluid">
    <div class="span12">
<div class="span6">
<h3>指派给我的问题 (<?php echo $myTaskCount;?>)</h3>
<form action="" method="post">
<table class="table table-condensed table-striped">
<thead>
<tr>
<th class="essential">#</th>
<th class="essential">项目</th>
<th class="essential">跟踪</th>
<th class="essential">主题</th>
</tr>
</thead>
<tbody>
<?php if($myTaskAry) { ?>
<?php if(is_array($myTaskAry)) foreach($myTaskAry AS $key=>$val) { ?>
<tr id="issue-<?php echo $key;?>" class="hascontextmenu <?php if($key%2==0) { ?>odd<?php } else { ?>even<?php } ?> issue">
<td class="id"><a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['id'];?></a></td>
<td class="project"><a href=""><?php echo $val['project_id'];?></a></td>
   		<td class="tracker"><?php echo $trackerStatusAry[$val['type']];?></td>
 		<td class="subject">
<a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['title'];?></a> 
<font style="color:#ffffff;font-weight:bold;background:<?php echo $jobStatusBgColor[$val['status']];?>;"><?php echo $jobStatus[$val['status']];?></font>
</td>
    </tr>

<?php } ?>

<?php } ?>
</tbody>
</table>
</form>
<p><a href="task_manager.php?performer=<?php echo $username;?>">查看所有问题</a></p>
</div>

<div class="span6">
<h3>由我跟踪的问题 (<?php echo $myFollowTaskCount;?>)</h3>
<form action="" method="post">
<table class="table table-condensed table-striped">
<thead>
<tr>
<th class="essential">#</th>
<th class="essential">项目</th>
<th class="essential">跟踪</th>
<th class="essential">主题</th>
</tr>
</thead>
<tbody>
<?php if($myFollowTaskAry) { ?>
<?php if(is_array($myFollowTaskAry)) foreach($myFollowTaskAry AS $key=>$val) { ?>
<tr id="issue-<?php echo $key;?>" class="hascontextmenu <?php if($key%2==0) { ?>odd<?php } else { ?>even<?php } ?> issue">
<td class="id"><a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['id'];?></a></td>
<td class="project"><a href=""><?php echo $val['project_id'];?></a></td>
<td class="tracker"><?php echo $trackerStatusAry[$val['type']];?></td>
<td class="subject">
<a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['title'];?></a> 
<font style="color:#ffffff;font-weight:bold;background:<?php echo $jobStatusBgColor[$val['status']];?>;"><?php echo $jobStatus[$val['status']];?></font>
</td>
</tr>

<?php } ?>

<?php } ?>
</tbody>
</table>
</form>
<p><a href="task_manager.php?follower=<?php echo $username;?>">查看所有问题</a></p>
</div>
</div>
</div>

<div class="row-fluid">
    <div class="span12">
<div class="span6">
<h3>已报告的问题 (<?php echo $myCreateTaskCount;?>)</h3>
<form action="" method="post">
<table class="table table-condensed table-striped">
<thead>
<tr>
<th class="essential">#</th>
<th class="essential">项目</th>
<th class="essential">跟踪</th>
<th class="essential">主题</th>
</tr>
</thead>
<tbody>
<?php if($myCreateTaskAry) { ?>
<?php if(is_array($myCreateTaskAry)) foreach($myCreateTaskAry AS $key=>$val) { ?>
<tr id="issue-<?php echo $key;?>" class="hascontextmenu <?php if($key%2==0) { ?>odd<?php } else { ?>even<?php } ?> issue">
<td class="id"><a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['id'];?></a></td>
<td class="project"><a href=""><?php echo $val['project_id'];?></a></td>
<td class="tracker"><?php echo $trackerStatusAry[$val['type']];?></td>
<td class="subject">
<a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['title'];?></a> 
   						<font style="color:#ffffff;font-weight:bold;background:<?php echo $jobStatusBgColor[$val['status']];?>;"><?php echo $jobStatus[$val['status']];?></font>
</td>
</tr>

<?php } ?>

<?php } ?>
</tbody>
</table>
</form>
<p><a href="task_manager.php?builder=<?php echo $username;?>">查看所有问题</a></p>
</div>

<div class="span6">
<h3>当前空闲(未指派)的任务 (<?php echo $idleTaskCount;?>)</h3>
<form action="" method="post">
<table class="table table-condensed table-striped">
<thead>
<tr>
<th class="essential">#</th>
<th class="essential">项目</th>
<th class="essential">跟踪</th>
<th class="essential">主题</th>
</tr>
</thead>
<tbody>
<?php if($idleTaskAry) { ?>
<?php if(is_array($idleTaskAry)) foreach($idleTaskAry AS $key=>$val) { ?>
<tr id="issue-<?php echo $key;?>" class="hascontextmenu <?php if($key%2==0) { ?>odd<?php } else { ?>even<?php } ?> issue">
<td class="id"><a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['id'];?></a></td>
<td class="project"><a href=""><?php echo $val['project_id'];?></a></td>
<td class="tracker"><?php echo $trackerStatusAry[$val['type']];?></td>
<td class="subject">
<a href="task_view.php?id=<?php echo $val['id'];?>"><?php echo $val['title'];?></a> 
<font style="color:#ffffff;font-weight:bold;background:<?php echo $jobStatusBgColor[$val['status']];?>;"><?php echo $jobStatus[$val['status']];?></font>
</td>
</tr>

<?php } ?>

<?php } ?>
</tbody>
</table>
</form>
<p><a href="task_manager.php?performer=null">查看所有问题</a></p>
</div>
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
