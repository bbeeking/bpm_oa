<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    <?php include "../templates/header.html.php"?>
    <!-- 样式控制 header end -->
</head>
<body class="ptrn_a">
<div id="loading_layer" style="display:none"><img src="../templates/img/ajax_loader.gif" alt="" /></div>

<!-- 加载颜色风格选择器 -->
<?php include "../templates/style_switcher.html.php"?>

<div id="maincontainer" class="clearfix">

    <!-- 顶部导航栏 top start -->
    <?php include "../top.php"?>
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
                            消息公告
                        </li>
                        <li>课程安排</li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">
                    <div class="heading clearfix">
                        <h3 class="pull-left">课程安排表</h3>
                        <span class="pull-right label label-important"> Orders</span>
                    </div>

                    <!-- 增加皮肤 url增加 skin=dhx_web -->
                    <script src="../includes/dhtmlx/dhtmlxSpreadsheet/codebase/spreadsheet.php?sheet=5&parent=gridbox&skin=dhx_web&math=true" ></script>
<!--                    <div id="gridbox" style="width: 800px; height: 400px; background-color:white;"></div>-->
                    <div id="gridbox" class="heading clearfix" style="height:680px;"></div>
                    <input type="input" id="sheetid" value="1" />
                    <input type="button" value="Load/Create" onclick="load();" />

                </div>
            </div>

        </div>
    </div>
    <!-- 主加载程序main content end -->

    <!-- 左侧菜单导航栏 sidebar start -->
    <?php include "../sidebar.php"?>
    <!-- 左侧菜单导航栏 sidebar end -->

    <!-- 尾部js加载 footer start -->
    <?php include "../templates/footer.html.php"?>
    <!-- 尾部js加载 footer end -->

    <script>
        function load() {
            dhx_sh.clearAll();
            dhx_sh.load(document.getElementById("sheetid").value);
        }
    </script>

</div>
</body>
</html>
