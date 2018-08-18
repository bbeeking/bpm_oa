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

            <form name="FormPageToAdd" id="FormPageToAdd" enctype="multipart/form-data" method="post" class="form-horizontal" onsubmit="return chksubmit();">

                <div class="row-fluid">
                    <div class="span12">
                        <h3 class="heading">{if $userid>0}{L("修改任务")}{else}{L("添加任务")}{/if}</h3>
                        <div class="row-fluid">

                            <fieldset>

                                <table class="table table-striped table-bordered mediaTable">
                                    <tr>
<!--                                        <td colspan="2"></td>-->
                                        <td>出口地<span class="f_req">*</span></td>
<!--                                        <td><input name="outboard" id="outboard" type="text" class="dfinput" value="" onchange="get_PDM_param_values();" /></td>-->
                                        <td>
<!--                                            {get_section('outboard',$outboardConfigAry,$result['outboard'],$ary_first=array(0=>L("请选择")),'outboard','onchange="get_PDM_param_values();"')}-->
                                            {if $type == "inner"}
                                                <input name="outboard" id="outboard" type="text" class="dfinput" value="内销" readonly="readonly" />
                                            {else}
                                                {get_section('outboard',$outboardConfigAry,$result['outboard'],$ary_first=array(0=>L("请选择")),'outboard')}
                                            {/if}
                                        </td>

                                        <td>项目号<span class="f_req">*</span></td>
                                        <td><input name="projectId" type="text" class="dfinput" value="" /></td>
                                    </tr>

                                    <tr>
                                        <td>成品码<span class="f_req">*</span></td>
                                        <td><input name="productCodeId" type="text" class="dfinput productCodeId" value="" onchange="get_PDM_param_values();" /></td>

                                        <td>开发任务单</td>
                                        <td><input name="file" type="file" value="上传" /></td>
                                    </tr>

                                    <tr>
                                        <td>类型<span class="f_req">*</span></td>
                                        <td>{get_section('catalog',$productBasicTypeAry,$result['catalog'],$ary_first=array(0=>L("请选择")),'catalog','onchange="get_PDM_param_values();"')}</td>
