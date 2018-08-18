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
                            报表展示
                        </li>
                        <li>产品统计</li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">


                    <h3 class="heading"> 报表统计 </h3>
                    <div>

                        <!-- 图表输出 -->
                        <div id="container" class="tubiaoheight"></div>

<!--                        <input type="hidden" name="tableParamNum" id="tableParamNum" value="{$paramCount}">-->
<!--                        <table class="table table-striped table-bordered mediaTable" id="dt_st_log">-->
                        <table class="table table-striped table-bordered mediaTable">
                            <thead>
                            <tr>
                                <th>{L("分类名称")}</th>
                                <th>{L("统计数量")}</th>
                            </tr>
                            </thead>
                            <tbody>
                            {loop $userPerModuleAry $k=>$v}
                            <tr>
                                <td style="background-color: #FFEEEE">{get_divide_char(0,8)}<img src="../images/menu_plus.gif">&nbsp;{$v['m_name']}</td>
                                <td style="background-color: #FFEEEE">{$v['countNum']}</td>
                            </tr>

                                {loop $v['list']  $kk=>$vv}
                                <tr>
                                    <td style="background-color: #E7FF9E">{get_divide_char(1,8)}<img src="../images/menu_plus.gif">&nbsp;{$vv['m_name']}</td>
                                    <td style="background-color: #E7FF9E">{$vv['countNum']}</td>
                                </tr>

                                    {loop $vv['list'] $kkk=>$vvv}
                                    <tr>
                                        <td style="background-color: #ffffcc">{get_divide_char(2,8)}<img src="../images/menu_plus.gif">&nbsp;{$vvv['m_name']}</td>
                                        <td style="background-color: #ffffcc">{$vvv['countNum']}</td>
                                    </tr>

                                        {loop $vvv['list'] $kkkk=>$vvvv}
                                        <tr>
                                            <td>{get_divide_char(3,8)}<img src="../images/menu_plus.gif">&nbsp;{$vvvv['NAME']}</td>
                                            <td>{$vvvv['countNum']}</td>
                                        </tr>
                                        {/loop}


                                    {/loop}

                                {/loop}

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

    <script language="javascript" type="text/javascript" src="../js/charts.js"></script>
    <script language="javascript" type="text/javascript" src="../js/highcharts/highcharts.js"></script>
    <script language="javascript" type="text/javascript" src="../js/highcharts/modules/exporting.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //* 学员信息报表配置
            gebo_datatbles.dt_st_log();

            //图表初始化
            initChart("900","200","0","container","line",{$xvalue},{$series},'{$title}',"产品",1,'款',true,"null","60");
        });
    </script>

    <!-- multi-column layout -->
    <script src="../templates/js/jquery.imagesloaded.min.js"></script>
    <script src="../templates/js/jquery.wookmark.js"></script>
    <!-- gallery functions -->
    <script src="../templates/js/gebo_gallery.js"></script>

</div>
</body>
</html>