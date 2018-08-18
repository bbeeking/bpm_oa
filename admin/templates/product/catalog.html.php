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

                    <table class="table table-striped table-bordered">
                        <tbody>
                            <?php $i=0; ?>
                            {loop $sortByParentAry[$catalog] $key=>$val}
                                {if $i%7 == 0}
                                <tr>
                                {/if}
                                    <td>{$key}</td>
                                    <?php $i++; ?>
                                {if $i%7 == 0}
                                </tr>
                                {/if}
                            {/loop}
                        </tbody>
                    </table>

                    <h3 class="heading"> 产品目录 <small>(流式布局demo)</small></h3>
                    <div id="large_grid" class="wmk_grid">
                        <ul>
                            <li class="thumbnail">
                                <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                                    <img src="../images/product/1.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_2 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_3 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/4.jpg" title="Image_4 title long title long title long">
                                    <img src="../images/product/4.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/5.jpg" title="Image_5 title long title long title long">
                                    <img src="../images/product/5.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/6.jpg" title="Image_7 title long title long title long">
                                    <img src="../images/product/6.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/7.jpg" title="Image_8 title long title long title long">
                                    <img src="../images/product/7.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>

                            <li class="thumbnail">
                                <a href="../images/product/1.jpg" title="Image_10 title long title long title long">
                                    <img src="../images/product/1.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>

                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_12 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_13 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/1.jpg" title="Image_14 title long title long title long">
                                    <img src="../images/product/1.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/4.jpg" title="Image_15 title long title long title long">
                                    <img src="../images/product/4.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/5.jpg" title="Image_16 title long title long title long">
                                    <img src="../images/product/5.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/6.jpg" title="Image_17 title long title long title long">
                                    <img src="../images/product/6.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/7.jpg" title="Image_18 title long title long title long">
                                    <img src="../images/product/7.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/8.jpg" title="Image_19 title long title long title long">
                                    <img src="../images/product/8.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading">产品相册 <small>(固定布局)</small></h3>
                    <div class="span3 thumbnail" style="margin-left: 10px;">
                        <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                            <img src="../images/product/1.jpg" style="height:234" alt="" />
                        </a>
                        <p>
                            <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                            <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                            <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                        </p>
                    </div>
                    <div class="span3 thumbnail" style="margin-left: 10px;">
                        <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                            <img src="../images/product/1.jpg" style="height:234" alt="" />
                        </a>
                        <p>
                            <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                            <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                            <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                        </p>
                    </div>
                    <div class="span3 thumbnail" style="margin-left: 10px;">
                        <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                            <img src="../images/product/1.jpg" style="height:234" alt="" />
                        </a>
                        <p>
                            <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                            <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                            <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                        </p>
                    </div>
                    <div class="span3 thumbnail" style="margin-left: 10px;">
                        <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                            <img src="../images/product/1.jpg" style="height:234" alt="" />
                        </a>
                        <p>
                            <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                            <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                            <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                        </p>
                    </div>
                    <div class="span3 thumbnail" style="margin-left: 10px;">
                        <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                            <img src="../images/product/1.jpg" style="height:234" alt="" />
                        </a>
                        <p>
                            <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                            <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                            <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                        </p>
                    </div>
                    <div class="span3 thumbnail" style="margin-left: 10px;">
                        <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                            <img src="../images/product/1.jpg" style="height:234" alt="" />
                        </a>
                        <p>
                            <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                            <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                            <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                        </p>
                    </div>
                    <div class="span3 thumbnail" style="margin-left: 10px;">
                        <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                            <img src="../images/product/1.jpg" style="height:234" alt="" />
                        </a>
                        <p>
                            <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                            <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                            <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                        </p>
                    </div>

                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="heading">Gallery grid <small>(slideshow on)</small></h3>
                    <div id="large_grid" class="wmk_grid">
                        <ul>
                            <li class="thumbnail">
                                <a href="../images/product/1.jpg" title="格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 ">
                                    <img src="../images/product/1.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>格力空调 玫瑰 KFR-26GW/(26587)FNAa-A1 变频 冷暖 1匹机 </span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_2 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_3 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/4.jpg" title="Image_4 title long title long title long">
                                    <img src="../images/product/4.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/5.jpg" title="Image_5 title long title long title long">
                                    <img src="../images/product/5.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/6.jpg" title="Image_7 title long title long title long">
                                    <img src="../images/product/6.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/7.jpg" title="Image_8 title long title long title long">
                                    <img src="../images/product/7.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/8.jpg" title="Image_9 title long title long title long">
                                    <img src="../images/product/8.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/1.jpg" title="Image_10 title long title long title long">
                                    <img src="../images/product/1.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>

                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_12 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/3.jpg" title="Image_13 title long title long title long">
                                    <img src="../images/product/3.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/1.jpg" title="Image_14 title long title long title long">
                                    <img src="../images/product/1.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/4.jpg" title="Image_15 title long title long title long">
                                    <img src="../images/product/4.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/5.jpg" title="Image_16 title long title long title long">
                                    <img src="../images/product/5.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/6.jpg" title="Image_17 title long title long title long">
                                    <img src="../images/product/6.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/7.jpg" title="Image_18 title long title long title long">
                                    <img src="../images/product/7.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                            <li class="thumbnail">
                                <a href="../images/product/8.jpg" title="Image_19 title long title long title long">
                                    <img src="../images/product/8.jpg" alt="" />
                                </a>
                                <p>
                                    <a href="javascript:void(0)" title="Remove"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" title="Edit"><i class="icon-pencil"></i></a>
                                    <span>Image title long title long title long</span>
                                </p>
                            </li>
                        </ul>
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