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

    <!-- notifications -->
    <link rel="stylesheet" href="../templates/lib/sticky/sticky.css" />
    <!-- smoke_js -->
    <link rel="stylesheet" href="../templates/lib/smoke/themes/gebo.css" />


    <script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>




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
                            表单管理
                        </li>
                        <li>表单数据录入</li>
                    </ul>
                </div>
            </nav>

            <!--  20171227 以为菜单功能的屏蔽无关信息 -->
            <?php if($_GET["t"]!="smartForm") { ?>
            <h3 class="heading"> 表单数据录入 <span style="font-size: small;"><i class="icon-filter"></i>[信息录入]</span></h3>
            <form action="" class="form-horizontal well"  name="depthSearch" id="depthSearch"  method="get" >
                <fieldset>
                    <p class="f_legend">选择表单</p>
                    <div class="control-group">
                        <label class="control-label">表单名称：</label>
                        <div class="controls">
                            <?php echo get_section("templateSign",$templateSignNameAry,$templateSign,'',"templateSign",'onchange="downloadDataTemplate(this.options[this.options.selectedIndex].value)"');?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <!--                            <input name="submit2" onclick="doDataAction();" class="btn-success" type="button"  class="btn" value="下载批量导入模板" />-->
                            <a id="downloadTemplateLink" name="downloadTemplateLink" onclick="alert('高级企业版开放该功能!');" target="_blank"><input class="btn-success" type="button"  class="btn" value="下载批量导入模板" /></a>
                            <button class="btn" type="submit"><?php echo L("提交");?></button>

                            <!-- 用户预览后可以将功能加入到菜单中 -->
                            <?php if(!empty($_GET["templateSign"])) { ?>
                            <a href="../system/add_menu.php?templateSign=<?php echo $_GET["templateSign"];?>"><input class="btn btn-info" type="button"  value="+加入菜单" /></a>
                            <!--
                            <a href="./excelBI.php?templateDel=1&templateSign=<?php echo $_GET["templateSign"];?>"><input class="btn btn-danger" type="button" value="删除模板" /></a>
                            -->
                            <a href="javascript:void(0)" class="del_confirm" title="Delete" id="<?php echo $_GET["templateSign"];?>"><input class="btn btn-danger" type="button" value="删除模板" /></a>

                            <?php } ?>

                        </div>
                    </div>
                </fieldset>
            </form>
            <?php } ?>

            <form action="" name="FormPageToAdd" id="FormPageToAdd" enctype="multipart/form-data" method="post" class="form-horizontal">

                <div class="row-fluid">
                    <div class="span12">

                        <!--  20171227 以为菜单功能的屏蔽无关信息 -->
                        <?php if($_GET["t"]!="smartForm") { ?>
                        <div class="heading clearfix">
                            <h3 class="pull-left">EXCEL模板数据录入</h3>
                            <span class="pull-right label label-important">VERSION 1.0.1</span>

                            <!--
                            <a href="../system/add_menu.php?templateSign=<?php echo $_GET["templateSign"];?>"><input class="btn-info btn-mini" type="button"  class="btn" value="+加入菜单" /></a>
                            -->

                        </div>
                        <?php } ?>

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
 for($i=0;$i<count($dataAry);$i++) { echo "<tr>"; for($j=0;$j<count($dataAry[$i]);$j++) { $isNeed = ($dataAry[$i][$j]["isNeed"] == '1') ? " <span class=\"f_req\">*</span>" : ""; $value = ($_GET["id"] > 0) ? $data[$dataAry[$i][$j]["param"]] : $dataAry[$i][$j]['propertyInfo']['defaultValue']; if(in_array($dataAry[$i][$j]["type"],array("file","image"))) { $value = json_decode($value,true); } if($dataAry[$i][$j]["type"]!= 'title') { echo "<td>".$dataAry[$i][$j]["name"].$isNeed."</td>"; if(count($dataAry[$i]) == 1) { echo "<td colspan='".($maxCountNum-1)."'>"; if($dataAry[$i][$j]["type"] == "text") { echo "<input type=\"text\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" value=\"".$value."\" />"; } elseif($dataAry[$i][$j]["type"] == "time") { echo "<div class=\"input-append date form_time\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                                                                <input size=\"16\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" type=\"text\" value=\"".$value."\" readonly>
                                                                <span class=\"add-on\"><i class=\"icon-remove\"></i></span>
                                                                <span class=\"add-on\"><i class=\"icon-th\"></i></span>
                                                            </div>"; } elseif($dataAry[$i][$j]["type"] == "date") { echo "<input  size=\"16\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" type=\"text\" value=\"".$value."\" readonly class=\"form_date\">"; } elseif($dataAry[$i][$j]["type"] == "datetime") { echo "<input size=\"16\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" type=\"text\" value=\"".$value."\" readonly class=\"form_datetime\">"; } elseif($dataAry[$i][$j]["type"] == "textarea") { echo "<textarea name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\" class=\"auto_expand span12\" cols=\"1\" rows=\"4\" class=\"span12\">".$value."</textarea>"; } elseif($dataAry[$i][$j]["type"] == "textarea-plugin") { echo "<textarea name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\"  cols=\"60\" rows=\"10\" style=\"height:100%;width:90%;\" >".$value."</textarea>"; echo '<script language="javascript">
                                                            //激活ueditor
                                                            window.UEDITOR_HOME_URL = "/bpm/admin/js/";
                                                            var editor = new UE.ui.Editor();
                                                            editor.render("' . $dataAry[$i][$j]["param"] . '");
                                                        </script>'; } elseif($dataAry[$i][$j]["type"] == "file") { echo "<div data-fileupload=\"file\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                        <div class=\"input-append\">
                                                            <div class=\"uneditable-input span2\">
                                                                <i class=\"icon-file fileupload-exists\"></i>
                                                                <span class=\"fileupload-preview\"></span>
                                                            </div>
                                                            <span class=\"btn btn-file\">
                                                                <span class=\"fileupload-new\">上传</span>
                                                                <span class=\"fileupload-exists\">更改</span>
                                                                <input type=\"file\" name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\" />
                                                            </span>
                                                            <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                        </div>
                                                    </div>"; echo "<input type=\"hidden\" id=\"".$dataAry[$i][$j]["param"]."@\" name=\"".$dataAry[$i][$j]["param"]."@\" value=\"".$value["fileName"]."@@".$value["path"]."\" /> &nbsp;"; echo "<a href=\"".DAEM_PATH.$value["path"]."\">".$value["fileName"]."</a>"; } elseif($dataAry[$i][$j]["type"] == "image") { echo "<div data-fileupload=\"image\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                                <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\"></div>
                                                                <div>
                                                                    <span class=\"btn btn-file\">
                                                                        <span class=\"fileupload-new\">图片上传</span>
                                                                        <span class=\"fileupload-exists\">更改</span>
                                                                        <input type=\"file\" name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\" />
                                                                    </span>
                                                                    <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                                </div>
                                                            </div>"; if(!empty($value["fileName"])) { echo "<input type=\"hidden\" id=\"".$dataAry[$i][$j]["param"]."@\" name=\"".$dataAry[$i][$j]["param"]."@\" value=\"".$value["fileName"]."@@".$value["path"]."\" /> &nbsp;"; echo "<div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                <a href=\"".DAEM_PATH.$value["path"]."\" title=\"".$value["fileName"]."\" class=\"cbox_single\">
                                                                <img alt=\"\" src=\"".DAEM_PATH.$value["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                </div>"; } } elseif($dataAry[$i][$j]["type"] == "select") { get_section($dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"] ,$value,$ary_first=array(''),$dataAry[$i][$j]["param"],'','',$etc="data-placeholder=\"请选择...\" "); } elseif($dataAry[$i][$j]["type"] == "checkbox") { get_checkbox($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"],$value,''); } elseif($dataAry[$i][$j]["type"] == "radio") { get_radio($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"],$value,''); } echo "</td>"; } else { echo "<td>"; if($dataAry[$i][$j]["type"] == "text") { echo "<input type=\"text\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" value=\"".$value."\" />"; } elseif($dataAry[$i][$j]["type"] == "time") { echo "<div class=\"input-append date form_time\" data-date=\"\" data-date-format=\"hh:ii\" data-link-field=\"dtp_input3\" data-link-format=\"hh:ii\">
                                                            <input size=\"16\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" type=\"text\" value=\"".$value."\" readonly>
                                                            <span class=\"add-on\"><i class=\"icon-remove\"></i></span>
                                                            <span class=\"add-on\"><i class=\"icon-th\"></i></span>
                                                        </div>"; } elseif($dataAry[$i][$j]["type"] == "date") { echo "<input size=\"16\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" type=\"text\" value=\"".$value."\" readonly class=\"form_date\">"; } elseif($dataAry[$i][$j]["type"] == "datetime") { echo "<input size=\"16\" id=\"".$dataAry[$i][$j]["param"]."\" name=\"".$dataAry[$i][$j]["param"]."\" type=\"text\" value=\"".$value."\" readonly class=\"form_datetime\">"; } elseif($dataAry[$i][$j]["type"] == "textarea") { echo "<textarea name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\" class=\"auto_expand span12\" cols=\"1\" rows=\"4\" class=\"span12\">".$value."</textarea>"; } elseif($dataAry[$i][$j]["type"] == "textarea-plugin") { echo "<textarea name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\"  class=\"span5\">".$value."</textarea>"; echo '<script language="javascript">
                                                            //激活ueditor
                                                            window.UEDITOR_HOME_URL = "/bpm/admin/js/";
                                                            var editor = new UE.ui.Editor();
                                                            editor.render("'.$dataAry[$i][$j]["param"].'");
                                                        </script>'; } elseif($dataAry[$i][$j]["type"] == "file") { echo "<div data-fileupload=\"file\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                        <div class=\"input-append\">
                                                            <div class=\"uneditable-input span2\">
                                                                <i class=\"icon-file fileupload-exists\"></i>
                                                                <span class=\"fileupload-preview\"></span>
                                                            </div>
                                                            <span class=\"btn btn-file\">
                                                                <span class=\"fileupload-new\">上传</span>
                                                                <span class=\"fileupload-exists\">更改</span>
                                                                <input type=\"file\" name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\" />
                                                            </span>
                                                            <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                        </div>
                                                    </div>"; echo "<input type=\"hidden\" id=\"".$dataAry[$i][$j]["param"]."@\" name=\"".$dataAry[$i][$j]["param"]."@\" value=\"".$value["fileName"]."@@".$value["path"]."\" />"; echo "<a href=\"".DAEM_PATH.$value["path"]."\">".$value["fileName"]."</a>"; } elseif($dataAry[$i][$j]["type"] == "image") { echo "<div data-fileupload=\"image\" class=\"fileupload fileupload-new\"><input type=\"hidden\" />
                                                                <div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\"></div>
                                                                <div>
                                                                    <span class=\"btn btn-file\">
                                                                        <span class=\"fileupload-new\">图片上传</span>
                                                                        <span class=\"fileupload-exists\">更改</span>
                                                                        <input type=\"file\" name=\"".$dataAry[$i][$j]["param"]."\" id=\"".$dataAry[$i][$j]["param"]."\" />
                                                                    </span>
                                                                    <a data-dismiss=\"fileupload\" class=\"btn fileupload-exists\" href=\"#\">移除</a>
                                                                </div>
                                                            </div>"; if(!empty($value["fileName"])) { echo "<input type=\"hidden\" id=\"".$dataAry[$i][$j]["param"]."@\" name=\"".$dataAry[$i][$j]["param"]."@\" value=\"".$value["fileName"]."@@".$value["path"]."\" /> &nbsp;"; echo "<div style=\"width: 200px; height: 150px; line-height: 150px;\" class=\"fileupload-preview thumbnail\">
                                                                <a href=\"".DAEM_PATH.$value["path"]."\" title=\"".$value["fileName"]."\" class=\"cbox_single\">
                                                                <img alt=\"\" src=\"".DAEM_PATH.$value["path"]."\" style=\"height:150px;width:200px\"></a>
                                                                </div>"; } } elseif($dataAry[$i][$j]["type"] == "select") { get_section($dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"] ,$value,$ary_first=array(''),$dataAry[$i][$j]["param"],'','',$etc='data-placeholder="请选择..."'); } elseif($dataAry[$i][$j]["type"] == "checkbox") { get_checkbox($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"],$value,''); } elseif($dataAry[$i][$j]["type"] == "radio") { get_radio($dataAry[$i][$j]["param"],$dataAry[$i][$j]["param"],$dataAry[$i][$j]["formElementDataAry"],$value,''); } echo "</td>"; } } else { echo "<td colspan='".$maxCountNum."' style='text-align:center;font-size:18px;font-weight:600'>".$dataAry[$i][$j]["name"]."</td>"; } } echo "</tr>"; } ?>

                        </table>

                        <div class="control-group">
                            <div class="controls" style="float: right;">
                                <input id="act" name="act" type="hidden" value="<?php echo $act;?>" />
                                <input name="submit2" class="btn-success" type="button" onclick="submit_template();" class="btn" value="<?php echo $actName;?>" />
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
    <?php include "../sidebar.php"?>
    <!-- 左侧菜单导航栏 sidebar end -->

    <!-- 尾部js加载 footer start -->
    <?php include "../templates/footer.html.php"?>
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


    <!-- smoke_js -->
    <script src="../templates/lib/smoke/smoke.js"></script>
    <!-- notifications functions -->
    <script src="../templates/js/gebo_notifications.js"></script>


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

            /*
            var title = $("#title").val();
            if(trim(title) == '') {
                alert("请输入标题");
                $('#title').focus();
                return false;
            }
            */

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


        /* 删除记录确认 */
        $('.del_confirm').click(function(e){
            var templateSign=$(this).attr("id");
//            alert(templateSign);return;
            delconfirm(templateSign);
            e.preventDefault();
        });
        function delconfirm(templateSign){
            smoke.confirm('<?php echo L("删除表单模板将同时删除关联的表记录信息，该表单关联的流程或将无法使用，是否确认删除?");?>',function(e){
                if (e){
                    //回调处理，执行跳转动作
                    //smoke.alert('"yeah it is" pressed', {ok:"close"});
                    window.location.href="excelBI.php?templateDel=1&templateSign="+templateSign
                }else{
                    //smoke.alert('"no way" pressed', {ok:"close"});
                }
            }, {ok:"确认", cancel:"取消"});
        }


        <!-- 控制textarea自动高度 -->
        $(document).ready(function() {
            $('.auto_expand').autosize();
        });

    </script>

</div>
</body>
</html>
