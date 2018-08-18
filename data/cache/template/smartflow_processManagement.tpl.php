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
                        <li>Process Management</li>
                    </ul>
                </div>
            </nav>


            <div class="row-fluid">
                <div class="span12">
                    <div class="heading clearfix">
                        <h3 class="pull-left">流程管理</h3>
                    </div>

                    <table class="table table-striped table-bordered mediaTable" id="dt_d">
                        <thead>
                            <tr>
                                <th class="optional"><?php echo L("ID");?></th>
                                <th class="essential persist"><?php echo L("名称");?></th>
                                <th class="optional"><?php echo L("类型");?></th>
                                <th class="optional"><?php echo L("分类");?></th>
                                <th class="optional"><?php echo L("有效");?></th>
                                <th class="optional"><?php echo L("debug");?></th>
                                <th class="optional"><?php echo L("创建人");?></th>
                                <th class="optional"><?php echo L("创建日期");?></th>
                                <th class="optional"><?php echo L("操作");?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($dataAry)) foreach($dataAry AS $key=>$val) { ?>
                            <tr>
                                <td><?php echo $val['id'];?></td>
                                <td><a href="../procedure/procedureRun.php?pid=<?php echo $val['id'];?>"><?php echo $val['process_title'];?></td>
                                <td><?php echo $val['type'];?></td>
                                <td><?php echo $val['category'];?></td>
                                <td><?php echo $enabledConfigAry[$val['status']];?></td>
                                <td><?php echo $enabledConfigAry[$val['debug']];?></td>
                                <td><?php echo $realNameAry[$val['builder']];?></td>
                                <td><?php echo date('Y-m-d H:i:s',$val['create_time']);?></td>
                                <td>
                                    <a href="#" onclick="javascript:window.location = 'flowAdd.php?id=<?php echo $val['id'];?>'">编辑属性</a> |
                                    <a href="#" onclick="javascript:window.location = 'processDesigner.php?id=<?php echo $val['id'];?>'">设计</a>
                                </td>
                            </tr>
                            
<?php } ?>

                        </tbody>
                    </table>
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
        var count = 1;
        function additem(id)
        {
            var row, cell, str;
            row = document.getElementById(id).insertRow();
            if (row != null)
            {
                cell = row.insertCell();
                cell.innerHTML = "<br /><input id=\"param" + count + "\" type=\"text\" class=\"dfinput\" name= \"param" + count + "\" value = \"\"> <input type = \"button\" class=\"btn-danger\" value= \"删除\" onclick = \"deleteitem(this);\" >";
                count++;
            }
        }
        function deleteitem(obj)
        {
            var curRow = obj.parentNode.parentNode;
            formInfoId.deleteRow(curRow.rowIndex);
        }
        function getsub()
        {
            var re = "";
            for(var i=0;i<count;i++)
            {
                //alert("#param" + i + " value is :" + $("#param" + i).val());
                if ($("#param" + i).val() != '')
                {
                    re += $("#param" + i).val() + ',';
                }
            }
            $("#paramName").val(re.substring(0, re.length - 1));
            document.FormPage.submit();
        }

        function chksubmit()
        {
            var name = $('#name').val();
            var formElementSign = $('#formElementSign').val();

            if(name == '') {
                $('#nameMsg').html('<?php echo L("请填写元素名称！");?>');
                $('#name').focus();
                return false;
            }
            if(formElementSign == '') {
                $('#formElementSignMsg').html('<?php echo L("请填写元素标识！");?>');
                $('#formElementSign').focus();
                return false;
            }
            $('#submit1').attr('disabled','disabled');
            getsub();
        }
    </script>

</div>
</body>
</html>
