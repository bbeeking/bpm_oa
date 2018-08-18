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
                            模板管理
                        </li>
                        <li>EXCEL模板信息校对</li>
                    </ul>
                </div>
            </nav>

            <form action="excelBI.php" name="FormPageToAdd" id="FormPageToAdd" enctype="multipart/form-data" method="post" class="form-horizontal">



                <div class="row-fluid">
                    <div class="span12">
                        <div class="heading clearfix">
                            <h3 class="pull-left">EXCEL模板信息校对</h3>
<!--                            <span class="pull-right label label-important"><?php echo $dataAryCount;?> Orders</span>-->
                        </div>


                        <div class="control-group">
                            <label class="control-label">标题：</label>
                            <div class="controls">
                                <input type="text" id="title" name="title" value="" /><font style="font-size: 12px;color: red;">（如果需要导入数据，请填写标题）</font>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">模板名称：</label>
                            <div class="controls">
                                <input type="text" id="templateName" name="templateName" value="<?php echo $fileName;?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">模板标识：</label>
                            <div class="controls">
                                <input type="text" id="templateSign" name="templateSign" value="<?php echo $sign;?>" /><font style="font-size: 12px;color: red;">（纯字母不含特殊字符和空格）</font>
                            </div>
                        </div>


                        <table class="table table-striped table-bordered mediaTable">
    <!--                    <table border="1px;">-->

                            <!--
                            <tr>
                                <td colspan='{$maxCountNum-1}'><input type="text" id="title" name="title" value="" /></td>
                            </tr>
                            -->

                            <?php
                            for($i=0;$i<count($dataAry);$i++)
                            {
                                echo "<tr>";
                                /* 输出字段名及值 */
                                for($j=0;$j<count($dataAry[$i]);$j++)
                                {
                                    if($dataAry[$i][$j]["type"]!= 'title')
                                    {
    //                                    echo "<td>".$dataAry[$i][$j]["name"]."<span style=\"color:green;\">&lt;".$dataAry[$i][$j]["param"]."&gt;<span></td>";
                                        echo "<td>".$dataAry[$i][$j]["name"]."</td>";
                                        //一行只有一个字段的情况下，name占用一单元格，剩下的为值
                                        if(count($dataAry[$i]) == 1)
                                        {
//                                            echo "<td colspan='".($maxCountNum-1)."'>".get_return_section($dataAry[$i][$j]["param"],$dataTypeConfigAry,$dataAry[$i][$j]["type"],'',$dataAry[$i][$j]["param"])."</td>";

                                            //触发时候的效果
                                            echo "<td colspan='".($maxCountNum-1)."'>".get_return_section($dataAry[$i][$j]["param"],$dataTypeConfigAry,$dataAry[$i][$j]["type"],'',$dataAry[$i][$j]["param"],'onchange="change_section(this.options[this.options.selectedIndex].value,\''.$dataAry[$i][$j]["param"].'_id\')"','').
                                                "&nbsp;<a onclick=\"property_section('".$dataAry[$i][$j]["param"]."_property');\">属性</a>
                                                <span style=\"display:none;\"  id=\"".$dataAry[$i][$j]["param"]."_id\">".get_return_section($dataAry[$i][$j]["param"].'_element',$formElementAry,'','',$dataAry[$i][$j]["param"].'_element','','',$etc='data-placeholder="请选择单元格标识..."')."</span>
                                                <span style=\"display:none;\"  id=\"".$dataAry[$i][$j]["param"]."_property\">".get_return_section($dataAry[$i][$j]["param"].'_element_property',$elementPropertyExtraAry,'',$ary_first=array(0=>L("请选择")),$dataAry[$i][$j]["param"].'_element_property','','',$etc='data-placeholder="请选择单元格属性..."')."</span></td>";
                                        }
                                        else
                                        {
//                                            echo "<td>".get_return_section($dataAry[$i][$j]["param"],$dataTypeConfigAry,$dataAry[$i][$j]["type"],'',$dataAry[$i][$j]["param"])."</td>";

                                            //触发时候的效果
                                            echo "<td>".get_return_section($dataAry[$i][$j]["param"],$dataTypeConfigAry,$dataAry[$i][$j]["type"],'',$dataAry[$i][$j]["param"],'onchange="change_section(this.options[this.options.selectedIndex].value,\''.$dataAry[$i][$j]["param"].'_id\')"','').
                                                "&nbsp;<a onclick=\"property_section('".$dataAry[$i][$j]["param"]."_property');\">属性</a>
                                                <span style=\"display:none;\"  id=\"".$dataAry[$i][$j]["param"]."_id\">".get_return_section($dataAry[$i][$j]["param"].'_element',$formElementAry,'','',$dataAry[$i][$j]["param"].'_element','','',$etc='data-placeholder="请选择单元格标识..."')."</span>
                                                <span style=\"display:none;\"  id=\"".$dataAry[$i][$j]["param"]."_property\">".get_return_section($dataAry[$i][$j]["param"].'_element_property',$elementPropertyExtraAry,'',$ary_first=array(0=>L("请选择")),$dataAry[$i][$j]["param"].'_element_property','','',$etc='data-placeholder="请选择单元格属性..."')."</span></td>";
                                        }

                                    }
                                    else
                                    {
    //                            echo "<td rowspan='".$maxCountNum."'>".$dataAry[$i][$j]["name"]."</td>";
                                        echo "<td colspan='".$maxCountNum."' style='text-align:center;font-size:18px;font-weight:600'>".$dataAry[$i][$j]["name"]."</td>";
                                    }
                                }
                                echo "</tr>";
                            }
                            ?>


                        </table>

                        <div class="control-group">
                            <div class="controls" style="float: right;">
                                <input id="insertData" name="insertData" type="hidden" value="0" />
                                <input id="templateEdit" name="templateEdit" type="hidden" value="1">

                                <input type="hidden" name="fileBasicPath" id="fileBasicPath" value="<?php echo $fileBasicPath;?>">
                                <input type="hidden" name="fileName" id="fileName" value="<?php echo $fileName;?>">

                                <input name="submit2" class="btn-success" type="button" onclick="submit_template();" class="btn" value="完成：仅生成模板" />
                                <input name="submit1" class="btn-info" type="button" onclick="submit_insert_data();" class="btn" value="完成：生成模板并录入数据" />
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

    <!-- autosize textareas -->
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

        var title = $("#title").val();
        if(trim(title) == '') {
            alert("请输入标题");
            $('#title').focus();
            return false;
        }

        //抑制冒泡事件防止重复提交
        $('#submit1').attr('disabled','disabled');
        $('#submit2').attr('disabled','disabled');
        $('#insertData').val("1");
        document.FormPageToAdd.submit();
    }
    function change_section(type,id){
        if(type == 'select' || type == 'radio' || type == 'checkbox'){
            document.getElementById(id).style.display = "block" ;
        }
        else{
            document.getElementById(id).style.display = "none" ;
        }
    }

        <!-- 2018-02-02 增加元素属性额外选项 -->
    function property_section(id){
        if(document.getElementById(id).style.display == "none"){
            document.getElementById(id).style.display = "block" ;
        }else{
            document.getElementById(id).style.display = "none" ;
        }
    }

    </script>

</div>
</body>
</html>