<!--                                        <td></td>-->
<!--                                        <td></td>-->

                                        {if $type == "inner"}
                                        <td>制冷剂<span class="f_req">*</span></td>
                                        <td>{get_section('coolType',$coolTypeConfigAry,$result['coolType'],$ary_first=array(0=>L("请选择")),'coolType')}</td>
                                        {else}
                                        <td></td>
                                        <td></td>
                                        {/if}
                                    </tr>


                                    <tr>
                                        <td colspan="2" style="text-align: center;background-color: #fcefa1;font-size:18px;font-weight:600">内机</td>
                                        <td colspan="2" style="text-align: center;background-color: #1d62ab;font-size:18px;font-weight:600" >外机</td>
                                    </tr>

                                    <tr>
                                        <td>产品型号<span class="f_req">*</span></td>
                                        <td><input name="innerProductModel" type="text" class="dfinput" value="" /></td>

                                        <td>产品型号<span class="f_req">*</span></td>
                                        <td><input name="outerProductModel" type="text" class="dfinput" value="" /></td>
                                    </tr>

                                    <tr>
                                        <td>产品种类<span class="f_req">*</span></td>
                                        <td>{get_section('innerProductCatalog',$productCatalogConfigAry,$result['innerProductCatalog'],$ary_first=array(0=>L("请选择")),'innerProductCatalog','onchange="get_PDM_param_values();"')}</td>
                                        <!--
                                        <td><select class="select2" name="innerProductCatalog" id="innerProductCatalog" onchange="get_PDM_param_values();">
                                                <option></option>
                                                <option>分体内机</option>
                                                <option>分体外机</option>
                                                <option>窗机</option>
                                                <option>移动机</option>
                                                <option>除湿机</option>
                                                <option>柜内机</option>
                                                <option>柜外机</option>
                                            </select>
                                        </td>
                                        -->

                                        <td>产品种类<span class="f_req">*</span></td>
                                        <td>{get_section('outerProductCatalog',$productCatalogConfigAry,$result['outerProductCatalog'],$ary_first=array(0=>L("请选择")),'outerProductCatalog','onchange="get_PDM_param_values();"')}</td>
                                        <!--
                                        <td><select class="select2" name="outerProductCatalog" id="outerProductCatalog" onchange="get_PDM_param_values();">
                                                <option></option>
                                                <option>分体内机</option>
                                                <option>分体外机</option>
                                                <option>窗机</option>
                                                <option>移动机</option>
                                                <option>除湿机</option>
                                                <option>柜内机</option>
                                                <option>柜外机</option>
                                            </select>
                                        </td>
                                        -->

                                    </tr>

                                    <!--
                                    <tr>
                                        <td>类型<span class="f_req">*</span></td>
                                        <td><input name="catalog" id="catalog"  type="text" class="dfinput" value="" onchange="get_PDM_param_values();" /></td>

                                        <td>类型<span class="f_req">*</span></td>
                                        <td><input name="catalog" type="text" class="dfinput" value="" onchange="get_PDM_param_values();" /></td>
                                    </tr>
                                    -->

                                    <tr>
                                        <td>印刷品种类</td>
                                        <td>
                                            <table class="table table-striped table-bordered mediaTable">
                                                <tr>
                                                    <td>铭牌 : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxInnerMP" id="checkboxInnerMP" value="" onchange="checkboxControl();" /></td>
                                                </tr>
                                                <tr>
                                                    <td>型号标记 : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxInnerTM" id="checkboxInnerTM" value="" onchange="checkboxControl();" /></td>
                                                </tr>
                                                <tr {if $type == "inner"}style="display:none;"{/if}>
                                                    <td>欧盟信息卡 : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxInnerEI" id="checkboxInnerEI" value="" onchange="checkboxControl();" /></td>
                                                </tr>
                                                <tr>
                                                    <td>{if $type == "inner"}能效标识{else}能源标签{/if} : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxInnerEL" id="checkboxInnerEL" value="" onchange="checkboxControl();" /></td>
                                                </tr>

                                                <tr {if $type != "inner"}style="display:none;"{/if}>
                                                    <td>说明书参数页 : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxParamManual" id="checkboxParamManual" value="" onchange="checkboxControl();" /></td>
                                                </tr>

                                            </table>
                                        </td>

                                        <td>印刷品种类</td>
                                        <td>
                                            <table class="table table-striped table-bordered mediaTable">
                                                <tr>
                                                    <td>铭牌 : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxOuterMP" id="checkboxOuterMP" value="" onchange="checkboxControl();" /></td>
                                                </tr>
                                                <tr>
                                                    <td>型号标记 : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxOuterTM" id="checkboxOuterTM" value="" onchange="checkboxControl();" /></td>
                                                </tr>
                                                <tr {if $type == "inner"}style="display:none;"{/if}>
                                                    <td>{if $type == "inner"}能效标识{else}能源标签{/if} : </td>
                                                    <td><input type="text" class="dfinput" style="width:120px;margin-bottom:8px;" name="checkboxOuterEL" id="checkboxOuterEL" value="" onchange="checkboxControl();" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>认证类型<span class="f_req">*</span></td>
                                        <td>
