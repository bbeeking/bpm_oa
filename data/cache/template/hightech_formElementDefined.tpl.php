<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    <?php include "../templates/header.html.php"?>
    <!-- 样式控制 header end -->

    <!-- enhanced select 控制下拉列表多选 -->
    <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />

    <!-- notifications -->
    <link rel="stylesheet" href="../templates/lib/sticky/sticky.css" />

    <!-- datepicker -->
    <link rel="stylesheet" href="../templates/lib/datepicker/datepicker.css" />
    <!-- nice form elements -->
    <link rel="stylesheet" href="../templates/lib/uniform/Aristo/uniform.aristo.css" />


    <!-- notifications -->
    <link rel="stylesheet" href="../templates/lib/sticky/sticky.css" />
    <!-- smoke_js -->
    <link rel="stylesheet" href="../templates/lib/smoke/themes/gebo.css" />




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
                        <li>FormElement Management</li>
                    </ul>
                </div>
            </nav>

            <form action="" class="form-horizontal well" enctype="multipart/form-data"  name="FormPage" id="FormPage"  method="post" >
                <fieldset>
                    <p class="f_legend"><?php echo $actName;?>元素</p>
                    <div class="control-group">
                        <label class="control-label">名称：<span class="f_req">*</span></label>
                        <div class="controls">
                            <input type="text" class="dfinput"  name="name" id="name" value="<?php echo $result["name"];?>" onchange="checkboxControl();" />
                            <span id="nameMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">元素标识（唯一）： <span class="f_req">*</span></label>
                        <div class="controls">
<!--                            <input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxParamManual" id="checkboxParamManual" value="" onchange="checkboxControl();" />-->
                            <input type="text" class="dfinput"  name="formElementSign" id="formElementSign" value="<?php echo $result["form_element_sign"];?>" <?php if($_GET["form_element_sign"]!="") { ?>readonly="readonly"<?php } ?> />
                            <span id="formElementSignMsg" class="help-block" style="color:#ff0000;"></span>
                            <font color="#ff4500">（注：用于关联表单结构）</font>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">类型：</label>
                        <div class="controls">
                            <?php echo get_section('elementType',$elementTypeConfigAry,$result['type'],$ary_first=array(''),'elementType','','',$etc='data-placeholder="请选择归属类型..."');?>
                            <span id="elementTypeMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">KV值对：</label>
                        <div class="controls">
                            <table id="formInfoId">
                                <?php if(empty($result["config_data_html"])) { ?>
                                <tr>
                                    <td>
                                        <input id="param0" name="param0" type="text" class="dfinput" />
                                        <input name="button" class="btn-info" type="button" onclick="additem('formInfoId')" value="添加" />

                                    </td>
                                </tr>
                                <?php } else { ?>
                                    <?php echo $result["config_data_html"];?>
                                <?php } ?>
                            </table>
                            <font color="#ff4500">（注：config_data，显示名称=>实际数值，对应数据的表存储，默认key=value ）</font>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">值SQL：</label><font color="#ff4500">（sql控制KV暂未开放）</font>
                        <div class="controls">
                            <textarea name="SqlString" id="SqlString" class="auto_expand span6" cols="1" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="act" id="act" value="">
                            <input id="paramName" name="paramName" type="hidden" value="" />
