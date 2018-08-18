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
                    <table class="table table-striped table-bordered mediaTable" id="dt_d">
                        <thead>
                        <tr>
                            <th class="optional">{L("ID")}</th>
                            <th class="optional">{L("模板ID")}</th>
                            <th class="essential persist">{L("模板名")}</th>
                            <th class="optional">{L("出口")}</th>
                            <th class="optional">{L("证书")}</th>

                            <th class="optional">{L("产品种类")}</th>
                            <th class="essential">{L("类型")}</th>

                            {if $type == "inner"}
                            <th class="essential">{L("制冷剂")}</th>
                            {/if}

                            <th class="essential">{L("模板类型")}</th>
                            <th class="optional" style="width: 70px;">{L("参数列表")}</th>
                            <th class="essential">{L("CDR文件")}</th>

                            <th class="optional">{L("创建者")}</th>
                            <th class="essential">{L("创建时间")}</th>
                            <th class="essential">{L("审核人")}</th>
                            <th class="essential">{L("审核状态")}</th>
                            <th class="essential">{L("审核日期")}</th>

<!--                            <th class="essential">{L("模板状态")}</th>-->

                            <th class="essential">{L("操作")}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {loop $dataAry $key=>$val}
                        <tr>
                            <td>{$val['ID']}</td>
                            <td>{$val['templateId']}</td>
                            <td>{$val['templateName']}</td>
                            <td>{$val['outboard']}</td>
                            <td>{$val['certificate']}</td>

                            <td>{$val['productCatalog']}</td>
                            <td>{$val['catalog']}</td>

                            {if $type == "inner"}
                            <td>{$val['coolType']}</td>
                            {/if}

                            <td>{$val['TemplateCatalog']}</td>
                            <td class="stringIntoSection_{$key}">{$val['paramName']}</td>
<!--                            <td><a href="{$val['filePath']}" style="color:blue;">{$val['fileName']}</a></td>-->
                            <td><a href="{$val['filePath']}" style="color:blue;">点击下载</a></td>

<!--                            <td>{$userAry[$val['builder']]}</td>-->
                            <td>
                                {if $val["builder"]==$_SESSION['UserName']}
                                <font style="color:#ffffff;font-weight:bold;background:#507AAA;">
                                    {$userAry[$val["builder"]]}
                                </font>
                                {else}
                                    {$userAry[$val["builder"]]}
                                {/if}
                            </td>

                            <td>{date('Y-m-d',strtotime($val['createDateTime']))}</td>
                            <td>
                                {if $val["approver"]==$_SESSION['UserName']}
                                <font style="color:#ffffff;font-weight:bold;background:#507AAA;">
                                    {$userAry[$val["approver"]]}
                                </font>
                                {else}
                                    {$userAry[$val["approver"]]}
                                {/if}
                            </td>

<!--                            <td>{$TaskApproveStatusConfigAry[$val['approverStatus']]}</td>-->
                            <td><font style="color:#ffffff;font-weight:bold;background:{$taskStatusBgColor[$val['approverStatus']]};">{$TaskApproveStatusConfigAry[$val['approverStatus']]}</font></td>

                            <td>{$val['approverDateTime']}</td>

<!--                            <td><font style="color:#ffffff;font-weight:bold;background:{$taskStatusBgColor[$val['status']]};">{$TaskStatusConfigAry[$val['status']]}</font></td>-->

                            <td>
                            {if ($val['approverStatus'] <= '0' || $val['approverStatus'] == '')}
                                {if $val["builder"] == $_SESSION["UserName"]}
                                <a href="#" class="tablelink" onclick="approve_update('{$val["ID"]}');">修改</a> |
                                {/if}

                                {if $val["approver"] == $_SESSION["UserName"]}
                                <a href="#" class="tablelink" onclick="approve_success('{$val["ID"]}');">通过</a> |
                                <a href="#" class="tablelink" onclick="approve_failed('{$val["ID"]}');"> 驳回</a> |
                                {/if}

                                {if $val["builder"] == $_SESSION["UserName"]}
                                <a href="#" class="tablelink" onclick="approve_delete('{$val["ID"]}');">删除</a>
                                {/if}
                            {else}
                                <a href="#" class="tablelink" onclick="approve_update('{$val["ID"]}');" style="color:green;font-weight:bold;">[下发新模板]</a>
                            {/if}
                            </td>


                        </tr>
                        {/loop}
                        </tbody>
                    </table>
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
        });

        //字符串根据某些字符分割成数组,数组转换成下拉框
        function stringSplitIntoSection(inputString,char){
            var inputStringtoAry = inputString.split(char);
            var OutPutHtml = "<select class=\"select\" style=\"width:118px;\">";
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
                $(".stringIntoSection_"+k).html(stringSplitIntoSection(inputString,","));
            }
        }

        //是否通过审批，并下发任务版本
        function approve_success(id){
            cs = "{L('是否通过模板：')} "+id+" ?";
            if(confirm(cs))
                window.location = 'templateAjaxApi.php?type={$type}&ID='+id+'&act=approve&approverStatus=1';
        }

        //是否驳回审批
        function approve_failed(id){
            cs = "{L('是否驳回模板：')} "+id+" ?";
            if(confirm(cs))
                window.location = 'templateAjaxApi.php?type={$type}&ID='+id+'&act=approve&approverStatus=2';
        }

        //是否删除任务
        function approve_delete(id){
            cs = "{L('是否删除模板：')} "+id+" ?";
            if(confirm(cs))
                window.location = 'templateAjaxApi.php?type={$type}&ID='+id+'&act=approve&approverStatus=3';
        }

        //是否修改任务
        function approve_update(id){
            cs = "{L('是否修改模板：')} "+id+" ? 对应的审核流程将重新提交！";
            if(confirm(cs))
                window.location = 'addTemplate.php?type={$type}&ID='+id;
        }

    </script>

</div>
</body>
</html>
