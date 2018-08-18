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
    <!-- enhanced select -->
    <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />

</head>
<body class="sidebar_right ptrn_a">
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
                        <li>模板列表</li>
                    </ul>
                </div>
            </nav>

            <form action="?type={$type}&ID={$id}" name="FormPageToAdd" id="FormPageToAdd" enctype="multipart/form-data" method="post" class="form-horizontal">

                <div class="row-fluid">
                    <div class="span12">
                        <h3 class="heading">{if $userid>0}{L("修改模板")}{else}{L("添加模板")}{/if}</h3>
                        <div class="row-fluid">

                            <fieldset>
                                <div class="control-group formSep">
                                    <label for="file" class="control-label"><span class="f_req">*</span>上传CDR</label>
                                    <div class="controls">
                                        <input name="file" id="file" type="file" value="上传" />
                                        <span id="fileMsg" class="help-block" style="color:#ff0000;"></span>
                                        <span id="filePath" style="color:blue;">{$dataAry["filePath"]}</span>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="templateId" class="control-label"><span class="f_req">*</span>模板号</label>
                                    <div class="controls">
                                        <input name="templateId" id="templateId" type="text" class="dfinput" value="{$dataAry["templateId"]}" />
                                        <span id="templateIdMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="templateName" class="control-label"><span class="f_req">*</span>模板名称</label>
                                    <div class="controls">
                                        <input name="templateName" id="templateName" type="text" class="dfinput" value="{$dataAry["templateName"]}" />
                                        <span id="templateNameMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="outboard" class="control-label"><span class="f_req">*</span>出口地</label>
                                    <div class="controls">
                                        {if $type == "inner"}
                                            <input name="outboard" id="outboard" type="text" class="dfinput" value="内销" readonly="readonly" />
                                        {else}
<!--                                        <input name="outboard" id="outboard" type="text" class="dfinput" value="" />-->
                                            {get_section('outboard',$outboardConfigAry,$dataAry['outboard'],$ary_first=array(0=>L("请选择")),'outboard')}
                                        {/if}
                                        <span id="outboardMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="certificate" class="control-label"><span class="f_req">*</span>认证</label>
                                    <div class="controls">
                                        {if $type == "inner"}
                                            <input name="certificate" id="certificate" type="text" class="dfinput" value="3C" readonly="readonly" />
                                        {else}
                                            {get_section('certificate',$certificateConfigAry,$dataAry['certificate'],$ary_first=array(0=>L("请选择")),'certificate')}
                                        {/if}
                                        <span id="certificateMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="productCatalog" class="control-label"><span class="f_req">*</span>产品种类</label>
                                    <div class="controls">
                                        {get_section('productCatalog',$productCatalogConfigAry,$dataAry['productCatalog'],$ary_first=array(0=>L("请选择")),'productCatalog')}
                                        <span id="productCatalogMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="catalog" class="control-label"><span class="f_req">*</span>类型</label>
                                    <div class="controls">