<!--                                            {get_section('certificationType',$certificateConfigAry,$result['certificationType'],$ary_first=array(0=>L("请选择")),'certificationType','onchange="get_PDM_param_values();"')}-->
                                            {if $type == "inner"}
                                            <input name="certificationType" id="certificationType" type="text" class="dfinput" value="3C" readonly="readonly" />
                                            {else}
                                            {get_section('certificationType',$certificateConfigAry,$result['certificationType'],$ary_first=array(0=>L("请选择")),'certificationType')}
                                            {/if}
                                        </td>

                                        <td></td>
                                        <td></td>

                                    </tr>

                                    <tr>
                                        <td>评审类型<span class="f_req">*</span></td>
                                        <td>
                                            {get_section('approveType',$TemplateApproveConfigAry,$result['approveType'],$ary_first=array(0=>L("请选择")),'approveType','onchange="get_PDM_param_values();"')}
                                            <!--
                                            <select class="select2 approveType" name="approveType" onchange="get_PDM_param_values();">
                                                <option value="approve">评审</option>
                                                <option value="noneApprove">免评审</option>
                                            </select>
                                            -->
                                        </td>

                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>基础机型成品码<span class="f_req">*</span></td>
                                        <td><input name="basicProductCode" type="text" class="dfinput basicProductCode" value="" onchange="get_PDM_param_values();"/></td>

                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>能效等级<span class="f_req">*</span></td>
                                        <td>
<!--                                            <input name="eer" type="text" class="dfinput" value="" />-->
                                            {if $type == "inner"}
                                                {get_section('eer',$eerCongfigAry,$result['eer'],$ary_first=array(0=>L("请选择")),'eer')}
                                            {else}
                                                <input name="eer" type="text" class="dfinput" value="" />
                                            {/if}
                                        </td>

                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td>面板颜色<span class="f_req">*</span></td>
                                        <td><input name="panelColor" type="text" class="dfinput" value="" /></td>

                                        <td>面板体颜色<span class="f_req">*</span></td>
                                        <td><input name="panelInnerColor" type="text" class="dfinput" value="" /></td>
                                    </tr>

                                    <tr>
                                        <td>其他印刷品交接单</td>
                                        <td><input name="file2" type="file" value="上传" /></td>

                                        <td>审批人<span class="f_req">*</span></td>
                                        <td>{get_section('approver',$userAllowAry,$approver,$ary_first=array(''),'approver')}</td>
                                        <!--
                                        <td>
                                            <select class="select2" name="approver">
                                                <option>小明</option>
                                                <option>小红</option>
                                                <option>小李</option>
                                            </select>
                                        </td>
                                        -->
                                    </tr>

                                    <tr>
                                        <td colspan="2" style="background-color:orange;">
                                            <table name="ajaxParamForm" id="ajaxParamForm" class="table table-striped table-bordered mediaTable">
                                                <tr>
                                                    <td>未能找到模板关联字段!请重新选择参数或添加模板!</td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                                <div class="control-group">
                                    <div class="controls" style="float: right">
                                        <input id="innerTemplateId" name="innerTemplateId" type="hidden" value="" />
                                        <input id="outerTemplateId" name="outerTemplateId" type="hidden" value="" />
                                        <input id="TemplateIdString" name="TemplateIdString" type="hidden" value="" />

                                        <input id="counterI" name="countI" type="hidden" value=""/>
                                        <input id="paramReturnStr" name="paramReturnStr" type="hidden" value="" />
                                        <input id="paramIntoDatabaseStr" name="paramIntoDatabaseStr" type="hidden" value="" />
                                        <input id="pdmReturnValue" name="pdmReturnValue" type="hidden" value="" />

                                        <input id="checkboxParamString" name="checkboxParamString" type="hidden" value="" />
                                        <input id="checkboxValueString" name="checkboxValueString" type="hidden" value="" />

