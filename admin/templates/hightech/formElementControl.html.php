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

    <!-- notifications -->
    <link rel="stylesheet" href="../templates/lib/sticky/sticky.css" />
    <!-- smoke_js -->
    <link rel="stylesheet" href="../templates/lib/smoke/themes/gebo.css" />

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
                            表单管理
                        </li>
                        <li>FormElement Control</li>
                    </ul>
                </div>
            </nav>

            <form action="" class="form-horizontal well" enctype="multipart/form-data"  name="FormPage" id="FormPage"  method="post" >
                <fieldset>
                    <p class="f_legend">{$actName}元素规范</p>
                    <div class="control-group">
                        <label class="control-label">名称：<span class="f_req">*</span></label>
                        <div class="controls">
                            <input type="text" class="dfinput"  name="name" id="name" value="{$result['name']}" />
                            <span id="nameMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">规范标识（唯一）： <span class="f_req">*</span></label>
                        <div class="controls">
                            <!--                            <input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxParamManual" id="checkboxParamManual" value=""  />-->
                            <input type="text" class="dfinput"  name="elementPropertySign" id="elementPropertySign" value="{$result['element_property_sign']}" {if $_GET["element_property_sign"]!=""}readonly="readonly"{/if}  />
                            <span id="elementPropertySignMsg" class="help-block" style="color:#ff0000;"></span>
                            <font color="#ff4500">（注：用于关联表单结构）</font>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">默认值配置： </label>
                        <div class="controls">
<!--                            <input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxParamManual" id="checkboxParamManual" value=""  />-->
                            <input type="text" class="dfinput"  name="defaultValueConfig" id="defaultValueConfig" value="{$result['default_value_config']}"  />
                            <span id="defaultValueConfigMsg" class="help-block" style="color:#ff0000;"></span>
                            <font color="#ff4500">（注：直接输入内容为该字段的初始化信息，支持session，cookie，server配置，以及简单的date(),time()基础函数）</font>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">数据类型：</label>
                        <div class="controls">
                            {get_section('elementTypeOf',$elementDataTypeOfConfigAry,$result['elementTypeOf'],$ary_first=array(''),'elementTypeOf','','',$etc='data-placeholder="请选择数据类型..."')}
                            <span id="elementTypeMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">读写属性：</label>
                        <div class="controls">
                            {get_section('elementProperty',$readWriteConfigAry,$result['elementProperty'],$ary_first='default','elementProperty','','',$etc='data-placeholder="请选择操作属性..."')}
                            <span id="elementTypeMsg" class="help-block" style="color:#ff0000;"></span>
                        </div>
                    </div>
                    <!--
                    <div class="control-group">
                        <label class="control-label">KV值对：</label>
                        <div class="controls">
                            <table id="formInfoId">
                                <tr>
                                    <td>
                                        <input id="param0" name="param0" type="text" class="dfinput" />
                                        <input name="button" class="btn-info" type="button" onclick="additem('formInfoId')" value="添加" />
                                    </td>
                                </tr>
                            </table>
                            <font color="#ff4500">（注：config_data，显示名称=>实际数值，对应数据的表存储，默认key=value ）</font>
                        </div>
                    </div>
                    -->
                    <div class="control-group">
                        <label class="control-label">JS脚本校验（未开放）：</label><font color="#ff4500">（返回 1为通过 0为失败）</font>
                        <div class="controls">
                            <textarea name="JSString" id="JSString" class="auto_expand span6" cols="1" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="act" id="act" value="">
                            <input name="submit1" type="button" onclick="chksubmit();" class="btn" value="{L("提交")}" />
                        </div>
                    </div>
                </fieldset>
            </form>

            <div class="row-fluid">
                <div class="span12">
                    <div class="heading clearfix">
                        <h3 class="pull-left">表单元素预览</h3>
                    </div>


                    {if !empty($dataAry)}
                    <table class="table table-striped table-bordered mediaTable" id="dt_d">
                        <thead>
                            <tr>
                                <th class="optional">{L("ID")}</th>
                                <th class="optional">{L("标识")}</th>
                                <th class="essential persist">{L("名称")}</th>
                                <th class="optional">{L("类型/长度")}</th>
                                <th class="optional">{L("显示")}</th>
                                <th class="optional">{L("默认值配置")}</th>
                                <th class="optional">{L("输出预览(动态)")}</th>
                                <th class="optional">{L("创建人")}</th>
                                <th class="optional">{L("创建日期")}</th>
                                <th>{L("操作")}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {loop $dataAry $key=>$val}
                            <tr>
                                <td>{$val['id']}</td>
                                <td>{$val['element_property_sign']}</td>
                                <td>{$val['name']}</td>
                                <td>{$elementDataTypeOfConfigAry[$val['elementTypeOf']]}</td>
                                <td>{$readWriteConfigAry[$val['elementProperty']]}</td>
                                <td>{$val['default_value_config']}</td>
<!--                                <td>--><?php ?><!--</td>-->
<!--                                <td>--><?php ?><!--</td>-->
                                <td><?php parse_params($val['default_value_config']); ?></td>
                                <td>{$val['builder']}</td>
                                <td>{date('Y-m-d H:i:s',$val['create_time'])}</td>
                                <td>
                                    <a href="?element_property_sign={$val['element_property_sign']}" title="Edit"><i class="icon-pencil"></i></a>
                                    <a href="javascript:void(0)" class="del_confirm" title="Delete" id="{$val['element_property_sign']}"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            {/loop}
                        </tbody>
                    </table>
                    {/if}
                </div>
            </div>

        </div>
    </div>
    <!-- 主加载程序main content end -->


    <!-- 左侧菜单导航栏 sidebar start -->
    {php include "../sidebar.php"}
    <!-- 左侧菜单导航栏 sidebar end -->

    <!-- 尾部js加载 footer start -->
    {php include "../templates/footer.html.php"}
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
            var elementPropertySign=$(this).attr("id");
//            alert(elementSign);
            delconfirm(elementPropertySign);
            e.preventDefault();
        });
        function delconfirm(elementPropertySign){
            smoke.confirm('{L("删除所选信息")}?',function(e){
                if (e){
                    //回调处理，执行跳转动作
                    //smoke.alert('"yeah it is" pressed', {ok:"close"});
                    window.location.href="?act=del&element_property_sign="+elementPropertySign
                }else{
                    //smoke.alert('"no way" pressed', {ok:"close"});
                }
            }, {ok:"确认", cancel:"取消"});
        }


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
                $('#nameMsg').html('{L("请填写元素名称！")}');
                $('#name').focus();
                return false;
            }
            if(formElementSign == '') {
                $('#formElementSignMsg').html('{L("请填写元素标识！")}');
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