<!--                                        <input name="catalog" id="catalog" type="text" class="dfinput" value="" />-->
                                        {get_section('catalog',$productBasicTypeAry,$dataAry['catalog'],$ary_first=array(0=>L("请选择")),'catalog')}
                                        <span id="catalogMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>


                                {if $type == "inner"}
                                <div class="control-group formSep">
                                    <label for="catalog" class="control-label"><span class="f_req">*</span>制冷剂选项：</label>
                                    <div class="controls">
                                        {get_section('coolType',$coolTypeConfigAry,$dataAry['coolType'],$ary_first=array(0=>L("请选择")),'coolType')}
                                        <span id="catalogMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>
                                {/if}


                                <div class="control-group formSep">
                                    <label for="TemplateCatalog" class="control-label"><span class="f_req">*</span>模板分类</label>
                                    <div class="controls">
                                        {get_section('TemplateCatalog',$TemplateCatalogConfigAry,$dataAry['TemplateCatalog'],$ary_first=array(0=>L("请选择")),'TemplateCatalog')}
                                        <span id="TemplateCatalogMsg" class="help-block" style="color:#ff0000;"></span>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="language" class="control-label"><span class="f_req">*</span>读取/填写字段</label>
                                    <div class="controls">
                                        <table id="formInfoId">
                                            <tr>
                                                <td>
                                                    <input id="param0" name="param0" type="text" class="dfinput" />
                                                    <input name="button" class="btn-info" type="button" onclick="additem('formInfoId')" value="添加" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="control-group formSep">
                                    <label for="language" class="control-label"><span class="f_req">*</span>审批人</label>
                                    <div class="controls">
                                        <td>{get_section('approver',$userAllowAry,$dataAry['approver'],$ary_first=array(''),'approver')}</td>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input id="paramName" name="paramName" type="hidden" value="" />
                                        <input name="submit1" class="btn-success" type="button" onclick="chksubmit();" class="btn" value="提交审批" />
                                        <input type="reset" name="reset1" id="reset1" class="btn-danger" value="{L("重置")}" />
                                    </div>
                                </div>
                            </fieldset>

                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>



    <!-- 左侧菜单导航栏 sidebar start -->
    {php include "../sidebar.php"}
    <!-- 左侧菜单导航栏 sidebar end -->

    <!-- 尾部js加载 footer start -->
    {php include "../templates/footer.html.php"}
    <!-- 尾部js加载 footer end -->

    <!-- bootstrap plugins -->
    <script src="../templates/js/bootstrap.plugins.min.js"></script>
    <!-- autosize textareas -->
    <script src="../templates/js/forms/jquery.autosize.min.js"></script>
    <!-- enhanced select -->
    <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
    <!-- user profile functions -->
    <script src="../templates/js/gebo_user_profile.js"></script>
    <!-- user profile functions -->
    <script src="../templates/js/pms_forms.js"></script>
    <!-- masked inputs 输入格式插件 -->
    <script src="../templates/js/forms/jquery.inputmask.min.js"></script>


    <!-- 脚本js控制 start -->

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
            //todo 过滤逗号
            //document.getElementById("paramName").value = re;
            //document.getElementById("paramName").value = re.substring(0, re.length - 1);
            $("#paramName").val(re.substring(0, re.length - 1));

            //alert(document.getElementById("paramName").value);

//            $(".FormPageToAdd").submit();
            document.FormPageToAdd.submit();
        }

        function chksubmit()
        {

            var file = $('#file').val();
            var filePath = $('#filePath').html();
            var templateId = $('#templateId').val();
            var templateName = $('#templateName').val();
            var outboard = $('#outboard').val();
            var certificate = $('#certificate').val();
            var productCatalog = $('#productCatalog').val();
            var catalog = $('catalog').val();
            var TemplateCatalog = $('TemplateCatalog').val();

//            if(trim(file) == '') {
            if(trim(file) == '' && trim(filePath) == '') {
                $('#fileMsg').html('{L("请上传模板文件！")}');
                $('#file').focus();
                return false;
            }
//            if(trim(templateId) == '') {
            if(templateId == '') {
                $('#templateIdMsg').html('{L("请输入模板号！")}');
                $('#templateId').focus();
                return false;
            }
//            if(trim(templateName) == '') {
            if(templateName == '') {
                $('#templateNameMsg').html('{L("请输入模板名称！")}');
                $('#templateName').focus();
                return false;
            }
//            if(trim(outboard) == '') {
            if(outboard == '') {
                $('#outboardMsg').html('{L("请输入出口地！")}');
                $('#outboard').focus();
                return false;
            }
//            if(trim(certificate) == '') {
            if(certificate == '') {
                $('#certificateMsg').html('{L("请输入认证！")}');
                $('#certificate').focus();
                return false;
            }
//            if(trim(productCatalog) == '') {
            if(productCatalog == '') {
                $('#productCatalogMsg').html('{L("请选择产品种类！")}');
                $('#productCatalog').focus();
                return false;
            }
//            if(trim(catalog) == '') {
            if(catalog == '') {
                $('#catalogMsg').html('{L("请输入类型！")}');
                $('#catalog').focus();
                return false;
            }
//            if(trim(productCatalog) == '') {
            if(productCatalog == '') {
                $('#TemplateCatalogMsg').html('{L("请选择模板分类！")}');
                $('#TemplateCatalog').focus();
                return false;
            }


            $('#submit1').attr('disabled','disabled');

            getsub();
        }
    </script>
    <!-- 脚本js控制 end -->

</div>
</body>
</html>
