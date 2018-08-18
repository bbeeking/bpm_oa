<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    {php include "../templates/header.html.php"}
    <!-- 样式控制 header end -->

    <!-- enhanced select 控制下拉列表多选 -->
    <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />
    <!-- datepicker -->
    <link rel="stylesheet" href="../templates/lib/datepicker/datepicker.css" />
    <!-- nice form elements -->
    <link rel="stylesheet" href="../templates/lib/uniform/Aristo/uniform.aristo.css" />


    <script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>


</head>
<body class="sidebar_left ptrn_a">
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
            <form action="" name="FormPageToAdd" id="FormPageToAdd" enctype="multipart/form-data" method="post" class="form-horizontal">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="heading clearfix">
                            <h3 class="pull-left">{$caseName} &nbsp;&nbsp; 当前节点：{$processAry["nodes"][$currentLocation]["name"]} </h3>
                            <h4 class="pull-right"><font color="red">流程已结束</font></h4>
                            <!--                            <span class="pull-right label label-important">{$templateDataAryCount} Orders</span>-->
                        </div>


                        <table class="table table-striped table-bordered mediaTable">
                            <!--                    <table border="1px;">-->
                            <?php
 foreach($templateDataAry as $key=>$val) { for($i=0;$i<count($val);$i++) { echo "<tr>"; for($j=0;$j<count($val[$i]);$j++) { $isNeed = ($val[$i][$j]["isNeed"] == '1') ? " <span class=\"f_req\">*</span>" : ""; if($val[$i][$j]["type"]!= 'title') { echo "<td>".$val[$i][$j]["name"].$isNeed."</td>"; if(count($val[$i]) == 1) { if(isset($elementTypeConfigAry[$val[$i][$j]["type"]])) { echo "<td colspan='".($maxCountNum-1)."'>".$formElementConfigAry[$val[$i][$j]["formElement"]][$formDataAry[$val[$i][$j]["param"]]]."</td>"; } elseif($val[$i][$j]["type"] == "file") { echo "<td colspan='".($maxCountNum-1)."'><a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\">".$formDataAry[$val[$i][$j]["param"]]["fileName"]."</a></td>"; } elseif($val[$i][$j]["type"] == "image") { echo "<td colspan='".($maxCountNum-1)."'>
                                                                <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                    <a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" title=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."\" class=\"cbox_single\">
                                                                    <img alt=\"\" src=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                </div>
                                                            </td>"; } else { echo "<td colspan='".($maxCountNum-1)."'>".$formDataAry[$val[$i][$j]["param"]]."</td>"; } } else { if(isset($elementTypeConfigAry[$val[$i][$j]["type"]])) { echo "<td>" . $formElementConfigAry[$val[$i][$j]["formElement"]][$formDataAry[$val[$i][$j]["param"]]] . "</td>"; } elseif($val[$i][$j]["type"] == "file") { echo "<td><a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\">".$formDataAry[$val[$i][$j]["param"]]["fileName"]."</a></td>"; } elseif($val[$i][$j]["type"] == "image") { echo "<td>
                                                                <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                    <a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" title=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."\" class=\"cbox_single\">
                                                                    <img alt=\"\" src=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                </div>
                                                            </td>"; } else { echo "<td>" . $formDataAry[$val[$i][$j]["param"]] . "</td>"; } } } else { echo "<td colspan='".$maxCountNum."' style='text-align:center;font-size:18px;font-weight:600'>".$val[$i][$j]["name"]."</td>"; } } echo "</tr>"; } } ?>

                        </table>

                        <div class="control-group">
                            <div class="controls" style="float: right;">
                                <input id="template_id" name="template_id" type="hidden" value="{$tmpTableId}" />
                                <input id="current_location" name="current_location" type="hidden" value="{$currentLocation}" />
                                <input id="template_struct" name="template_struct" type="hidden" value='{_json_encode($templateDataAry)}' />

                                <input id="act" name="act" type="hidden" value="add" />
<!--                                <input name="submit2" class="btn-success" type="button" onclick="submit_template();" class="btn" value="提交" />-->
                                <!--                                <input name="submit1" class="btn-info" type="button" onclick="submit_insert_data();" class="btn" value="添加并预览" />-->
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- 主加载程序main content end -->


    <!-- 左侧菜单导航栏 sidebar start -->
    {php include "../sidebar.php"}
    <!-- 左侧菜单导航栏 sidebar end -->

    <!-- 尾部js加载 footer start -->
    {php include "../templates/footer.html.php"}
    <!-- 尾部js加载 footer end -->

    <!-- v1日期工具 -->
    <script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
    <!-- textareas 自动高度工具 autosize textareas -->
    <script src="../templates/js/forms/jquery.autosize.min.js"></script>

    <!-- 下拉框选项 -->
    <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
    <script src="../templates/js/pms_forms.js"></script>

    <!-- 控制检测表单数据 -->
    <script src="../js/common.js"></script>

    <script type="text/javascript">
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

        function downloadDataTemplate(templateSign){
            $('#downloadTemplateLink').attr('href','../dataAction.php?templateSign='+templateSign+'&act=downloadTemplate');

        }


        <!-- 控制textarea自动高度 -->
        $(document).ready(function() {
            $('.auto_expand').autosize();
        });

    </script>

</div>
</body>
</html>
