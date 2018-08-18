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
                            <a href="#">产品分类</a>
                        </li>
                        <li>
                            <a href="#">产品分类列表</a>
                        </li>
                        <li>show</li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading"> 产品目录 <small>(流式布局demo)</small></h3>
                    <div>
                        <img class="thumbnail span2" src="../images/product/1.jpg" alt="" />
                    </div>
                    <div class="span10">
                        <table class="table table-striped table-bordered mediaTable" id="dt_d">
                            <thead>
                            <tr>
                                <th class="optional">{L("成品码")}</th>
                                <th class="optional">{L("产品型号")}</th>
                                <th class="optional">{L("能效等级")}</th>
                                <th class="optional">{L("外机毛重")}</th>
                                <th class="optional">{L("(空调)适用面积")}</th>
                                <th class="optional">{L("内机尺寸")}</th>
                                <th class="optional">{L("电源")}</th>
                                <th class="optional">{L("定/变频")}ip</th>
                                <th class="optional">{L("外机尺寸")}</th>
                                <th class="optional">{L("工质")}</th>
                                <th class="optional">{L("内机毛重")}</th>
                                <th class="optional">{L("量产时间")}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>KA240040801</td>
                                <td>KFR-35GW/(35570)Aa-3</td>
                                <td>超级能效</td>
                                <td>37</td>
                                <td>16-24㎡</td>
                                <td>923X379X265</td>
                                <td>普通电源</td>
                                <td>定频</td>
                                <td>878X360X580</td>
                                <td>R22</td>
                                <td>13</td>
                                <td>2011-03-23</td>
                            </tr>
                            <tr>
                                <td>KA240040802</td>
                                <td>KFR-35GW/(35570)Aa-3</td>
                                <td>三级能效</td>
                                <td>37</td>
                                <td>16-24㎡</td>
                                <td>923X379X265</td>
                                <td>普通电源</td>
                                <td>定频</td>
                                <td>878X360X580</td>
                                <td>R22</td>
                                <td>13</td>
                                <td>2011-03-23</td>
                            </tr>
                            <tr>
                                <td>KA240040803</td>
                                <td>KFR-35GW/(35570)Aa-3</td>
                                <td>五级能效</td>
                                <td>37</td>
                                <td>16-24㎡</td>
                                <td>923X379X265</td>
                                <td>普通电源</td>
                                <td>定频</td>
                                <td>878X360X580</td>
                                <td>R22</td>
                                <td>13</td>
                                <td>2011-03-23</td>
                            </tr>
                            <tr>
                                <td>KA240040804</td>
                                <td>KFR-35GW/(35570)Aa-3</td>
                                <td>四级能效</td>
                                <td>37</td>
                                <td>16-24㎡</td>
                                <td>923X379X265</td>
                                <td>普通电源</td>
                                <td>定频</td>
                                <td>878X360X580</td>
                                <td>R22</td>
                                <td>13</td>
                                <td>2011-03-23</td>
                            </tr>
                            <tr>
                                <td>KA240040805</td>
                                <td>KFR-35GW/(35570)Aa-3</td>
                                <td>一级能效</td>
                                <td>37</td>
                                <td>16-24㎡</td>
                                <td>923X379X265</td>
                                <td>普通电源</td>
                                <td>定频</td>
                                <td>878X360X580</td>
                                <td>R22</td>
                                <td>13</td>
                                <td>2011-03-23</td>
                            </tr>
                            <tr>
                                <td>KA240040806</td>
                                <td>KFR-35GW/(35570)Aa-3</td>
                                <td>二级能效</td>
                                <td>37</td>
                                <td>16-24㎡</td>
                                <td>923X379X265</td>
                                <td>普通电源</td>
                                <td>定频</td>
                                <td>878X360X580</td>
                                <td>R22</td>
                                <td>13</td>
                                <td>2011-03-23</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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

    <!-- multi-column layout -->
    <script src="../templates/js/jquery.imagesloaded.min.js"></script>
    <script src="../templates/js/jquery.wookmark.js"></script>
    <!-- gallery functions -->
    <script src="../templates/js/gebo_gallery.js"></script>

</div>
</body>
</html>