<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    {php include "../templates/header.html.php"}
    <!-- 样式控制 header end -->
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

            <div class="row-fluid">
                <div class="span12">

                    <table class="table table-striped table-bordered" style="width: 30%;" >
                        <tbody>
                        <tr>
                            <td {if ($_GET["type"] == "" || $_GET["type"] == "outer")} class="product_onclick_td" {/if}>
                            <a href="?type=outer" {if ($_GET["type"] == "" || $_GET["type"] == "outer")} class="product_onclick_td" {/if}>
                            出口技术部 <span class="label label-success" style="float: right">未统计</span>
                            </a>
                            </td>
                            <td {if $_GET["type"] == "inner"} class="product_onclick_td" {/if}>
                            <a href="?type=inner" {if $_GET["type"] == "inner"} class="product_onclick_td" {/if}>
                            家技部 <span class="label label-success" style="float: right">未统计</span>
                            </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="heading clearfix">
                        <h3 class="pull-left">模板列表</h3>
                        <span class="pull-right label label-important">{$dataAryCount} Orders</span>
                    </div>

                    <!-- 固定配置表格字段数 -->
                    <input type="hidden" name="tableParamNum" id="tableParamNum" value="25">
<!--                    <input type="hidden" name="columnCountNum" id="columnCountNum" value="{count($paramDefineAry)}">-->

<!--                    <table class="table table-striped table-bordered table-condensed" id="dt_b">-->
<!--                    <table class="table table-striped table-bordered mediaTable" id="dt_st_log">-->
                    <table class="table table-striped table-bordered table-condensed" id="dt_st_log">
                        <thead>
                        <tr>
                            <th class="table_checkbox"><input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_st_log" /></th>
                            <th class="optional">ID</th>
                            <th class="optional">出口地</th>
                            <th class="optional">项目号</th>
                            <th class="optional">成品码</th>
                            <th class="optional">开发任务单</th>

                            <th class="optional">调用模板id</th>

                            <th class="optional">物料编码</th>
                            <th class="optional">产品型号</th>
                            <th class="optional">产品类型</th>
                            <th class="optional">印刷品种类</th>

<!--
                            <th>成品码</th>
                            <th>产品型号</th>
                            <th>产品类型</th>
                            <th>印刷品种类</th>
-->
                            <th class="optional">认证类型</th>

<!--                            {if $type == "inner"}-->
<!--                            <th class="optional">制冷剂</th>-->
<!--                            {/if}-->

                            <th class="optional">评审类型</th>
                            <th class="optional">基础机型成品码</th>
                            <th class="optional">能效等级</th>
                            <th class="optional">面板颜色</th>

                            <th class="optional">面板体颜色</th>
                            <th class="optional">印刷品交接单</th>
                            <th class="optional" style="width: 144px;">PDM参数值</th>
                            <th class="optional">创建人</th>
                            <th class="optional">创建时间</th>

                            <th class="optional">审核</th>
                            <th class="optional">审核人</th>
                            <th class="optional">审核日期</th>

                            <th class="optional">任务状态</th>

                            <th class="optional">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        {loop $dataAry $key=>$val}
                        <tr>
                            <td><input type="checkbox" name="row_sel" class="row_sel" value="{$val['ID']}" /></td>
                            <td>{$val["ID"]}</td>
                            <td>{$val["outboard"]}</td>
                            <td>{$val["projectId"]}</td>
                            <td>{$val["productCodeId"]}</td>
                            {if $val["filePath"] != '-'}
                                <td><a href="{$val["filePath"]}" style="color:blue;">点击下载</a></td>
                            {else}
                                <td><a style="color:blue;">-</a></td>
                            {/if}

                            <td>{$val["templateId"]}</td>

                            {if !empty($val["innerPrintedType"]) && $val["innerPrintedType"] != '-'}
                            <td>{$val["innerProductCodeId"]}</td>
                            <td>{$val["innerProductModel"]}</td>
                            <td>{$val["innerProductCatalog"]} {if $type == "inner"}({$val['coolType']}){/if}</td>
                            <td>{$SystemTemplateTypeAry[$val["innerPrintedType"]]}</td>
                            {else}
                            <td>{$val["outerProductCodeId"]}</td>
                            <td>{$val["outerProductModel"]}</td>
                            <td>{$val["outerProductCatalog"]} {if $type == "inner"}({$val['coolType']}){/if}</td>
                            <td>{$SystemTemplateTypeAry[$val["outerPrintedType"]]}</td>
                            {/if}

                            <td>{$val["certificationType"]}</td>

<!--                            {if $type == "inner"}-->
<!--                            <td>{$val['coolType']}</td>-->
<!--                            {/if}-->

                            <td>{$TemplateApproveConfigAry[$val["approveType"]]}</td>
                            <td>{$val["basicProductCode"]}</td>
                            <td>{$val["eer"]}</td>
                            <td>{$val["panelColor"]}</td>

                            <td>{$val["panelInnerColor"]}</td>
                            {if $val["filePath2"] != '-'}
                                <td><a href="{$val["filePath2"]}" style="color:blue;">点击下载</a></td>
                            {else}
                                <td><a style="color:blue;">-</a></td>
                            {/if}
                            <td class="stringIntoSection_{$key}" style="width: 144px;">{$val["PDMParam"]}</td>


<!--                            <td>{$userAry[$val["builder"]]}</td>-->
                            <td>
                                {if $val["builder"]==$_SESSION['UserName']}
                                <font style="color:#ffffff;font-weight:bold;background:#507AAA;">
                                    {$userAry[$val["builder"]]}
                                </font>
                                {else}
                                    {$userAry[$val["builder"]]}
                                {/if}
                            </td>
                            <td>{$val["createDateTime"]}</td>

