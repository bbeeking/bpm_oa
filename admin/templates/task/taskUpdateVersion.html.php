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
                    <div class="heading clearfix">
                        <h3 class="pull-left">任务下发变更校对表</h3>
                        <span class="pull-right label label-important">当前共 {$dataAryCount} 个任务在下发版本更新</span>
                    </div>

                    <!-- 循环输出单条任务的历史记录 -->
                    <form action="taskProcess.php?action=postData" name="FormPageToUpdateVersion" id="FormPageToUpdateVersion" enctype="multipart/form-data" method="post" class="form-horizontal">
                    {loop $dataAry $key=>$val}
                        <table class="table table-striped table-bordered table-condensed dt_b" id="dt_b_{$key}">
                            <thead>
                            <tr>
                                <th class="optional">ID</th>
                                <th class="optional">出口地</th>
                                <th class="optional">项目号</th>
                                <th class="optional">成品码</th>
                                <th class="optional">开发任务单</th>

                                <th class="optional">调用模板id</th>

<!--                                <th class="optional">成品码</th>-->
                                <th class="optional">产品型号</th>
                                <th class="optional">产品类型</th>
                                <th class="optional">印刷品种类</th>
                                <th class="optional">物料编码</th>


                                <th class="optional">认证类型</th>
                                <th class="optional">评审类型</th>
                                <!--
                                <th class="optional">基础机型成品码</th>
                                <th class="optional">能效等级</th>
                                <th class="optional">面板颜色</th>

                                <th class="optional">面板体颜色</th>
                                <th class="optional">印刷品交接单</th>
                                <th class="optional">创建人</th>
                                <th class="optional">创建时间</th>

                                <th class="optional">审核</th>
                                <th class="optional">审核人</th>
                                <th class="optional">审核日期</th>
                                -->
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>{$val["ID"]}</td>
                                <td>{$val["outboard"]}</td>
                                <td>{$val["projectId"]}</td>
                                <td>{$val["productCodeId"]}</td>
                                <td><a href="{$val["filePath"]}" style="color:blue;">{$val["filePath"]}</a></td>

                                <td>{$val["templateId"]}</td>

                                {if !empty($val["innerPrintedType"])}
<!--                                <td>{$val["innerProductCodeId"]}</td>-->
                                <td>{$val["innerProductModel"]}</td>
                                <td>{$val["innerProductCatalog"]}{if $val['typeOf'] == "inner"}<font color="blue">({$val['coolType']})</font>{/if}</td>
                                <td>{$SystemTemplateTypeAry[$val["innerPrintedType"]]}</td>
                                {else}
<!--                                <td>{$val["outerProductCodeId"]}</td>-->
                                <td>{$val["outerProductModel"]}</td>
                                <td>{$val["outerProductCatalog"]}{if $val['typeOf'] == "inner"}<font color="blue">({$val['coolType']})</font>{/if}</td>
                                <td>{$SystemTemplateTypeAry[$val["outerPrintedType"]]}</td>
                                {/if}

                                <td>{$val["encodingMaterial"]}</td>

                                <td>{$val["certificationType"]}</td>
                                <td>{$TemplateApproveConfigAry[$val["approveType"]]}</td>
                                <!--
                                <td>{$val["basicProductCode"]}</td>
                                <td>{$val["eer"]}</td>
                                <td>{$val["panelColor"]}</td>

                                <td>{$val["panelInnerColor"]}</td>
                                <td><a href="{$val["filePath2"]}" style="color:blue;">{$val["filePath2"]}</a></td>


                                <td>{$val["builder"]}</td>
                                <td>{$val["createDateTime"]}</td>
                                <td>{$val["approverStatus"]}</td>
                                <td>{$val["approver"]}</td>
                                <td>{$val["approverDateTime"]}</td>
                                -->

                            </tr>
                            </tbody>
                        </table>


                        <!-- 变更对照表  -->
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <th class="optional">参数</th>
                                <th class="optional" colspan="1">历史版本值</th>
                                <th class="optional" colspan="1">当前PDM值</th>
                                <th class="optional" colspan="1">下发任务参数值</th>
                            </tr>
                            </thead>

                            <tbody>
                                {loop $val["pdmNewTaskParamValueAry"] $kkk=>$vvv}
<!--                                #ffffdd-->
                                <?php
 $style = ($val["pdmHistoryTaskParamValueAry"]["$kkk"] != $vvv) ? "style=\"color:red;font-weight:bold;\"" : ""; ?>
                                <tr {$style}>
                                    <td>{$kkk}</td>
                                    <td>{$val["pdmHistoryTaskParamValueAry"]["$kkk"]}</td>
                                    <td>{$vvv}</td>
                                    <td><input type="text" name="{trim($val["encodingMaterial"])}@@{$kkk}" id="{$val["encodingMaterial"]}@@{$kkk}" value="{$val["pdmHistoryTaskParamValueAry"]["$kkk"]}" style="margin-bottom: 0px;" /></td>
                                </tr>
                                {/loop}
                            </tbody>

                        </table>

                        <div class="heading clearfix"></div>
                    {/loop}
                        <div class="control-group">
                            <div class="controls" style="float: right">
                                <input name="" type="submit" class="btn-success" value="提交审批" />
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

    <script type="text/javascript">
        $(document).ready(function () {

            /*
            $('.dt_b').dataTable({
                "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                "sScrollX": "2500px",
                "sScrollXInner": '2500px',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true
            });
            */
        });
    </script>



</div>
</body>
</html>
