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
                            产品分类
                        </li>
                        <li>产品属性对比</li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">

                    <h3 class="heading"> 产品参数对比 </h3>
                    <div>
                        <input type="hidden" name="tableParamNum" id="tableParamNum" value="{$paramCount}">
<!--                        <table class="table table-striped table-bordered>-->
                        <table class="table table-striped table-bordered mediaTable">
                            <thead>
                            <tr>
                                <th class="optional">{L("商品图片")}</th>

                                {loop $productTmpInfoAry $key=>$val}
                                <th>
                                    <img class="thumbnail" width="40px" alt="" src="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{$val['193']['IDENTIFIER']}/400X400/{$val['193']['IDENTIFIER']}_01.jpg">
<!--                                    {$checkedAry[$key]}-->
                                </th>
                                {/loop}

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>{L("型号")}</td>
                                {loop $productTmpInfoAry $kk=>$vv}
                                <td>{$checkedAry[$kk]}<br /><a href="compare.php?action=removeCompareProduct&removeCompareProduct={$kk}_{$checkedAry[$kk]}">(移除)</a></td>
                                {/loop}
                            </tr>


                            {loop $paramDefineAry $key=>$val}
                            <tr>
                                <td>{$val}</td>

                                {loop $productTmpInfoAry $kk=>$vv}
                                <td>{$vv[$key]['IDENTIFIER']}</td>
                                {/loop}

                            </tr>
                            {/loop}

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