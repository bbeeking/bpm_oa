
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{$webtitle}</title>
    <link href="../css/application.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="../js/common.js"></script>
    <script language="javascript" type="text/javascript" src="../js/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="../js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="../js/ueditor/ueditor.all.js"></script>


    <!-- 脚本js控制 start -->
    <script language="javascript">
        $(document).ready(function(){
            //激活ueditor
            window.UEDITOR_HOME_URL = "/pms/eonline/js/";
            var editor = new UE.ui.Editor();
            editor.render("myEditor");
            editor.render("myEditor2");
        });
    </script>

    <link rel="stylesheet" href="../css/navigation_bar/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/navigation_bar/menu.css">

    <style type="text/css" >
        a, a:link, a:visited {color: #2A5685;text-decoration: none;}
        a:hover, a:active{ color: #c61a1a; text-decoration: underline;}
    </style>

</head>
<body class="controller-issues action-show">
<div id="wrapper">
    <div id="wrapper2">



        <!-- Mega Menu Start -->
        <div class="container">
            <div class="menu style-1">
                <ul class="menu">
                    <li><a style="font-size: 18px;">基础文档应用管理系统</a></li>
                    <li><a href="basicDocument.php">图文信息</a></li>
                    <li><a href="basicDocument.php?store3=biaozhun">标准信息</a></li>
                    <li><a href="basicDocument.php?store3=gongyi">工艺资料</a></li>
                    <li><a href=""  class="arrow">家研中心</a>
                        <div class="mega-menu">
                            <div class="col-1">
                                <h4><a href="">家电研究中心模块</a></h4>
                                <ol>
                                    <li><a href="basicDocument.php?store3=jdtw">家电图文</a></li>
                                    <li><a href="basicDocument.php?store3=jdgongyi">家电工艺</a></li>
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li><a href="http://sc.chinaz.com/?contactus/" class="arrow">其他应用</a>
                        <div class="mega-menu full-width">
                            <div class="col-1">
                                <h4><a href="">图文应用</a></h4>
                                <ol>
                                    <li><a href="http://10.163.163.160/itemIndex.jsp" target="_blank">试用反馈</a></li>
                                    <li><a href="">报废图文</a></li>
                                    <li><a href="">商品编码</a></li>
                                    <li><a href="">资 料 员</a></li>
                                </ol>
                            </div>

                            <div class="col-1">
                                <h4><a href="http://sc.chinaz.com/?tag/freebie/">图文维护</a></h4>
                                <ol>
                                    <li><a href="./basicDocMaintenance.php">图文新建</a></li>
                                    <li><a href="http://10.2.8.117/d/api/spiderAll.php" target="_blank">总部图文更新</a></li>
                                    <li><a href="http://10.2.8.117/d/api/spiderAllCS.php" target="_blank">长沙图文更新</a></li>
                                    <li><a href="http://10.2.8.117/d/api/rsyncDocumentCS.php" target="_blank">长沙文件同步</a></li>
                                </ol>
                            </div>

                            <div class="col-1">
                                <h4><a href="http://sc.chinaz.com/?tag/freebie/">报表功能</a></h4>
                                <ol>
                                    <li><a href="">报表导出</a></li>
                                </ol>
                            </div>

                            <div class="col-1">
                                <h4><a href="http://sc.chinaz.com/?tag/freebie/">系统设置</a></h4>
                                <ol>
                                    <li><a href="">菜单管理</a></li>
                                    <li><a href="">管理员列表</a></li>
                                    <li><a href="">系统常用设置</a></li>
                                    <li><a href="">后台操作监控</a></li>
                                    <li><a href="">添加管理员</a></li>
                                    <li><a href="">添加菜单</a></li>
                                    <li><a href="">群组管理</a></li>
                                </ol>
                            </div>

                            <div class="col-1">
                                <h4><a href="http://sc.chinaz.com/?category/website-designing/">其他功能</a></h4>
                                <ol>
                                    <li><a href="" onclick="alert('无权限访问!');">BPM流程工具</a></li>
                                    <li><a href="http://10.1.11.156/piwik/index.php?module=CoreHome&action=index&idSite=4&period=day&date=today#/module=Dashboard&action=embeddedIndex&idSite=4&period=day&date=yesterday&idDashboard=1" target="_blank">Piwik统计分析工具</a></li>
                                    <li><a href="" onclick="alert('无权限访问!');">Xhprof性能分析工具</a></li>
                                    <li><a href="" onclick="alert('无权限访问!');">MemAdmin命中分析管理平台</a></li>
                                </ol>
                            </div>


                        </div>
                    </li>
                    <li>
                        <div id="sidesearch">
                            <form id="sitesearchform" style="display:inline" method="get" action="http://sc.chinaz.com/?">
                                <fieldset>
                                    <input class="sidesearch_input" type="text" value="图号/更改号/名称/经办人" onfocus="if (this.value == '图号/更改号/名称/经办人') {this.value = '';}"  x-webkit-speech="" onwebkitspeechchange="transcribe(this.value)" onblur="if (this.value == '') {this.value = '图号/更改号/名称/经办人';}" name="s" id="s">
                                    <input type="image" class="sidesearch_submit" src="../images/navigation_bar/sidesearchsubmit.png" />
                                </fieldset>
                            </form>
                        </div>

                    </li>
                    <li class="right"><a href="" class="arrow">{$_SESSION['RealName']}</a>
                        <ul>
                            <li><a href="" class="rss" title="Subscribe to RSS">我的主页</a></li>
                            <li><a href="" class="twitter" title="Follow us on Twitter">消息</a></li>
                            <li><a href="" class="facebook" title="Follow us on Facebook">设置</a></li>
                            <li><a href="{DAEM_PATH}admin/logout.php" class="pinterest" title="Follow us on Google+">登出</a></li>
                            <!--						<li><a href="http://sc.chinaz.com/" class="googleplus" title="Follow us on Pinterest">Pinterest</a></li>-->
                            <!--						<li><a href="http://sc.chinaz.com" class="stumbleupon" title="Follow us on Stumbleupon">Stumbleupon</a></li>-->
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <br />




        <div class="nosidebar" id="main">

            <div id="content">
                <div style="clear: both;"></div>
                <div id="update" style="">
                    <h3>当前位置：图文信息维护</h3>
                    <form action="" class="edit_issue" enctype="multipart/form-data" id="issue-form" method="post">
                        <div class="box">
                            <fieldset class="tabular"><legend>图文属性</legend>
                                <div id="all_attributes">

                                    <p>
                                        <label for="issue_tracker_id">名    称<span class="required"> *</span></label>
                                        <input type="text" id="title" name="title"  style="width:300px;" />
                                    </p>

                                    <div id="attributes" class="attributes">
                                        <div class="splitcontent">
                                            <div class="splitcontentleft">
                                                <p>
                                                    <label for="status">图文号<span class="required"> *</span></label>
                                                    <input type="text" id="title" name="title" />
                                                </p>
                                                <p>
                                                    <label for="priority">更改号<span class="required"> *</span></label>
                                                    <input type="text" id="title" name="title" />
                                                </p>
                                                <p>
                                                    <label for="status">是否制品<span class="required"> *</span></label>
                                                    {get_section('MADEPROUDFLAG',$isOrNotConfig,$MADEPROUDFLAG,$ary_first=array(''=>''),'MADEPROUDFLAG','','width:36%;')}
                                                </p>
                                            </div>

                                            <div class="splitcontentright">
                                                <p>
                                                    <label for="startDate">种类</label>
                                                    <input type="text" id="title" name="title" />
                                                </p>
                                                <p>
                                                    <label for="endDate">版本号</label>
                                                    <input type="text" id="title" name="title" />
                                                </p>
                                                <p>
                                                    <label for="status">是否改模<span class="required"> *</span></label>
                                                    {get_section('CHANGEMOULDFLAG',$isOrNotConfig,$CHANGEMOULDFLAG,$ary_first=array(''=>''),'CHANGEMOULDFLAG','','width:36%;')}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!--
                                    <p>
                                        <label for="issue_tracker_id">物料类型<span class="required"> *</span></label>
                                        <input type="text" id="title" name="title"/>
                                    </p>
                                    -->
                                    <p>
                                        <label for="issue_tracker_id">适用范围<span class="required"> *</span></label>
                                        <input type="text" id="title" name="title" />
                                    </p>

                                    <p>
                                        <label for="issue_tracker_id">编码<span class="required"> *</span></label>
                                        <input type="text" id="title" name="title" />
                                    </p>
                                    <p>
                                        <label for="issue_tracker_id">物料组<span class="required"> *</span></label>
                                        <input type="text" id="title" name="title" />
                                    </p>

                                    <p>
                                        <label for="issue_tracker_id">发往单位<span class="required"> *</span></label>
                                        <input type="text" id="title" name="title"  />
                                    </p>

                                    <div id="attributes" class="attributes">
                                        <div class="splitcontent">
                                            <div class="splitcontentleft">
                                                <p>
                                                    <label for="status">经办人<span class="required"> *</span></label>
                                                    {get_section('status',$jobStatus,$status,$ary_first=array(''),'status','','width:36%;')}
                                                </p>
                                                <p>
                                                    <label for="priority">日期<span class="required"> *</span></label>
                                                    {get_section('priority',$priorityStatusAry,$priority,$ary_first=array(''),'priority','','width:36%;')}
                                                </p>
                                            </div>

                                            <div class="splitcontentright">
                                                <p>
                                                    <label for="startDate">状态</label>
                                                    <input type="text" id="title" name="title" />
                                                </p>
                                                <p>
                                                    <label for="endDate">失效日期</label>
                                                    <input type="text" id="title" name="title" />
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <p>
                                        <label>备注<span class="required"> *</span></label>
                                        <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
<!--                                          <span id="issue_description_and_toolbar" style="display:none">-->
                                            <div class="jstEditor">
                                                <textarea cols="60" rows="10" style="height:100px;width:60%;margin-left: 180px;" name="myEditor" id="myEditor">{$content}</textarea>
                                            </div>
                                            <div class="jstHandle"></div>
<!--                                          </span>-->
                                    </p>
                                    <p>
                                        <label>制品意见<span class="required"> *</span></label>
                                        <a href="#" ><img alt="Edit" src="../images/edit.png" /></a>
                                          <span id="issue_description_and_toolbar" style="display:none">
                                            <div class="jstEditor">
                                                <textarea cols="60" rows="10" style="height:100px;width:60%;margin-left: 180px;" name="myEditor2" id="myEditor2">{$detail}</textarea>
                                            </div>
                                            <div class="jstHandle"></div>
                                          </span>
                                    </p>

                                    <p>
                                        <label for="issue_tracker_id">内容文件<span class="required"> *</span></label>
                                        <input type="file" id="file1" name="file1"  />
                                    </p>
                                    <p>
                                        <label for="issue_tracker_id">更改文件<span class="required"> *</span></label>
                                        <input type="file" id="file2" name="file2"  />
                                    </p>
                                    <p>
                                        <label for="issue_tracker_id">TIF通道<span class="required"> *</span></label>
                                        <input type="file" id="file3" name="file3"  />
                                    </p>
                                    <p>
                                        <label for="issue_tracker_id">签审文件<span class="required"> *</span></label>
                                        <input type="file" id="file4" name="file4"  />
                                    </p>

                                </div>
                            </fieldset>
                        </div>
                        <input id="submit" name="submit" value="提交" type="submit" />
                    </form>
                </div>
            </div>
        </div>

        <div id="footer">
            <div class="bgl"><div class="bgr">
                    Powered by <a href="http://www.gree.com" target="_blank">GREE.INC</a> © 2016-2017 &nbsp;
                    <!--	<a href="http://10.1.11.156/piwik/index.php" target="_blank"><img src="http://10.1.11.156/piwik/plugins/Morpheus/images/logo.svg" width="42px" alt="piwik"/></a>-->
                    <a href="http://10.1.11.156/piwik/index.php?module=CoreHome&action=index&idSite=4&period=day&date=today#/module=Dashboard&action=embeddedIndex&idSite=4&period=day&date=yesterday&idDashboard=1" target="_blank"><img src="http://10.1.11.156/piwik/plugins/Morpheus/images/logo.svg" width="42px" alt="piwik"/></a>
                </div></div>
        </div>
    </div>
</div>

<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//10.1.11.156/piwik/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 4]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<noscript><p><img src="//10.1.11.156/piwik/piwik.php?idsite=4" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->




</body>
</html>

