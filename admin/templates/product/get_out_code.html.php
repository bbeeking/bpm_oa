<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    {php include "../templates/header.html.php"}
    <!-- 样式控制 header end -->
</head>
<body>
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
                            常用功能
                        </li>
                        <li>报废成品码状态</li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">
                    <div class="heading clearfix">
                        <h3 class="pull-left">报废产品列表</h3>
                        <span class="pull-right label label-important">{count($dataAry)} Orders</span>
                    </div>

                    <!--
                    <form class="form-horizontal well"   id="depthSearch"  method="get" >
                        <fieldset>
                            <p class="f_legend">日期量产检索</p>
                            <div class="control-group">
                                <label class="control-label">{L("查询日期：")}</label>
                                <div class="controls">
                                    <input type="text" id="date" name="date" value="{$_GET['date']}" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button class="btn" type="submit">{L("查询")}</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    -->

                    <table class="table table-striped table-bordered mediaTable" id="dt_d">
                        <thead>
                        <tr>
                            <th>{L("图片")}</th>
                            <th>{L("成品码")}</th>
                            <th>{L("产品型号")}</th>
                            <th>{L("部门")}</th>
                            <th>{L("专业")}</th>
                        </tr>
                        </thead>
                        <tbody>
                        {loop $dataAry $key=>$val}
                        <tr>
                            <td>
                                <a class="cbox_single cboxElement" href="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{$val['PARTNUMBER']}/400X400/{$val['PARTNUMBER']}_01.jpg" title="{$val['NAME']}" rel="gallery">
                                    <img class="thumbnail" width="40px" alt="" src="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{$val['PARTNUMBER']}/400X400/{$val['PARTNUMBER']}_01.jpg">
                                </a>
                            </td>
                            <td>{$key}</td>
                            <td><a href="detail.php?CATENTRY_ID={$val['CATENTRY_ID']}&CATENTRY_NAME={$val['NAME']}">{$val['NAME']}</a></td>
                            <td>{$defineBumnConfigAry[$outDataAry[$key]['bumn']]}</td>
                            <td>{$defineSpecConfigAry[$outDataAry[$key]['spec']]}</td>
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

    <!-- v1日期工具 -->
    <script type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>

</div>
</body>
</html>