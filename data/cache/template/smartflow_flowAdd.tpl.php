<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    <?php include "../templates/header.html.php"?>
    <!-- 样式控制 header end -->

    <!-- enhanced select 控制下拉列表多选 -->
    <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />

    <!-- datepicker -->
    <link rel="stylesheet" href="../templates/lib/datepicker/datepicker.css" />
    <!-- nice form elements -->
    <link rel="stylesheet" href="../templates/lib/uniform/Aristo/uniform.aristo.css" />

</head>
<body class="sidebar_left ptrn_a">
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
                            流程管理
                        </li>
                        <li>procedure management</li>
                    </ul>
                </div>
            </nav>

            <form action="" class="form-horizontal well" enctype="multipart/form-data"  name="FormPage" id="FormPage"  method="post" >
                <fieldset>
                    <p class="f_legend">流程初始化</p>
                    <div class="control-group">
                        <label class="control-label">流程名称：<span class="f_req">*</span></label>
                        <div class="controls">
                            <input type="text" class="dfinput"  name="name" id="name" value="<?php echo $result['process_title'];?>" onchange="checkboxControl();" />
                            <span id="nameMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">类型：</label>
                        <div class="controls">
                            <input type="text" class="dfinput"  name="type" id="type" value="<?php echo $result['type'];?>"  />
                            <span id="typeMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">分类：</label>
                        <div class="controls">
                            <?php echo get_section('category',$elementTypeConfigAry,$result['category'],$ary_first=array(0=>L("请选择")),'category','','',$etc='data-placeholder="请选择分类..."');?>
                            <span id="categoryeMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">开启：<span class="f_req">*</span></label>
                        <div class="controls">
                            <?php echo get_section('status',$enabledConfigAry,$result['status'],$ary_first=array(0=>L("请选择")),'status','','',$etc='data-placeholder="是否开启..."');?>
                            <span id="statusMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">调试：<span class="f_req">*</span></label>
                        <div class="controls">
                            <?php echo get_section('debug',$enabledConfigAry,$result['debug'],$ary_first=array(0=>L("请选择")),'debug','','',$etc='data-placeholder="是否调试信息..."');?>
                            <span id="debugMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">流程配置数据：</label><font color="#ff4500">（高级：填写相应的JSON数据，复制导入流程）</font>
                        <div class="controls">
                            <textarea name="config_data" id="config_data" class="auto_expand span6" cols="1" rows="4"><?php echo $result['config_data'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">节点的属性：</label><font color="#ff4500">（高级：关联表，gateway，event，action等）</font>
                        <div class="controls">
                            <textarea name="node_property_config" id="node_property_config" class="auto_expand span6" cols="1" rows="4"><?php echo $result['node_property_config'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="id" id="id" value="<?php echo $result['id'];?>">
                            <input name="submit1" type="button" onclick="chksubmit();" class="btn" value="<?php echo L("提交");?>" />

                            <?php if($_GET["id"]>0) { ?>
                            <a href="../system/add_menu.php?type=flowGo&flowId=<?php echo $_GET["id"];?>">
                                <input class="btn-info" type="button"  class="btn" value="+加入菜单" /></a>
                            <a href="../system/add_menu.php?type=flowData&flowId=<?php echo $_GET["id"];?>">
                                <input class="btn-info" type="button"  class="btn" value="+输出报表加入菜单" /></a>
                            <?php } ?>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <!-- 主加载程序main content end -->


    <!-- 左侧菜单导航栏 sidebar start -->
    <?php include "../sidebar.php"?>
    <!-- 左侧菜单导航栏 sidebar end -->

    <!-- 尾部js加载 footer start -->
    <?php include "../templates/footer.html.php"?>
    <!-- 尾部js加载 footer end -->

    <!-- autosize textareas -->
    <script src="../templates/js/forms/jquery.autosize.min.js"></script>
    <!-- 下拉框选项 -->
    <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
    <!-- user profile functions -->
    <script src="../templates/js/gebo_user_profile.js"></script>

    <script src="../templates/js/pms_forms.js"></script>

    <!-- enhanced select (chosen) -->
    <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>

    <!-- 控制检测表单数据 -->
    <script src="../js/common.js"></script>

    <script type="text/javascript">
        function chksubmit()
        {
            var name = $('#name').val();
            var status = $('#status').val();
            var debug = $('#debug').val();

            if(name == '') {
                $('#nameMsg').html('<?php echo L("请填写流程名称！");?>');
                $('#name').focus();
                return false;
            }
            if(status == '0' ) {
                $('#statusMsg').html('<?php echo L("请填写开启状态！");?>');
                $('#formElementSign').focus();
                return false;
            }
            if(debug == '0') {
                $('#debugMsg').html('<?php echo L("请填写调试状态！");?>');
                $('#debug').focus();
                return false;
            }
            $('#submit1').attr('disabled','disabled');
            document.FormPage.submit();
        }
    </script>

</div>
</body>
</html>
