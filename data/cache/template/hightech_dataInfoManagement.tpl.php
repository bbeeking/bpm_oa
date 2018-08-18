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

    <!-- 时间日期选择控件样式-->
    <link href="../js/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

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
                            模板管理
                        </li>
                        <li>数据管理</li>
                    </ul>
                </div>
            </nav>

            <!--  20171227 以为菜单功能的屏蔽无关信息 -->
            <?php if($_GET["t"]!="smartForm") { ?>
            <h3 class="heading"> CBR模板数据管理</h3>
            <form action="" class="form-horizontal well"  method="get" >
                <fieldset>
                    <p class="f_legend">选择模板</p>
                    <div class="control-group">
                        <label class="control-label">模板名称：</label>
                        <div class="controls">
                            <?php echo get_section("templateSign",$templateSignNameAry,$templateSign,$ary_first=array(''),"templateSign");?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button class="btn" type="submit"><?php echo L("提交");?></button>

                            <!-- 用户预览后可以将功能加入到菜单中 -->
                            <?php if(!empty($_GET["templateSign"])) { ?>
                            <a href="../system/add_menu.php?type=formData&templateSign=<?php echo $_GET["templateSign"];?>"><input class="btn-info" type="button"  class="btn" value="+加入菜单" /></a>
                            <a onclick="alert('高级企业版开放该功能!');" > <input class="btn-success btn" type="button" value="接口" /></a>
                            <a onclick="alert('高级企业版开放该功能!');" > <input class="btn-success btn" type="button" value="自定义表格" /></a>
                            <?php } ?>

                        </div>
                    </div>
                </fieldset>
            </form>
            <?php } ?>



                <div class="row-fluid">
                    <div class="span12">

                        <!--  20171227 以为菜单功能的屏蔽无关信息 -->
                        <?php if($_GET["t"]!="smartForm") { ?>
                        <div class="heading clearfix">
                            <h3 class="pull-left">表单信息管理<a onclick="depth_search();" style="font-size: small;"><i class="icon-filter"></i>[属性筛选]</a></h3>
                            <span class="pull-right label label-important">共找到 <?php echo count($dataInfoAry);?>/<?php echo $totalNum;?> 条记录</span>
                        </div>
                        <?php } ?>



                        <form action="?" class="form-horizontal well"  name="depthSearch" id="depthSearch"  method="get" style="<?php if(empty($_GET['startDate'])) { ?>display:none;<?php } ?>" >
                            <fieldset>
                                <p class="f_legend">属性筛选</p>

                                <div class="control-group">
                                    <label class="control-label"><?php echo L("日期");?>：</label>
                                    <div class="controls">
                                        从 <input size="16" type="text" id="startDate" name="startDate" value="<?php echo $startDate;?>" class="form_date" />
                                        到 <input size="16" type="text" id="endDate" name="endDate" value="<?php echo $endDate;?>"  class="form_date" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <input type="hidden" name="templateSign" id="templateSign" value="<?php echo $templateSign;?>" />
                                        <input type="hidden" name="selectDay" value=""/>
                                        <button class="btn" type="submit"><?php echo L("查询");?></button>
                                        <button class="btn" id="preMonth" /><?php echo L("上一月");?></button>
                                        <button class="btn" id="nextMonth" /><?php echo L("下一月");?></button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>



                        <table class="table table-striped table-bordered mediaTable" id="dt_d">

                            <thead>
                                <tr>
                                    <th class="optional" id="deal_seed"><?php echo L("id");?></th>
                                    <th class="essential persist"><?php echo L("标题");?></th>
                                    <th class="essential"><?php echo L("创建人");?></th>
                                    <th class="essential"><?php echo L("创建日期");?></th>
                                    <th class="essential"><?php echo L("审核人");?></th>
                                    <th class="essential"><?php echo L("审核日期");?></th>
                                    <th class="essential"><?php echo L("审核状态");?></th>
                                    <th class="essential"><?php echo L("操作");?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($dataInfoAry)) foreach($dataInfoAry AS $data) { ?>

                                <tr>
                                    <td><?php echo $data['id'];?></td>
                                    <td><a data-toggle="modal" data-backdrop="static" href="#myModal<?php echo $data['id'];?>"><?php echo $data['title'];?></a></td>
                                    <td><?php echo $data['builder'];?></td>
                                    <td><?php echo date("Y-m-d H:i:s",$data['create_time']);?></td>
                                    <td><?php echo $data['approver'];?></td>
                                    <td><?php echo $data['approval_date'];?></td>
                                    <td><?php echo $appStateAry[$data['status']];?></td>
                                    <td>
                                        <?php if(($data['status'] == '1')) { ?>
                                        <a href="./excel_data_form.php?templateSign=<?php echo $templateSign;?>&id=<?php echo $data['id'];?>">修改</a> |
                                        <a onclick="deal_list('<?php echo $templateSign;?>','<?php echo $data['title'];?>','<?php echo $data['id'];?>','2');">审核通过</a> |
                                        <a onclick="deal_list('<?php echo $templateSign;?>','<?php echo $data['title'];?>','<?php echo $data['id'];?>','3');">驳回</a> |
                                        <a onclick="deal_list('<?php echo $templateSign;?>','<?php echo $data['title'];?>','<?php echo $data['id'];?>','4');">删除</a> |
<!--                                        <a onclick="del_list('<?php echo $templateSign;?>','<?php echo $data['title'];?>','<?php echo $data['id'];?>');">删除 </a>-->
                                        <?php } else { ?>
                                        -
                                        <?php } ?>


                                        <div class="modal hide fade" id="myModal<?php echo $data['id'];?>" style="width: 860px;left: 36%;">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">×</button>
                                                <h3>内容详情</h3>
                                            </div>
                                            <div class="modal-body">

                                                <table class="table table-striped table-bordered mediaTable">
                                                    <?php
                                                    for($i=0;$i<count($dataAry);$i++)
                                                    {
                                                        echo "<tr>";
                                                        /* 输出字段名及值 */
                                                        for($j=0;$j<count($dataAry[$i]);$j++)
                                                        {
                                                            $isNeed = ($dataAry[$i][$j]["isNeed"] == '1') ? " <span class=\"f_req\">*</span>" : "";

                                                            if($dataAry[$i][$j]["type"]!= 'title')
                                                            {
                                                                echo "<td>".$dataAry[$i][$j]["name"].$isNeed."</td>";
                                                                //一行只有一个字段的情况下，name占用一单元格，剩下的为值
                                                                if(count($dataAry[$i]) == 1)
                                                                {
                                                                    //2017-07-13如果是自定义表单元素类型，需要加入枚举配置替换值
                                                                    if(isset($elementTypeConfigAry[$dataAry[$i][$j]["type"]]))
                                                                    {
                                                                        echo "<td colspan='".($maxCountNum-1)."'>".$formElementConfigAry[$dataAry[$i][$j]["formElement"]][$data[$dataAry[$i][$j]["param"]]]."</td>";
                                                                    }
                                                                    //2018-01-23 判断是否文件/附件类型
                                                                    elseif($dataAry[$i][$j]["type"] == "file")
                                                                    {
                                                                        $tmpFileInfoAry = json_decode($data[$dataAry[$i][$j]["param"]],true);
                                                                        echo "<td colspan='".($maxCountNum-1)."'><a href=\"".DAEM_PATH.$tmpFileInfoAry["path"]."\">".$tmpFileInfoAry["fileName"]."</a></td>";
                                                                    }
                                                                    elseif($dataAry[$i][$j]["type"] == "image")
                                                                    {
                                                                        $tmpFileInfoAry = json_decode($data[$dataAry[$i][$j]["param"]],true);
                                                                        //echo "<td colspan='".($maxCountNum-1)."'><a href=\"".DAEM_PATH.$tmpFileInfoAry["path"]."\">".$tmpFileInfoAry["fileName"]."</a></td>";
                                                                        echo "<td colspan='".($maxCountNum-1)."'>
                                                                                    <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                                        <a href=\"".DAEM_PATH.$tmpFileInfoAry["path"]."\" title=\"".$tmpFileInfoAry["fileName"]."\" class=\"cbox_single\">
                                                                                        <img alt=\"\" src=\"".DAEM_PATH.$tmpFileInfoAry["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                                    </div>
                                                                                </td>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "<td colspan='".($maxCountNum-1)."'>".$data[$dataAry[$i][$j]["param"]]."</td>";
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    //2017-07-13如果是自定义表单元素类型，需要加入枚举配置替换值
                                                                    if(isset($elementTypeConfigAry[$dataAry[$i][$j]["type"]]))
                                                                    {
                                                                        echo "<td>" . $formElementConfigAry[$dataAry[$i][$j]["formElement"]][$data[$dataAry[$i][$j]["param"]]] . "</td>";
                                                                    }
                                                                    elseif($dataAry[$i][$j]["type"] == "file")
                                                                    {
                                                                        $tmpFileInfoAry = json_decode($data[$dataAry[$i][$j]["param"]],true);
                                                                        echo "<td><a href=\"".DAEM_PATH.$tmpFileInfoAry["path"]."\">".$tmpFileInfoAry["fileName"]."</a></td>";
                                                                    }
                                                                    elseif($dataAry[$i][$j]["type"] == "image")
                                                                    {
                                                                        $tmpFileInfoAry = json_decode($data[$dataAry[$i][$j]["param"]],true);
                                                                        echo "<td>
                                                                                    <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                                        <a href=\"".DAEM_PATH.$tmpFileInfoAry["path"]."\" title=\"".$tmpFileInfoAry["fileName"]."\" class=\"cbox_single\">
                                                                                        <img alt=\"\" src=\"".DAEM_PATH.$tmpFileInfoAry["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                                    </div>
                                                                                </td>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "<td>" . $data[$dataAry[$i][$j]["param"]] . "</td>";
                                                                    }
                                                                }

                                                            }
                                                            else
                                                            {
                                                                echo "<td colspan='".$maxCountNum."' style='text-align:center;font-size:18px;font-weight:600'>".$dataAry[$i][$j]["name"]."</td>";
                                                            }
                                                        }
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </table>

                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn" data-dismiss="modal">关闭</a>
                                            </div>
                                        </div>


                                    </td>
                                </tr>

                            
<?php } ?>

                            </tbody>

                        </table>

                        <div class="control-group">
                            <div class="controls" style="float: right;">
<!--                                <input id="act" name="act" type="hidden" value="add" />-->
<!--                                <input name="submit2" class="btn-success" type="button" onclick="submit_template();" class="btn" value="添加" />-->
<!--                                <input name="submit1" class="btn-info" type="button" onclick="submit_insert_data();" class="btn" value="添加并预览" />-->
                            </div>
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

    <!-- v1日期工具 -->
    <script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
    <!-- textareas 自动高度工具 autosize textareas -->
    <script src="../templates/js/forms/jquery.autosize.min.js"></script>

    <!-- 时间日期选择控件，用户不允许输入，仅允许选择 -->
    <script type="text/javascript" src="../js/datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../js/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

    <!-- 下拉框选项 -->
    <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
    <script src="../templates/js/pms_forms.js"></script>

    <script type="text/javascript">


        $(".form_date").datetimepicker({
            format: 'yyyy-mm-dd',
            language:  'zh-CN',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });


    function submit_template(){
        //抑制冒泡事件防止重复提交
        $('#submit1').attr('disabled','disabled');
        $('#submit2').attr('disabled','disabled');
        document.FormPageToAdd.submit();
    }
    function submit_insert_data(){
        //抑制冒泡事件防止重复提交
        $('#submit1').attr('disabled','disabled');
        $('#submit2').attr('disabled','disabled');
        $('#insertData').val("1");
        document.FormPageToAdd.submit();
    }


    <!-- 控制textarea自动高度 -->
    $(document).ready(function() {
        $('.auto_expand').autosize();
    });

    //日志记录审批  通过,驳回,取消申请
    function deal_list(templateSign,title,sign_key,status)
    {
        des = '';
        if(status == '2') des = '审核通过';
        else if(status == '3') des = '驳回';
        else if(status == '4') des = '删除';
        if(des == '') return;

        cs = '是否'+des+'案例提交申请： "'+title+'" ?';
        if(confirm(cs)) {
            window.location = 'dataInfoManagement.php?sign_key='+sign_key+'&status='+status+'&templateSign='+templateSign;
        }
    }

    //检索功能
    function depth_search()
    {
        document.getElementById("depthSearch").style.display = "block";
    }

    $("#preMonth").click(function(){
        $("input[name='selectDay']").attr("value","preMonth");
        $("form[name='depthSearch']").submit();
    });
    $("#nextMonth").click(function(){
        $("input[name='selectDay']").attr("value","nextMonth");
        $("form[name='depthSearch']").submit();
    });




    </script>

</div>
</body>
</html>
