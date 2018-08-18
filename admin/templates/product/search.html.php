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

                            <form class="form-horizontal well" id="depthSearch"  method="get" style="display:block;">
                                <fieldset>
                                    <p class="f_legend">高级搜索<a onclick="depth_search_hide();" style="font-size: small;">[隐藏]</a></p>

                                    <!--
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['220']."：")}</label>
                                        <div class="controls">
                                            {get_section('operator_220',$operatorAry,$_GET['operator_220'],$ary_first=array(0=>'请选择'),'operator_220')}
                                            <input type="text" id="value_220" name="value_220" value="{$_GET['value_220']}" width="20px" />&nbsp;~&nbsp;
                                            <input type="text" id="value_220_extra1" name="value_220_extra1" value="{$_GET['value_220_extra1']}" />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['89']."：")}</label>
                                        <div class="controls">
                                            {get_section('operator_89',$operatorAry,$_GET['operator_89'],$ary_first=array(0=>'请选择'),'operator_89')}
                                            <input type="text" id="value_89" name="value_89" value="{$_GET['value_89']}" />&nbsp;~&nbsp;
                                            <input type="text" id="value_89_extra1" name="value_89_extra1" value="{$_GET['value_89_extra1']}" />
                                        </div>
                                    </div>
                                    -->
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['193']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_193" name="value_193" value="{$_GET['value_193']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['194']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_194" name="value_194" value="{$_GET['value_194']}" />
<!--                                            {get_section('teacher',$userAry,$teacher,$ary_first=array(0=>'请选择'),'teacher')}-->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['219']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_219" name="value_219" value="{$_GET['value_219']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['222']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_222" name="value_222" value="{$_GET['value_222']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['230']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_230" name="value_230" value="{$_GET['value_230']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['221']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_221" name="value_221" value="{$_GET['value_221']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['211']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_211" name="value_211" value="{$_GET['value_211']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['213']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_213" name="value_213" value="{$_GET['value_213']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['302']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_302" name="value_302" value="{$_GET['value_302']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['307']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_307" name="value_307" value="{$_GET['value_307']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['344']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_344" name="value_344" value="{$_GET['value_344']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['217']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_217" name="value_217" value="{$_GET['value_217']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['23']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_23" name="value_23" value="{$_GET['value_23']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['65']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_65" name="value_65" value="{$_GET['value_65']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">{L($paramListAry['41']."：")}</label>
                                        <div class="controls">
                                            <input type="text" id="value_" name="value_41" value="{$_GET['value_41']}" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button class="btn" type="submit">{L("查询")}</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>

                            <h3 class="heading"><small>从产品中搜索关键词：</small> 空调{$search_term}</h3>
                            <div class="well clearfix">
                                <div class="row-fluid">
                                    <div class="pull-left">
                                        {if $countNum>$perPageNum}当前查询结果太多，系统为你展示其中 <span style="color:red;">{$perPageNum}<span> / <span style="color:red;">{$countNum}</span> 条信息，请提供更精准的区间进行查询{else}共为你找到 {$countNum} 条信息{/if}
                                        <a onclick="depth_search();" style="font-size: small;">[+ 搜索条件]</a>
                                    </div>
                                    <div class="pull-right">
                                        <!--
                                        <span class="sepV_c">
                                            排序:
                                            <select>
                                                <option>名称</option>
                                                <option>日期</option>
                                                <option>浏览数</option>
                                            </select>
                                        </span>
                                        <span class="sepV_c">
                                            查看每页:
                                            <select>
                                                <option>12</option>
                                                <option>25</option>
                                                <option>50</option>
                                            </select>
                                        </span>
                                        -->
                                        <span class="result_view">
											<a href="javascript:void(0)" class="box_trgr sepV_b"><i class="icon-th-large"></i></a>
											<a href="javascript:void(0)" class="list_trgr"><i class="icon-align-justify"></i></a>
										</span>
                                    </div>
                                </div>
                            </div>

                            <!--
                            <div class="pagination">
                                <ul>
                                    <li><a href="#">上一页</a></li>
                                    <li class="active">
                                        <a href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="disabled"><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#">下一页</a></li>
                                </ul>
                            </div>
                            -->

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

                            <!--
                            <div class="pagination">
                                <ul>
                                    <li><a href="#">上一页</a></li>
                                    <li class="active">
                                        <a href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="disabled"><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#">下一页</a></li>
                                </ul>
                            </div>
                            -->
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