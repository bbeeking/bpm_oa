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
                            产品分类
                        </li>
                        <li>{$_GET['catalog']} ({$productDepthCountAry[$_SESSION['user_record']['last_visit']]['countNum']}个产品)</li>
                    </ul>
                </div>
            </nav>

            <div class="row-fluid">
                <div class="span12">

                    <table class="table table-striped table-bordered">
                        <tbody>
                        <?php $i=0;$count = count($sortByParentAry[$catalog]);$differ=7-($count%7) ?>
                        {loop $sortByParentAry[$catalog] $key=>$val}
                        {if $i%7 == 0}
                        <tr>
                            {/if}
                            <td {if $val['CATGROUP_ID'] == $catgroup_id} class="product_onclick_td" {/if}>
                                <a href="{process_product_uri('CATGROUP_ID',$val['CATGROUP_ID'])}" {if $val['CATGROUP_ID'] == $catgroup_id} class="product_onclick_td" {/if}>
                                {$key} <span class="label label-success" style="float: right">{$productDepthCountAry[$_SESSION['user_record']['last_visit']]['list'][$val['CATGROUP_ID']]['countNum']}</span>
                                </a>
                            </td>
                            <?php $i++; ?>

                            {if $i==$count && $i%7 != 0 && $count>7}
                            <?php
 for($c=1;$c<=$differ;$c++) { echo "<td></td>"; } ?>
                            {/if}

                            {if $i%7 == 0}
                        </tr>
                        {/if}
                        {/loop}
                        </tbody>
                    </table>

                    <h3 class="heading"> 产品目录 <a onclick="depth_search();" style="font-size: small;"><i class="icon-filter"></i>[属性筛选]</a></h3>

                    {if count($paramDefineAry)>0}
                    <form action="../product/catalog.php" class="form-horizontal well"  name="depthSearch" id="depthSearch"  method="get" {if count($filterAry)>0}style="display:block;"{else}style="display:none;"{/if}>
                        <fieldset>
                            <p class="f_legend">属性筛选</p>

                            {loop $paramDefineAry $key=>$val}
                            <div class="control-group">
                                <label class="control-label">{L($val)}</label>
                                <div class="controls">
                                    <?php $ATTR_ID_KEY = 'ATTR_ID_'.$key; ?>
                                    {get_section('ATTR_ID_'.$key,$paramDataAry[$key],$$ATTR_ID_KEY,$ary_first=array('0'=>''),'ATTR_ID_'.$key)}
                                </div>
                            </div>
                            {/loop}

                            <div class="control-group">
                                <div class="controls">
                                    <!-- 保留catalog 用于控制分类，否则结果为空 -->
                                    <input type="hidden" name="catalog" value="{$_GET['catalog']}"/>
                                    <input type="hidden" name="CATGROUP_ID" value="{$_GET['CATGROUP_ID']}">
                                    <button class="btn" type="submit">{L("查询")}</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    {/if}

                    <div class="clearfix sepH_b">
                        <div class="btn-group pull-right">
                            <a href="#" data-toggle="dropdown" class="btn btn-inverse dropdown-toggle">字段筛选 <span class="caret"></span></a>
                            <ul class="dropdown-menu tableMenu" id="dt_d_nav_1">
                                <li><label class="checkbox" for="dt_col_1"><input type="checkbox" value="1" id="dt_col_1" name="toggle-cols" checked="checked"/> 图片</label></li>
                                <li><label class="checkbox" for="dt_col_2"><input type="checkbox" value="2" id="dt_col_2" name="toggle-cols" checked="checked"/> 成品码</label></li>
                                <li><label class="checkbox" for="dt_col_3"><input type="checkbox" value="3" id="dt_col_3" name="toggle-cols" checked="checked"/> 产品型号</label></li>

                                <?php $i=4;?>
                                {loop $paramDefineAry $kkk=>$vvv}
                                <li><label class="checkbox" for="dt_col_{$i}"><input type="checkbox" value="{$i}" id="dt_col_{$i}" name="toggle-cols" checked="checked"/> {$vvv}</label></li>
                                <?php $i++; ?>
                                {/loop}

                            </ul>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="tableParamNum" id="tableParamNum" value="{$paramCount}">
                        <input type="hidden" name="columnCountNum" id="columnCountNum" value="{count($paramDefineAry)}">
                        <table class="table table-striped table-bordered mediaTable" id="dt_st_log">
