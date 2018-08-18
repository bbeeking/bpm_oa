<?php defined('IN_DAEM') or exit('Access Denied'); ?><meta charset="utf-8" />
<header>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" style="width:220px;" href="<?php echo DAEM_PATH;?>admin/index.php"><!--<i class="icon-home icon-white"></i>--> <i><img src="<?php echo DAEM_PATH;?>admin/templates/icon.png" width="28px"></i> <?php echo WEBTITLE;?></a>
            <ul class="nav user_menu pull-right">
                <li class="hidden-phone hidden-tablet">
                    <div class="nb_boxes clearfix">
                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="新信息">1 <i class="splashy-mail_light"></i></a>
                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="未完成任务" id="fuck"><?php echo count($myUndoJobAry);?> <i class="splashy-calendar_week"></i></a>
                    </div>
                </li>
                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $userAry[$_SESSION['UserName']];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="user_profile.html">账户信息</a></li>
                    <li><a href="javascrip:void(0)">其他</a></li>
                    <li class="divider"></li>

<!--                    <li><a href="<?php echo DAEM_PATH;?>admin/logout.php">登出</a></li>-->
                        <?php if(get_visit_uri()=='index.php' || get_visit_uri()=='') { ?>
                        <li><a href="./logout.php">登出</a></li>
                        <?php } else { ?>
                        <li><a href="../logout.php">登出</a></li>
                        <?php } ?>

                    </ul>
                </li>
            </ul>
<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
<span class="icon-align-justify icon-white"></span>
</a>
            <nav>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> 文档下载 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo DAEM_PATH;?>data/doc/珠海星弘科技EBPM简介.pdf">EBPM平台产品白皮书</a></li>
                                <li><a href="<?php echo DAEM_PATH;?>data/doc/EBPM用户手册.docx">EBPM用户手册</a></li>
                            </ul>
                        </li>
                        <!-- 
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-wrench icon-white"></i> 小工具 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="charts.html">host转发配置工具</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> 版本选择 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo DAEM_PATH;?>../pms_v1/admin/index.php" title="兼容ie6等旧版浏览器">极速版v1.0.1</a></li>
                                <li><a href="../v2/index.php" title="提供更好的用户体验">个性版v2.0.1 Beta</a></li>
                            </ul>
                        </li>
                         -->
                        <!-- 
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> 服区选择 <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../v1/index.php" title="兼容ie6等旧版浏览器">珠海斗门校区</a></li>
                                <li><a href="../v2/index.php" title="提供更好的用户体验">阳江校区</a></li>
                            </ul>
                        </li>
                         -->
                        <li>
                            <a href="<?php echo DAEM_PATH;?>/changelog.txt"><i class="icon-book icon-white"></i>  更新信息</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- 新邮件快捷浏览 -->
<div class="modal hide fade" id="myMail">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3>系统消息</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-info">更多的系统消息请在消息功能模块中查看.</div>
        <table class="table table-condensed table-striped" data-rowlink="a">
            <thead>
                <tr>
                    <th>发送者</th>
                    <th>消息类型</th>
                    <th>标题</th>
                    <th>日期</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>系统管理员</td>
                    <td>通知</td>
                    <td><a href="javascript:void(0)">DREE印刷自动化平台DRS正式版上线</a></td>
                    <td>07/07/2015</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="btn">进入消息中心</a>
    </div>
</div>

</header>