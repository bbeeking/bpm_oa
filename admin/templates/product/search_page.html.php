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
                            产品目录
                        </li>
                        <li>
                            搜索结果
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid search_page">
                <div class="span12">

                    <h3 class="heading"><small>从产品中搜索关键词：</small> {$param}</h3>
                    <div class="well clearfix">
                        <div class="row-fluid">
                            <div class="pull-left">
                                {if $countNum>$perPageNum}当前查询结果太多，系统为你展示其中 <span style="color:red;">{$perPageNum}<span> / <span style="color:red;">{$countNum}</span> 条信息，请提供更精准的区间进行查询{else}共为你找到 {$countNum} 条信息{/if}
                            </div>
                            <div class="pull-right">
                                    <span class="result_view">
                                        <a href="javascript:void(0)" class="box_trgr sepV_b"><i class="icon-th-large"></i></a>
                                        <a href="javascript:void(0)" class="list_trgr"><i class="icon-align-justify"></i></a>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="search_panel clearfix">

                        <?php $i=1; ?>
                        {loop $productTmpInfoAry $key=>$val}
                        <div class="search_item clearfix">
                            <span class="searchNb">{$i}.</span>
                            <div class="thumbnail pull-left">
                                <a class="cbox_single cboxElement" href="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{$val['PARTNUMBER']}/400X400/{$val['PARTNUMBER']}_01.jpg" title="{$val['NAME']}" rel="gallery">
                                    <img alt="" src="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{$val['PARTNUMBER']}/400X400/{$val['PARTNUMBER']}_01.jpg" width="80px" height="80px">
                                </a>
                            </div>
                            <div class="search_content">
                                <h4>
                                    <a href="./detail.php?CATENTRY_ID={$key}&CATENTRY_NAME={$val['NAME']}" class="sepV_a" title="{$val['NAME']}_{$val['PARTNUMBER']}">{$val['NAME']}_{$val['PARTNUMBER']}</a>
                                </h4>
                                <p class="sepH_b item_description">{$val['BUYSPOTS']}</p>
                                <p class="sepH_a"><strong>成品码:</strong> {$val['PARTNUMBER']}</p>
                                <small>{$val['KEYWORD']}</small>, <small>{$val['TYPE']}</small>
                            </div>
                        </div>
                        <?php $i++; ?>
                        {/loop}

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

    <script type="text/javascript">
        //隐藏
        function depth_search_hide()
        {
            document.getElementById("depthSearch").style.display = "none";
        }
        //展示
        function depth_search()
        {
            document.getElementById("depthSearch").style.display = "block";
        }
    </script>

    <!-- multi-column layout -->
    <script src="../templates/js/jquery.imagesloaded.min.js"></script>
    <script src="../templates/js/jquery.wookmark.js"></script>
    <!-- search page functions -->
    <script src="../templates/js/gebo_search.js"></script>

</div>
</body>
</html>