<!--                        <table class="table table-striped table-bordered mediaTable" id="dt_d">-->
                            <thead>
                            <tr>
                                <th class="table_checkbox"><input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_st_log" /></th>
                                <th>{L("图片")}</th>
                                <th>{L("成品码")}</th>
                                <th>{L("产品型号")}</th>

                                {loop $paramDefineAry $kkk=>$vvv}
                                <th>{L($vvv)}</th>
                                {/loop}

                                <!--
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
                                -->
                            </tr>
                            </thead>
                            <tbody>
                            {loop $catgroupAry $key=>$val}
                            <tr>
                                <td><input type="checkbox" name="row_sel" class="row_sel" value="{$val['CATENTRY_ID']}_{str_replace(',',';',$val['NAME'])}" /></td>
                                <td>
                                    <a class="cbox_single cboxElement" href="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{$val['PARTNUMBER']}/400X400/{$val['PARTNUMBER']}_01.jpg" title="{$val['NAME']}" rel="gallery">
                                        <img class="thumbnail" width="40px" alt="" src="http://web.csj.com/wcsstore/GreeStorefrontAssetStore/images/product/{$val['PARTNUMBER']}/400X400/{$val['PARTNUMBER']}_01.jpg">
                                    </a>
                                </td>
<!--                                <td>{$val['PARTNUMBER']}</td>-->
                                <td>{$val['PARTNUMBER_BEFORE']}</td>
                                <td><a href="../product/detail.php?CATENTRY_ID={$val['CATENTRY_ID']}&CATENTRY_NAME={$val['NAME']}">{$val['NAME']}</a></td>

                                {loop $paramDefineAry $kkk=>$vvv}
                                <td>{$productInfoAry[$val['CATENTRY_ID']][$kkk]}</td>
                                {/loop}

                                <!--
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['23']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['215']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['200']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['212']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['222']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['217']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['218']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['219']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['220']}</td>
                                <td>{$productInfoAry[$val['CATENTRY_ID']]['221']}</td>
                                -->
                            </tr>
                            {/loop}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- hide elements (for later use) -->
            <div class="hide">
                <!-- actions for datatables -->
                <div class="dt_st_actions">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">操作 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li title="产品属性对比"><a href="#" class="deal_rows_dt" data-tableid="dt_st_log"><i class="icon-shopping-cart"></i> 产品属性对比</a></li>
                            <li title="加入对比栏"><a href="#" class="add_compare_dt" data-tableid="dt_st_log"><i class="icon-plus"></i> 加入对比栏</a></li>
                            <li title="清空对比栏"><a href="#" class="trash_rows_dt" data-tableid="dt_st_log"><i class="icon-trash"></i> 清空对比栏</a></li>
                            <!--								<li><a href="javascript:void(0)">删除</a></li>-->
                        </ul>
                    </div>
                </div>

                <!-- confirmation box -->
                <div id="confirm_dialog" class="cbox_content">
                    <div class="sepH_c tac"><strong>将所选的产品进行属性对比?</strong></div>
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
        $(document).ready(function() {
            //* 学员信息报表配置
            gebo_datatbles.dt_st_log();
//            document.body.style.MozTransform = 'scale(0.98)';
        });

        //更新任务
        function depth_search()
        {
            document.getElementById("depthSearch").style.display = "block";
        }
    </script>

    <!-- multi-column layout -->
    <script src="../templates/js/jquery.imagesloaded.min.js"></script>
    <script src="../templates/js/jquery.wookmark.js"></script>
    <!-- gallery functions -->
    <script src="../templates/js/gebo_gallery.js"></script>

</div>
</body>
</html>