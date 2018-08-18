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
            <nav>
                <div id="jCrumbs" class="breadCrumb module">
                    <ul>
                        <li>
                            <a href="#"><i class="icon-home"></i></a>
                        </li>
                        <li>
                            模板管理
                        </li>
                        <li>模板数据录入</li>
                    </ul>
                </div>
            </nav>

            <h3 class="heading"> 基于模板表单数据录入 <span style="font-size: small;"><i class="icon-filter"></i>[信息录入]</span></h3>
            <form action="" class="form-horizontal well"  name="depthSearch" id="depthSearch"  method="get" >
                <fieldset>
                    <p class="f_legend">选择表单</p>
                    <div class="control-group">
                        <label class="control-label">表单名称：</label>
                        <div class="controls">
                            {get_section("templateSign",$templateSignNameAry,$templateSign,'',"templateSign",'onchange="downloadDataTemplate(this.options[this.options.selectedIndex].value)"')}
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
<!--                            <input name="submit2" onclick="doDataAction();" class="btn-success" type="button"  class="btn" value="下载批量导入模板" />-->
                            <a id="downloadTemplateLink" name="downloadTemplateLink" target="_blank"><input class="btn-success" type="button"  class="btn" value="下载批量导入模板" /></a>
                            <button class="btn" type="submit">{L("提交")}</button>

                            <!-- 用户预览后可以将功能加入到菜单中 -->
                            {if !empty($_GET["templateSign"])}
                            <a href="../system/add_menu.php?templateSign={$_GET["templateSign"]}"><input class="btn-info" type="button"  class="btn" value="+加入菜单" /></a>
                            {/if}

                        </div>
                    </div>
                </fieldset>
            </form>

            <form action="" name="FormPageToAdd" id="FormPageToAdd" enctype="multipart/form-data" method="post" class="form-horizontal">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="heading clearfix">
                            <h3 class="pull-left">EXCEL模板数据录入</h3>
<!--                            <span class="pull-right label label-important">{$dataAryCount} Orders</span>-->
                        </div>

                        <div class="control-group">
                            <label class="control-label">标题 <span class=\"f_req\">*</span> ：</label>
                            <div class="controls">
                                <input type="text" id="title" name="title" value="" /><font style="font-size: 12px;color: red;">（请填写标题）</font>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered mediaTable">
    <!--                    <table border="1px;">-->
                            <?php
 for($i=0;$i<count($dataAry);$i++) { echo "<tr>"; for($j=0;$j<count($dataAry[$i]);$j++) { $isNeed = ($dataAry[$i][$j]["isNeed"] == '1') ? " <span class=\"f_req\">*</span>" : ""; if($dataAry[$i][$j]["type"]!= 'title') { echo "<td>".$dataAry[$i][$j]["name"].$isNeed."</td>"; if(count($dataAry[$i]) == 1) { echo "<td colspan='".($maxCountNum-1)."'>"; if($dataAry[$i][$j]["type"] == "text") { echo "<input type=\"text\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" value=\"\" />"; }elseif($dataAry[$i][$j]["type"] == "date") { echo "<input type=\"text\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" value=\"\" onclick=\"WdatePicker({dateFmt:'yyyy-MM-dd'})\" class=\"Wdate\" />"; }elseif($dataAry[$i][$j]["type"] == "textarea") { echo "<textarea name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\" class=\"auto_expand span12\" cols=\"1\" rows=\"4\" class=\"span12\"></textarea>"; } elseif($dataAry[$i][$j]["type"] == "select") { get_section($dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"] ,'',$ary_first=array(''),$dataAry[$i][$j]["param"],'','',$etc='data-placeholder="请选择..."'); } elseif($dataAry[$i][$j]["type"] == "checkbox") { get_checkbox($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"]); } elseif($dataAry[$i][$j]["type"] == "radio") { get_radio($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"]); } echo "</td>"; } else { echo "<td>"; if($dataAry[$i][$j]["type"] == "text") { echo "<input type=\"text\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" value=\"\" />"; }elseif($dataAry[$i][$j]["type"] == "date") { echo "<input type=\"text\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" value=\"\" onclick=\"WdatePicker({dateFmt:'yyyy-MM-dd'})\" class=\"Wdate\" />"; }elseif($dataAry[$i][$j]["type"] == "textarea") { echo "<div class=\"formSep\">
                                                            <p class=\"sepH_c\"><span class=\"label label-inverse\">Auto-Expanding Textarea</span></p>
                                                            <div class=\"row-fluid\">
                                                                <div class=\"span12\">
                                                                    <textarea name=\"auto_expand\" id=\"auto_expand\" cols=\"1\" rows=\"4\" class=\"span12\"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>"; } elseif($dataAry[$i][$j]["type"] == "select") { get_section($dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"] ,'',$ary_first=array(''),$dataAry[$i][$j]["param"],'','',$etc='data-placeholder="请选择..."'); } elseif($dataAry[$i][$j]["type"] == "checkbox") { get_checkbox($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"]); } elseif($dataAry[$i][$j]["type"] == "radio") { get_radio($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"]); } echo "</td>"; } } else { echo "<td colspan='".$maxCountNum."' style='text-align:center;font-size:18px;font-weight:600'>".$dataAry[$i][$j]["name"]."</td>"; } } echo "</tr>"; } ?>

                        </table>

                        <div class="control-group">
                            <div class="controls" style="float: right;">
                                <input id="act" name="act" type="hidden" value="add" />
                                <input name="submit2" class="btn-success" type="button" onclick="submit_template();" class="btn" value="添加" />
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

        var title = $("#title").val();
        if(trim(title) == '') {
            alert("请输入标题");
            $('#title').focus();
            return false;
        }

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