<!--                            <button class="btn" type="submit"><?php echo L("提交");?></button>-->
                            <input name="submit1" type="button" onclick="chksubmit();" class="btn" value="<?php echo L("提交");?>" />
                        </div>
                    </div>
                </fieldset>
            </form>

            <div class="row-fluid">
                <div class="span12">
                    <div class="heading clearfix">
                        <h3 class="pull-left">表单元素预览</h3>
                    </div>

                    <table class="table table-striped table-bordered mediaTable">
                        <?php if($result["type"] == "select") { ?>
                            <?php echo $result["name"];?>：
                            <?php echo get_section($result['form_element_sign'],$result["config_data"] ,'',$ary_first=array(''),$result['form_element_sign'],'','',$etc='data-placeholder="请选择..."');?>
                        <?php } elseif ($result["type"] == "checkbox") { ?>
                            <label><span class="error_placement"><?php echo $result["name"];?></span> <span class="f_req">*</span></label>
                            <?php echo get_checkbox($result['form_element_sign'],$result['form_element_sign'],$result["config_data"]);?>
                        <?php } elseif ($result["type"] == "radio") { ?>
                            <label><span class="error_placement"><?php echo $result["name"];?></span> <span class="f_req">*</span></label>
                            <?php echo get_radio($result['form_element_sign'],$result['form_element_sign'],$result["config_data"]);?>
                        <?php } ?>
                    </table>

                    <?php if(!empty($dataAry)) { ?>
                    <table class="table table-striped table-bordered mediaTable" id="dt_d">
                        <thead>
                            <tr>
                                <th class="optional"><?php echo L("ID");?></th>
                                <th class="optional"><?php echo L("标识");?></th>
                                <th class="essential persist"><?php echo L("名称");?></th>
                                <th class="optional"><?php echo L("预览");?></th>
                                <th class="optional"><?php echo L("创建人");?></th>
                                <th class="optional"><?php echo L("创建日期");?></th>
                                <th class="optional"><?php echo L("操作");?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($dataAry)) foreach($dataAry AS $key=>$val) { ?>
                            <tr>
                                <td><?php echo $val['id'];?></td>
                                <td><?php echo $val['form_element_sign'];?></td>
                                <td><?php echo $val['name'];?></td>
                                <td>
                                    <?php if($val["type"] == "select") { ?>
                                        <?php echo get_section($val['form_element_sign'],$val["config_data"] ,'',$ary_first=array(''),$val['form_element_sign'],'','',$etc='data-placeholder="请选择..."');?>
                                    <?php } elseif ($val["type"] == "checkbox") { ?>
                                        <?php echo get_checkbox($val['form_element_sign'],$val['form_element_sign'],$val["config_data"]);?>
                                    <?php } elseif ($val["type"] == "radio") { ?>
                                        <?php echo get_radio($val['form_element_sign'],$val['form_element_sign'],$val["config_data"]);?>
                                    <?php } ?>
                                </td>
                                <td><?php echo $val['builder'];?></td>
                                <td><?php echo date('Y-m-d H:i:s',$val['create_time']);?></td>
                                <td>
                                    <a href="./formElementDefined.php?form_element_sign=<?php echo $val['form_element_sign'];?>" title="Edit"><i class="icon-pencil"></i></a>
<!--                                    <a href="./formElementDefined.php?act=del&form_element_sign=<?php echo $val['form_element_sign'];?>" id="smoke_confirm" title="Delete"><i class="icon-trash"></i></a>-->
                                    <a href="javascript:void(0)" class="del_confirm" title="Delete" id="<?php echo $val['form_element_sign'];?>"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            
<?php } ?>

                        </tbody>
                    </table>
                    <?php } ?>
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

    <!-- smoke_js -->
    <script src="../templates/lib/smoke/smoke.js"></script>
    <!-- notifications functions -->
    <script src="../templates/js/gebo_notifications.js"></script>

    <script type="text/javascript">

        /* 删除记录确认 */
        $('.del_confirm').click(function(e){
            var elementSign=$(this).attr("id");
//            alert(elementSign);
            delconfirm(elementSign);
            e.preventDefault();
        });
        function delconfirm(elementSign){
            smoke.confirm('<?php echo L("删除所选信息");?>?',function(e){
                if (e){
                    //回调处理，执行跳转动作
                    //smoke.alert('"yeah it is" pressed', {ok:"close"});
                    window.location.href="formElementDefined.php?act=del&form_element_sign="+elementSign
                }else{
                    //smoke.alert('"no way" pressed', {ok:"close"});
                }
            }, {ok:"确认", cancel:"取消"});
        }

        var count = 1+<?php echo $count;?>;
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
