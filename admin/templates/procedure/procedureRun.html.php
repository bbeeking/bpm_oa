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

    <!-- 时间日期选择控件样式-->
    <link href="../js/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


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
                            <h3 class="pull-left">{$caseName} &nbsp;&nbsp; 当前节点：{$processAry["nodes"][$currentLocation]["name"]}</h3>
                            <!--                            <span class="pull-right label label-important">{$templateDataAryCount} Orders</span>-->
                        </div>

                        <!--
                        <div class="control-group">
                            <label class="control-label">标题 <span class=\"f_req\">*</span> ：</label>
                            <div class="controls">
                                <input type="text" id="title" name="title" value="" /><font style="font-size: 12px;color: red;">（请填写标题）</font>
                            </div>
                        </div>
                        -->

                        <table class="table table-striped table-bordered mediaTable">
                            <!--                    <table border="1px;">-->
                            <?php
 foreach($templateDataAry as $key=>$val) { for($i=0;$i<count($val);$i++) { echo "<tr>"; for($j=0;$j<count($val[$i]);$j++) { $isNeed = ($val[$i][$j]["isNeed"] == '1') ? " <span class=\"f_req\">*</span>" : ""; if($val[$i][$j]["type"]!= 'title') { echo "<td>".$val[$i][$j]["name"].$isNeed."</td>"; if(count($val[$i]) == 1) { echo "<td colspan='".($maxCountNum-1)."'>"; if($val[$i][$j]["type"] == "text") { echo "<input ".checkParamReadonly($key,$val[$i][$j]["param"])." type=\"text\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" />"; } elseif($val[$i][$j]["type"] == "time") { echo "<div class=\"input-append date form_time\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                                                                <input ".checkParamReadonly($key,$val[$i][$j]["param"])." size=\"16\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" type=\"text\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" readonly>
                                                                <span class=\"add-on\"><i class=\"icon-remove\"></i></span>
                                                                <span class=\"add-on\"><i class=\"icon-th\"></i></span>
                                                            </div>"; } elseif($val[$i][$j]["type"] == "date") { echo "<input ".checkParamReadonly($key,$val[$i][$j]["param"])." size=\"16\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" type=\"text\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" readonly class=\"form_date\">"; } elseif($val[$i][$j]["type"] == "datetime") { echo "<input ".checkParamReadonly($key,$val[$i][$j]["param"])." size=\"16\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" type=\"text\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" readonly class=\"form_datetime\">"; } elseif($val[$i][$j]["type"] == "textarea") { echo "<textarea name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\" class=\"auto_expand span12\" cols=\"1\" rows=\"4\" class=\"span12\" ".checkParamReadonly($key,$val[$i][$j]["param"])." >".$formDataAry[$val[$i][$j]["param"]]."</textarea>"; } elseif($val[$i][$j]["type"] == "textarea-plugin") { echo "<textarea name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\"  cols=\"60\" rows=\"10\" style=\"height:100%;width:90%;\" ".checkParamReadonly($key,$val[$i][$j]["param"]).">".$formDataAry[$val[$i][$j]["param"]]."</textarea>"; if(checkParamReadonly($key,$val[$i][$j]["param"]) == '') { echo '<script language="javascript">
                                                                //激活ueditor
                                                                window.UEDITOR_HOME_URL = "/drs/admin/js/";
                                                                var editor = new UE.ui.Editor();
                                                                editor.render("' . $val[$i][$j]["param"] . '");
                                                            </script>'; } else { echo '<script language="javascript">
                                                                //激活ueditor
                                                                window.UEDITOR_HOME_URL = "/drs/admin/js/";
                                                                var editor = new UE.ui.Editor({readonly:true});
                                                                editor.render("' . $val[$i][$j]["param"] . '");
                                                            </script>'; } } elseif($val[$i][$j]["type"] == "file") { if(checkParamReadonly($key,$val[$i][$j]["param"]) == '') { echo "<div data-fileupload=\"file\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                            <div class=\"input-append\">
                                                                <div class=\"uneditable-input span2\">
                                                                    <i class=\"icon-file fileupload-exists\"></i>
                                                                    <span class=\"fileupload-preview\"></span>
                                                                </div>
                                                                <span class=\"btn btn-file\">
                                                                    <span class=\"fileupload-new\">上传</span>
                                                                    <span class=\"fileupload-exists\">更改</span>
                                                                    <input type=\"file\" name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\" />
                                                                </span>
                                                                <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                            </div>
                                                        </div>"; } echo "<input type=\"hidden\" id=\"".$val[$i][$j]["param"]."@\" name=\"".$val[$i][$j]["param"]."@\" value=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."@@".$formDataAry[$val[$i][$j]["param"]]["path"]."\" /> &nbsp;"; echo "<a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\">".$formDataAry[$val[$i][$j]["param"]]["fileName"]."</a>"; } elseif($val[$i][$j]["type"] == "image") { if(checkParamReadonly($key,$val[$i][$j]["param"]) == '') { echo "<div data-fileupload=\"image\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                                    <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\"></div>
                                                                    <div>
                                                                        <span class=\"btn btn-file\">
                                                                            <span class=\"fileupload-new\">图片上传</span>
                                                                            <span class=\"fileupload-exists\">更改</span>
                                                                            <input type=\"file\" name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\" />
                                                                        </span>
                                                                        <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                                    </div>
                                                                </div>"; } if(!empty($formDataAry[$val[$i][$j]["param"]]["fileName"])) { echo "<input type=\"hidden\" id=\"".$val[$i][$j]["param"]."@\" name=\"".$val[$i][$j]["param"]."@\" value=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."@@".$formDataAry[$val[$i][$j]["param"]]["path"]."\" /> &nbsp;"; echo "<div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                <a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" title=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."\" class=\"cbox_single\">
                                                                <img alt=\"\" src=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                </div>"; } } elseif($val[$i][$j]["type"] == "select") { get_section($val[$i][$j]["param"],$val[$i][$j]["formElementDataAry"] ,$formDataAry[$val[$i][$j]["param"]],$ary_first=array(''),$val[$i][$j]["param"],'','',$etc="data-placeholder=\"请选择...\" ".checkParamReadonly($key,$val[$i][$j]["param"])); } elseif($val[$i][$j]["type"] == "checkbox") { get_checkbox($val[$i][$j]["param"],$val[$i][$j]["param"],$val[$i][$j]["formElementDataAry"],$formDataAry[$val[$i][$j]["param"]],checkParamReadonly($key,$val[$i][$j]["param"])); } elseif($val[$i][$j]["type"] == "radio") { get_radio($val[$i][$j]["param"],$val[$i][$j]["param"],$val[$i][$j]["formElementDataAry"],$formDataAry[$val[$i][$j]["param"]],checkParamReadonly($key,$val[$i][$j]["param"])); } echo "</td>"; } else { echo "<td>"; if($val[$i][$j]["type"] == "text") { echo "<input ".checkParamReadonly($key,$val[$i][$j]["param"])." type=\"text\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" />"; } elseif($val[$i][$j]["type"] == "time") { echo "<div class=\"input-append date form_time\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                                                                <input ".checkParamReadonly($key,$val[$i][$j]["param"])." size=\"16\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" type=\"text\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" readonly>
                                                                <span class=\"add-on\"><i class=\"icon-remove\"></i></span>
                                                                <span class=\"add-on\"><i class=\"icon-th\"></i></span>
                                                            </div>"; } elseif($val[$i][$j]["type"] == "date") { echo "<input ".checkParamReadonly($key,$val[$i][$j]["param"])." size=\"16\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" type=\"text\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" readonly class=\"form_date\">"; } elseif($val[$i][$j]["type"] == "datetime") { echo "<input ".checkParamReadonly($key,$val[$i][$j]["param"])." size=\"16\" id=\"".$val[$i][$j]["param"]."\" name=\"".$val[$i][$j]["param"]."\" type=\"text\" value=\"".$formDataAry[$val[$i][$j]["param"]]."\" readonly class=\"form_datetime\">"; } elseif($val[$i][$j]["type"] == "textarea") { echo "<textarea name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\" class=\"auto_expand span12\" cols=\"1\" rows=\"4\" class=\"span12\" ".checkParamReadonly($key,$val[$i][$j]["param"]).">".$formDataAry[$val[$i][$j]["param"]]."</textarea>"; } elseif($val[$i][$j]["type"] == "textarea-plugin") { echo "<textarea name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\"  class=\"span5\" ".checkParamReadonly($key,$val[$i][$j]["param"]).">".$formDataAry[$val[$i][$j]["param"]]."</textarea>"; if(checkParamReadonly($key,$val[$i][$j]["param"]) == '') { echo '<script language="javascript">
                                                                //激活ueditor
                                                                window.UEDITOR_HOME_URL = "/drs/admin/js/";
                                                                var editor = new UE.ui.Editor();
                                                                editor.render("'.$val[$i][$j]["param"].'");
                                                            </script>'; } else { echo '<script language="javascript">
                                                                //激活ueditor
                                                                window.UEDITOR_HOME_URL = "/drs/admin/js/";
                                                                var editor = new UE.ui.Editor({readonly:true});
                                                                editor.render("' . $val[$i][$j]["param"] . '");
                                                            </script>'; } } elseif($val[$i][$j]["type"] == "file") { if(checkParamReadonly($key,$val[$i][$j]["param"]) == '') { echo "<div data-fileupload=\"file\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                            <div class=\"input-append\">
                                                                <div class=\"uneditable-input span2\">
                                                                    <i class=\"icon-file fileupload-exists\"></i>
                                                                    <span class=\"fileupload-preview\"></span>
                                                                </div>
                                                                <span class=\"btn btn-file\">
                                                                    <span class=\"fileupload-new\">上传</span>
                                                                    <span class=\"fileupload-exists\">更改</span>
                                                                    <input type=\"file\" name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\" />
                                                                </span>
                                                                <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                            </div>
                                                        </div>"; } echo "<input type=\"hidden\" id=\"".$val[$i][$j]["param"]."@\" name=\"".$val[$i][$j]["param"]."@\" value=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."@@".$formDataAry[$val[$i][$j]["param"]]["path"]."\" />"; echo "<a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\">".$formDataAry[$val[$i][$j]["param"]]["fileName"]."</a>"; } elseif($val[$i][$j]["type"] == "image") { if(checkParamReadonly($key,$val[$i][$j]["param"]) == '') { echo "<div data-fileupload=\"image\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                                    <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\"></div>
                                                                    <div>
                                                                        <span class=\"btn btn-file\">
                                                                            <span class=\"fileupload-new\">图片上传</span>
                                                                            <span class=\"fileupload-exists\">更改</span>
                                                                            <input type=\"file\" name=\"".$val[$i][$j]["param"]."\" id=\"".$val[$i][$j]["param"]."\" />
                                                                        </span>
                                                                        <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                                    </div>
                                                                </div>"; } if(!empty($formDataAry[$val[$i][$j]["param"]]["fileName"])) { echo "<input type=\"hidden\" id=\"".$val[$i][$j]["param"]."@\" name=\"".$val[$i][$j]["param"]."@\" value=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."@@".$formDataAry[$val[$i][$j]["param"]]["path"]."\" /> &nbsp;"; echo "<div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                <a href=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" title=\"".$formDataAry[$val[$i][$j]["param"]]["fileName"]."\" class=\"cbox_single\">
                                                                <img alt=\"\" src=\"".DAEM_PATH.$formDataAry[$val[$i][$j]["param"]]["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                </div>"; } } elseif($val[$i][$j]["type"] == "select") { get_section($val[$i][$j]["param"],$val[$i][$j]["formElementDataAry"] ,$formDataAry[$val[$i][$j]["param"]],$ary_first=array(''),$val[$i][$j]["param"],'','',$etc="data-placeholder=\"请选择...\" ".checkParamReadonly($key,$val[$i][$j]["param"])); } elseif($val[$i][$j]["type"] == "checkbox") { get_checkbox($val[$i][$j]["param"],$val[$i][$j]["param"],$val[$i][$j]["formElementDataAry"],$formDataAry[$val[$i][$j]["param"]],checkParamReadonly($key,$val[$i][$j]["param"])); } elseif($val[$i][$j]["type"] == "radio") { get_radio($val[$i][$j]["param"],$val[$i][$j]["param"],$val[$i][$j]["formElementDataAry"],$formDataAry[$val[$i][$j]["param"]],checkParamReadonly($key,$val[$i][$j]["param"])); } echo "</td>"; } } else { echo "<td colspan='".$maxCountNum."' style='text-align:center;font-size:18px;font-weight:600'>".$val[$i][$j]["name"]."</td>"; } } echo "<td style='5px;border-left:none;'><font style=\"float:right;color:red;font-size:12px;\">#$key</font></td>"; echo "</tr>"; } } ?>

                        </table>

                        <div class="control-group">
                            <div class="controls" style="float: right;">
                                <input id="template_id" name="template_id" type="hidden" value="{$tmpTableId}" />
                                <input id="current_location" name="current_location" type="hidden" value="{$currentLocation}" />
                                <input id="template_struct" name="template_struct" type="hidden" value='{_json_encode($templateDataAry)}' />

                                <input id="act" name="act" type="hidden" value="add" />
                                <input name="submit2" class="btn-success" type="button" onclick="submit_template();" class="btn" value="提交" />
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

    <!-- 时间日期选择控件，用户不允许输入，仅允许选择 -->
    <script type="text/javascript" src="../js/datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../js/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

    <!-- 控制检测表单数据 -->
    <script src="../js/common.js"></script>

    <script type="text/javascript">

        $(".form_time").datetimepicker({
            format: 'hh:ii',
            language:  'zh-CN',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });
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
        $(".form_datetime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            language:  'zh-CN',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
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