<!--                                        <input name="" type="button" class="btn-inverse" value="test" onclick="get_template_param();" />-->
                                        <input name="Submit" type="submit" class="btn-success" value="提交审批" />
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

        //定义模板类型参数
        var SystemTemplateTypeArray = {
            "checkboxInnerMP": "铭牌",
            "checkboxInnerTM": "型号标记",
            "checkboxInnerEI": "欧盟信息卡",
            "checkboxInnerEL": "能源标签",
            "checkboxOuterMP": "铭牌",
            "checkboxOuterTM": "型号标记",
            "checkboxOuterEL": "能源标签",
            "checkboxParamManual" : "说明书参数页"
        };

        //模板库中取得参数
        function get_template_param(pdmReturnValue) {
            var outboard = $("#outboard").val();
            var innerProductCatalog = $("#innerProductCatalog").val();
            var outerProductCatalog = $("#outerProductCatalog").val();
            var certificationType = $("#certificationType").val();
            var catalog = $("#catalog").val();
            var coolType = $("#coolType").val();


//            alert(outboard + "__" + innerProductCatalog + "__" + outerProductCatalog + "__" + certificationType);


            if (innerProductCatalog != '' || outerProductCatalog != '') {
                if (outboard != '' && certificationType != '无' && certificationType != '' && catalog != '' {if $type == "inner"} && coolType != '' {/if})
                {
                    //获取模板的id json格式字符串
                    get_IO_templateId();
                    //get_PDM_param_values();
                    $.ajax({
                        type: "post",
//                        url: "@Url.Action("_PartialPageTemplatesParamAjax", "Template")",
                        url: "../templateManage/templateAjaxApi.php?type={$type}",
                        data: { "act":"pageTemplatesParamAjax","outboard": outboard, "innerProductCatalog": innerProductCatalog, "outerProductCatalog": outerProductCatalog, "certificationType": certificationType, "catalog": catalog {if $type == "inner"} ,"coolType": coolType {/if}},
                        //dataType: "json",
                        //dataType: "HTML",
                        //dataType : "string",
                        success: function (rs) {
                            //将参数列表字符串存入到变量中，后续使用
                            $("#paramReturnStr").val(rs);

                            //字符串转换成json对象
                            //var pdmReturnValue = get_PDM_param_values();
                            //alert(pdmReturnValue);
                            //var pdmReturnValue = eval('(' + $("#pdmReturnValue").val() + ')');

                            //字符串转换成数组
                            var paramArray = rs.split(',');
                            var htmlParamString = "";
                            if (paramArray.length > 0){
                                for (var i = 0; i < paramArray.length; i++) {

                                    //@todo 出现参数填写过程中多了空格,过滤
                                    paramArray[i] = trim(paramArray[i]);

                                    //预留空值提供用户输入
                                    if (pdmReturnValue[paramArray[i]] == null || pdmReturnValue[paramArray[i]] == undefined)
                                    {
                                        //alert(pdmReturnValue[paramArray[i]]);
                                        pdmReturnValue[paramArray[i]] = "";
                                    }

//                                    alert(paramArray[i]);
                                    /*
                                    htmlParamString += "<table>\
                                                                <tr>\
                                                                    <td>\
                                                                        <ul class=\"forminfo\">\
                                                                            <li>\
                                                                                <label>" + paramArray[i] + "<b>*</b></label>\
                                                                                <input name=\"param" + i + "\" id=\"param" + i + "\" type=\"text\" class=\"dfinput\" value=\"" + pdmReturnValue[paramArray[i]] + "\" onchange=\"get_param_data_info_string();\" />\
                                                                            </li>\
                                                                        </ul>\
                                                                    </td>\
                                                                </tr>\
                                                            </table>";
                                                            */

                                    htmlParamString += "<tr>\
                                                            <td>" + paramArray[i] + "<span class=\"f_req\">*</span></td>\
                                                            <td>\
                                                                <input name=\"param" + i + "\" id=\"param" + i + "\" type=\"text\" class=\"dfinput\" value=\"" + pdmReturnValue[paramArray[i]] + "\" onchange=\"get_param_data_info_string();\" />\
                                                            </td>\
                                                        </tr>";

                                    $("#counterI").val(i);
                                }
                            }
                            else {
                                htmlParamString = "<span style=\"color:red;\">未找到任何关联的模板，请重新选择!</span>";
                            }

                            //alert(htmlParamString);
                            $('#ajaxParamForm').html(htmlParamString);
                            get_param_data_info_string();

                        },
                        error: function (XMLHttpRequest,textStatus,errorThrown) {
                            alert("获取模板参数失败! ErrorCode: " + XMLHttpRequest.status + " State: " + XMLHttpRequest.readyState + " TextStatus: " + textStatus);
                        }
                    });
                }

            }

        }


        //发送参数从pdm返回参数对应的值（测试数据结构版）
        function test_pdm_demo(paramString) {
            return '{"\u5b57\u6bb51":"ziduan1","\u5b57\u6bb5\u4e8c":"ziduan2","\u5b57\u6bb5\u4e09":"ziduan3","\u5b57\u6bb5\u56db":"ziduan4","\u5b57\u6bb55":"ziduan5","\u7a97\u673a\u5b571":"chuangjiziduan1","\u7a97\u673a\u5b57\u6bb52":"chuangjiziduan2","\u7a97\u673a\u5b57\u6bb53":"chuangjiziduan3","\u7a97\u673a\u5b57\u6bb54":"chuangjiziduan4","\u7a97\u673a\u5b57\u6bb55":"chuangjiziduan5"}';
            //return "{\"ziduan1\":\"ziduan1\"}";
            //return "字段1:ziduan1,字段1:ziduan1,字段二:ziduan2,字段三:ziduan3,字段四:ziduan4,字段5:ziduan5,窗机字1:chuangjiziduan1,窗机字段2:chuangjiziduan2,窗机字段3:chuangjiziduan3,窗机字段4:chuangjiziduan4,窗机字段5:chuangjiziduan5";
        }

        //获取模板的ID
        function get_IO_templateId(){
            var outboard = $("#outboard").val();
            var innerProductCatalog = $("#innerProductCatalog").val();
            var outerProductCatalog = $("#outerProductCatalog").val();
            var certificationType = $("#certificationType").val();
            var catalog = $("#catalog").val();
            var coolType = $("#coolType").val();

            //alert(outboard + "__" + innerProductCatalog + "__" + outerProductCatalog + "__" + certificationType);
            //2015-12-30获取及按次序发送需要加载的印刷品种类 当前获取模板: 出口+内/外机产品种类类型+ 类型+认证+印刷品种类
            checkboxControl();
            var checkboxParamString = $("#checkboxParamString").val();

            //alert(checkboxParamString);

            if (innerProductCatalog != '' || outerProductCatalog != '') {

                if (outboard != '' && certificationType != '无' && certificationType != '' && catalog != '' && checkboxParamString != '' {if $type == "inner"} && coolType != '' {/if}) {
                    $.ajax({
                        type: "post",
//                        url: "@Url.Action("_TemplatesComeFromAjax", "Template")",
                        url: "../templateManage/templateAjaxApi.php?type={$type}",
                        data: { "act":"templatesComeFromAjax","outboard": outboard, "innerProductCatalog": innerProductCatalog, "outerProductCatalog": outerProductCatalog, "certificationType": certificationType, "catalog": catalog, "checkboxParamString": checkboxParamString {if $type == "inner"} ,"coolType": coolType {/if} },
                        success: function (rs) {
//                            alert(rs);return;

                            //字符串转换成json对象
                            var rs = eval('(' + rs + ')');
                            if (rs.status == '0')
                            {
                                alert(rs.data);
                            }
                            else
                            {
                                $("#TemplateIdString").val(rs.data)
                            }
                        },
                        error: function (XMLHttpRequest,textStatus,errorThrown) {
                            alert("获取模板ID编号失败! ErrorCode: " + XMLHttpRequest.status + " State: " + XMLHttpRequest.readyState + " TextStatus: " + textStatus);
                        }
                    });
                }

            }
        }


        //发送参数从pdm返回参数对应的值
        function get_PDM_param_values() {
            //if mianpingshen send param+basic chengpincode
            //else send param + chengpincode

            //var approveType = $("#approveType option:selected").text();
            var approveType = $("#approveType").val();
            if (approveType == "approve") {
                var productCodeId = $(".productCodeId").val();
            } else {
                var productCodeId = $(".basicProductCode").val();
            }
            //alert(productCodeId);

            if (productCodeId.length > 0){
                $.ajax({
                    type: "post",
                    synchronized:true,
//                    url: "@Url.Action("_getWindchillPDMParamValueAjax", "Template")",
                    url: "../templateManage/templateAjaxApi.php?type={$type}",
                    data: { "act":"getWindchillPDMParamValueAjax","productCodeId": productCodeId },
                    success: function (rs) {
                        var returnJson = eval('(' + rs + ')');
                        get_template_param(returnJson);

                        var decToHex = function (str) {
                            var res = [];
                            for (var i = 0; i < str.length; i++)
                                res[i] = ("00" + str.charCodeAt(i).toString(16)).slice(-4);
                            return "\\u" + res.join("\\u");
                        }
                    },
                    error: function (XMLHttpRequest,textStatus,errorThrown) {
                        alert("获取PDM模板参数值失败! ErrorCode: " + XMLHttpRequest.status + " State: " + XMLHttpRequest.readyState + " TextStatus: " + textStatus);
                    }
                });
            } else {
//                alert("获取PDM模板参数值失败:如评审状态下请填写：成品码；如免评审状态下请填写：基础成品码");
            }
        }

        //获取pdm参数及当前值
        function get_param_data_info_string(){
            var count = $("#counterI").val();
            var paramReturnStr = $("#paramReturnStr").val();
            var paramReturnAry = paramReturnStr.split(',');

            var paramDataInfoString = "";
            for(var i=0;i<=count;i++){
                if(paramReturnAry[i] == "undefined"){
                    continue;
                }
                //alert($("#param"+i).val());
                paramDataInfoString += paramReturnAry[i] + "=" + $("#param"+i).val() + ";";
            }
            $("#paramIntoDatabaseStr").val(paramDataInfoString);

        }

        //update the choice change
        function checkboxControl() {

            var checkboxInnerMP = $("#checkboxInnerMP").val();
            var checkboxInnerTM = $("#checkboxInnerTM").val();
            var checkboxInnerEI = $("#checkboxInnerEI").val();
            var checkboxInnerEL = $("#checkboxInnerEL").val();

            var checkboxOuterMP = $("#checkboxOuterMP").val();
            var checkboxOuterTM = $("#checkboxOuterTM").val();
            var checkboxOuterEL = $("#checkboxOuterEL").val();

            var checkboxParamManual = $("#checkboxParamManual").val();

            var checkboxParamString = checkboxValueString = "";

            if (checkboxInnerMP.length > 0) {
                checkboxParamString += "checkboxInnerMP,";
                checkboxValueString += checkboxInnerMP + ",";
            }
            if (checkboxInnerTM.length > 0) {
                checkboxParamString += "checkboxInnerTM,";
                checkboxValueString += checkboxInnerTM + ",";
            }
            if (checkboxInnerEI.length > 0) {
                checkboxParamString += "checkboxInnerEI,";
                checkboxValueString += checkboxInnerEI + ",";
            }
            if (checkboxInnerEL.length > 0) {
                checkboxParamString += "checkboxInnerEL,";
                checkboxValueString += checkboxInnerEL + ",";
            }
            if (checkboxOuterMP.length > 0) {
                checkboxParamString += "checkboxOuterMP,";
                checkboxValueString += checkboxOuterMP + ",";
            }
            if (checkboxOuterTM.length > 0) {
                checkboxParamString += "checkboxOuterTM,";
                checkboxValueString += checkboxOuterTM + ",";
            }
            if (checkboxOuterEL.length > 0) {
                checkboxParamString += "checkboxOuterEL,";
                checkboxValueString += checkboxOuterEL + ",";
            }

            if (checkboxParamManual.length > 0) {
                checkboxParamString += "checkboxParamManual,";
                checkboxValueString += checkboxParamManual + ",";
            }

            checkboxParamString = checkboxParamString.substring(0, checkboxParamString.lastIndexOf(','));
            checkboxValueString = checkboxValueString.substring(0, checkboxValueString.lastIndexOf(','));

            $("#checkboxParamString").val(checkboxParamString);
            $("#checkboxValueString").val(checkboxValueString);
            $("#_getWindchillPDMParamValueAjax").val(checkboxValueString);
            //alert(checkboxParamString + "______" + checkboxValueString);

//            check_IO_templateId();
        }


        //@todo 20160530 单独器的校验模板的ID，每次修改了就马上检查该模板是否存在 区别 get_IO_templateId()，避免了循环调用
        /*
        function check_IO_templateId(){
            var outboard = $("#outboard").val();
            var innerProductCatalog = $("#innerProductCatalog").val();
            var outerProductCatalog = $("#outerProductCatalog").val();
            var certificationType = $("#certificationType").val();
            var catalog = $("#catalog").val();
            //2015-12-30获取及按次序发送需要加载的印刷品种类 当前获取模板: 出口+内/外机产品种类类型+ 类型+认证+印刷品种类
            var checkboxParamString = $("#checkboxParamString").val();

            if (innerProductCatalog != '' || outerProductCatalog != '') {
                if (outboard != '' && certificationType != '无' && certificationType != '' && catalog != '' && checkboxParamString != '') {
                    $.ajax({
                        type: "post",
                        url: "../templateManage/templateAjaxApi.php",
                        data: { "act":"templatesComeFromAjax","outboard": outboard, "innerProductCatalog": innerProductCatalog, "outerProductCatalog": outerProductCatalog, "certificationType": certificationType, "catalog": catalog, "checkboxParamString": checkboxParamString },
                        success: function (rs) {
                            //字符串转换成json对象
                            var rs = eval('(' + rs + ')');
                            if (rs.status == '0'){
                                alert(rs.data);
                            }
                            else{
                                $("#TemplateIdString").val(rs.data)
                            }
                        },
                        error: function (XMLHttpRequest,textStatus,errorThrown) {
                            alert("获取模板ID编号失败! ErrorCode: " + XMLHttpRequest.status + " State: " + XMLHttpRequest.readyState + " TextStatus: " + textStatus);
                        }
                    });
                }
            }
        }
        */

        function chksubmit()
        {
            var outboard = $("#outboard").val();
            var innerProductCatalog = $("#innerProductCatalog").val();
            var outerProductCatalog = $("#outerProductCatalog").val();
            var certificationType = $("#certificationType").val();
            var catalog = $("#catalog").val();
            var coolType = $("#coolType").val();

            if((outboard.length <= 0 || outboard == '0') ||
                ((innerProductCatalog.length <= 0 || innerProductCatalog == '0') && (outerProductCatalog.length <= 0 || outerProductCatalog == '0')) ||
                (certificationType.length <=0 || certificationType == '0') ||

                {if $type == "inner"} (coolType.length <=0 || coolType == '0') || {/if}

                (catalog.length <=0 && catalog == '0')){
                alert("缺少参数，请检查后提交!");
                return false;
            }

            var approveType = $("#approveType").val();
            if (approveType == "approve") {
                var productCodeId = $(".productCodeId").val();
                if (productCodeId.length <= 0) {
                    $('.productCodeId').focus();
                    alert("获取PDM模板参数值失败:如评审状态下请填写：成品码；如免评审状态下请填写：基础成品码");
                    return false;
                }
            } else {
                var productCodeId = $(".basicProductCode").val();
                $('.basicProductCode').focus();
                alert("获取PDM模板参数值失败:如评审状态下请填写：成品码；如免评审状态下请填写：基础成品码");
                return false;
            }

            $('#Submit').attr("disabled","disabled");
        }
    </script>
    <!-- 脚本js控制 end -->

</div>
</body>
</html>