<!--                            <td>{$TaskApproveStatusConfigAry[$val["approverStatus"]]}</td>-->
                            <td><font style="color:#ffffff;font-weight:bold;background:{$taskStatusBgColor[$val['approverStatus']]};">{$TaskApproveStatusConfigAry[$val['approverStatus']]}</font></td>

<!--                            <td>{$userAry[$val["approver"]]}</td>-->
                            <td>
                                {if $val["approver"]==$_SESSION['UserName']}
                                <font style="color:#ffffff;font-weight:bold;background:#507AAA;">
                                    {$userAry[$val["approver"]]}
                                </font>
                                {else}
                                {$userAry[$val["approver"]]}
                                {/if}
                            </td>
                            <td>{$val["approverDateTime"]}</td>

<!--                            <td>{$TaskStatusConfigAry[$val["status"]]}</td>-->
                            <td><font style="color:#ffffff;font-weight:bold;background:{$taskStatusBgColor[$val['status']]};">{$TaskStatusConfigAry[$val['status']]}</font></td>

                            <td>
                            {if ($val['approverStatus'] <= '0' || $val['approverStatus'] == '')}
                                {if $val["approver"] == $_SESSION["UserName"]}
                                <a href="#" class="tablelink" onclick="approve_success('{$val["ID"]}');">通过</a> |
                                <a href="#" class="tablelink" onclick="approve_failed('{$val["ID"]}');"> 驳回</a> |
                                {/if}

                                {if $val["builder"] == $_SESSION["UserName"]}
                                <a href="#" class="tablelink" onclick="approve_delete('{$val["ID"]}');">删除</a>
                                {/if}
                            {else}
                                -
                            {/if}
                            </td>

                        </tr>
                        {/loop}
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- hide elements (for later use) -->
            <div class="hide">
                <!-- actions for datatables -->
                <div class="dt_st_actions">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">操作 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li title="产品属性对比"><a href="#" class="deal_rows_dt" data-tableid="dt_st_log"><i class="icon-shopping-cart"></i> 下发新版本</a></li>
<!--                            <li title="加入对比栏"><a href="#" class="add_compare_dt" data-tableid="dt_st_log"><i class="icon-plus"></i> 加入对比栏</a></li>-->
<!--                            <li title="清空对比栏"><a href="#" class="trash_rows_dt" data-tableid="dt_st_log"><i class="icon-trash"></i> 清空对比栏</a></li>-->
                            <!--								<li><a href="javascript:void(0)">删除</a></li>-->
                        </ul>
                    </div>
                </div>

                <!-- confirmation box -->
                <div id="confirm_dialog" class="cbox_content">
                    <div class="sepH_c tac"><strong>将所选的任务下发新版本?</strong></div>
                    <div class="tac">
                        <a href="#" class="btn btn-gebo confirm_yes">是</a>
                        <a href="#" class="btn confirm_no">否</a>
                    </div>
                </div>

                <!-- 添加到对比篮 -->
                <div id="add_compare_dt_dialog" class="cbox_content">
                    <div class="sepH_c tac"><strong>已将所选加入到对比栏中，是否进入查看对比?</strong></div>
                    <div class="tac">
                        <a href="#" class="btn btn-gebo confirm_yes">是</a>
                        <a href="#" class="btn confirm_no">否</a>
                    </div>
                </div>

                <!-- 清空对比篮 -->
                <div id="trash_rows_dt_dialog" class="cbox_content">
                    <div class="sepH_c tac"><strong>清空对比栏?</strong></div>
                    <div class="tac">
                        <a href="#" class="btn btn-gebo confirm_yes">是</a>
                        <a href="#" class="btn confirm_no">否</a>
                    </div>
                </div>
                <!-- 清空对比篮 -->
                <div id="deal_success_dialog" class="cbox_content">
                    <div class="sepH_c tac"><strong>操作成功</strong></div>
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

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');

        $(document).ready(function () {
            ini_page();

            gebo_datatbles.dt_st_log();
        });

        //字符串根据某些字符分割成数组,数组转换成下拉框
        function stringSplitIntoSection(inputString,char){
            var inputStringtoAry = inputString.split(char);
            var OutPutHtml = "<select class=\"select\" style=\"width:138px;\">";
            for(var i=0;i<inputStringtoAry.length;i++){
                OutPutHtml += "<option>" + inputStringtoAry[i] + "</option>";
            }
            OutPutHtml += "</select>";
            return OutPutHtml;
        }

        function ini_page() {
            for(var k=0;k<{$dataAryCount};k++){
                var inputString = $(".stringIntoSection_"+k).html();
                if(inputString == null) continue;
                //alert(inputString);continue;
                $(".stringIntoSection_"+k).html(stringSplitIntoSection(inputString,";"));
            }
        }

        //是否通过审批，并下发任务版本
        function approve_success(id){
            cs = "{L('是否通过任务：')} "+id+" ?";
            if(confirm(cs))
                window.location = 'taskProcess.php?type={$type}&ID='+id+'&action=approve&approverStatus=1';
        }

        //是否驳回审批
        function approve_failed(id){
            cs = "{L('是否驳回任务：')} "+id+" ?";
            if(confirm(cs))
                window.location = 'taskProcess.php?type={$type}&ID='+id+'&action=approve&approverStatus=2';
        }

        //是否删除任务
        function approve_delete(id){
            cs = "{L('是否删除任务：')} "+id+" ?";
            if(confirm(cs))
                window.location = 'taskProcess.php?type={$type}&ID='+id+'&action=approve&approverStatus=3';
        }

    </script>

</div>
</body>
</html>
