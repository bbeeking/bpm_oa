<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    <?php include "../templates/header.html.php"?>
    <!-- 样式控制 header end -->
</head>
<body class="sidebar_left ptrn_a">
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
                            模板管理
                        </li>
                        <li>EXCEL模板预览</li>
                    </ul>
                </div>
            </nav>

            <form action="excelBI.php" class="form-horizontal well" enctype="multipart/form-data"  name="depthSearch" id="depthSearch"  method="post" >
                <fieldset>
                    <p class="f_legend">选择模板</p>
                    <div class="control-group">
                        <label class="control-label">模板名称：</label>
                        <div class="controls">
                            <input name="file" id="file" type="file" value="上传" />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="act" id="act" value="view">
                            <button class="btn" type="submit"><?php echo L("提交");?></button>
                        </div>
                    </div>
                </fieldset>
            </form>

            <div class="row-fluid">
                <div class="span12">
                    <div class="heading clearfix">
                        <h3 class="pull-left">EXCEL模板预览</h3>
                        <span class="pull-right label label-important"><?php echo $dataAryCount;?> Orders</span>
                    </div>
                    <table class="table table-striped table-bordered mediaTable">
<!--                    <table border="1px;">-->
                        <?php
                        for($i=0;$i<count($dataAry);$i++)
                        {
                            echo "<tr>";
                            /* 输出字段名及值 */
                            for($j=0;$j<count($dataAry[$i]);$j++)
                            {
                                if($dataAry[$i][$j]["type"]!= 'title')
                                {
                                    echo "<td>".$dataAry[$i][$j]["name"]."</td>";
                                    //一行只有一个字段的情况下，name占用一单元格，剩下的为值
                                    if(count($dataAry[$i]) == 1)
                                    {
                                        echo "<td colspan='".($maxCountNum-1)."'>".$dataAry[$i][$j]["value"]."</td>";
                                    }
                                    else
                                    {
                                        echo "<td>".$dataAry[$i][$j]["value"]."</td>";
                                    }

                                }
                                else
                                {
//                            echo "<td rowspan='".$maxCountNum."'>".$dataAry[$i][$j]["name"]."</td>";
                                    echo "<td colspan='".$maxCountNum."' style='text-align:center;font-size:18px;font-weight:600'>".$dataAry[$i][$j]["name"]."</td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                    </table>

                    <form action="excelBI.php" name="FormPageToAdd" id="FormPageToAdd" enctype="multipart/form-data" method="post" class="form-horizontal">

                        <div class="control-group">
                            <div class="controls" style="float: right;">
<!--                                <input name="button" class="btn-info" type="button" onclick="window.location.href='excelBI.php?act=edit';" class="btn" value="下一步：报表信息校对" />-->
                                <input type="hidden" name="act" id="act" value="edit">
                                <input type="hidden" name="fileBasicPath" id="fileBasicPath" value="<?php echo $fileBasicPath;?>">
                                <input type="hidden" name="fileName" id="fileName" value="<?php echo $_FILES['file']['name'];?>">
                                <input type="submit" class="btn-info"  value="下一步：报表信息校对">
                            </div>
                        </div>

                    </form>

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

</div>
</body>
</html>
