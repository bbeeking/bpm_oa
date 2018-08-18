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
                            产品详情
                        </li>
                        <li>展示</li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12" style="margin-bottom: 30px;">
                    <h3 class="heading"> 产品详细信息 </h3>
                    <div class="span5">
                        <img class="thumbnail" src="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{check_one_pic_to_more($productInfoAry['193'])}/400X400/{check_one_pic_to_more($productInfoAry['193'])}_01.jpg" alt="" />
                    </div>
                    <div class="span5">
                        <span style="font-size:16px;font-weight: 700;">{$catentryName}{$productInfoAry['194']}_{$productInfoAry['193']}</span><br />
                        <span style="color:#c00;font-size:16px;font-weight: 700;">{$productInfoAry['195']}</span>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading"> 基本信息 </h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="optional">{L("参数")}</th>
                            <th class="optional">{L("值")}</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{L("成品码")}</td>
                            <td>{$productInfoAry['193']}</td>
                        </tr>
                        <tr>
                            <td>{L("产品型号")}</td>
                            <td>{$productInfoAry['194']}</td>
                        </tr>

                        {loop $paramDefineAry $key=>$val}
                        <tr>
                            <td>{L($val)}</td>
                            <td>{$productInfoAry[$key]}</td>
                        </tr>
                        {/loop}

                        <!--
                        <tr>
                            <td>{L("成品码")}</td>
                            <td>{$productInfoAry['193']}</td>
                        </tr>
                        <tr>
                            <td>{L("产品型号")}</td>
                            <td>{$productInfoAry['194']}</td>
                        </tr>
                        <tr>
                            <td>{L("能效等级")}</td>
                            <td>{$productInfoAry['23']}</td>
                        </tr>
                        <tr>
                            <td>{L("外机毛重")}</td>
                            <td>{$productInfoAry['215']}</td>
                        </tr>
                        <tr>
                            <td>{L("(空调)适用面积")}</td>
                            <td>{$productInfoAry['200']}</td>
                        </tr>
                        <tr>
                            <td>{L("内机尺寸")}</td>
                            <td>{$productInfoAry['212']}</td>
                        </tr>
                        <tr>
                            <td>{L("电源")}</td>
                            <td>{$productInfoAry['222']}</td>
                        </tr>
                        <tr>
                            <td>{L("定/变频")}</td>
                            <td>{$productInfoAry['217']}</td>
                        </tr>
                        <tr>
                            <td>{L("外机尺寸")}</td>
                            <td>{$productInfoAry['218']}</td>
                        </tr>
                        <tr>
                            <td>{L("工质")}</td>
                            <td>{$productInfoAry['219']}</td>
                        </tr>
                        <tr>
                            <td>{L("内机毛重")}</td>
                            <td>{$productInfoAry['220']}</td>
                        </tr>
                        <tr>
                            <td>{L("量产时间")}</td>
                            <td>{$productInfoAry['221']}</td>
                        </tr>
                        -->

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading"> 功能卖点 </h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="optional">{L("参数")}</th>
                            <th class="optional">{L("值")}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{L("功能卖点")}</td>
                            <td>{$productInfoAry['195']}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            {if $_SESSION['user_record']['last_mod'] == 'industryProducts'}
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading"> 功能卖点 </h3>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="optional">{L("参数")}</th>
                            <th class="optional">{L("值")}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{L("BAAN查询")}</td>
                            <?php
 $catentryName = iconv('utf-8','gb2312',$catentryName); ?>
<!--                            <td><a href="http://10.163.163.160/tuWenBaanAction.do?opt=doTuhao&keyId={urlencode($catentryName)}">http://10.163.163.160/tuWenBaanAction.do?opt=doTuhao&keyId={urlencode($catentryName)}</a></td>-->
                            <td><a href="http://10.163.163.160/tuWenBaanAction.do?opt=doTuhao&keyId={urlencode($productInfoAry['194'])}">http://10.163.163.160/tuWenBaanAction.do?opt=doTuhao&keyId={$productInfoAry['194']}</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {/if}

        </div>
    </div>
    <!-- 主加载程序main content end -->


    <!-- 左侧菜单导航栏 sidebar start -->
    {php include "../sidebar.php"}
    <!-- 左侧菜单导航栏 sidebar end -->

    <!-- 尾部js加载 footer start -->
    {php include "../templates/footer.html.php"}
    <!-- 尾部js加载 footer end -->

    <!-- multi-column layout -->
    <script src="../templates/js/jquery.imagesloaded.min.js"></script>
    <script src="../templates/js/jquery.wookmark.js"></script>
    <!-- gallery functions -->
    <script src="../templates/js/gebo_gallery.js"></script>

</div>
</body>
</html>