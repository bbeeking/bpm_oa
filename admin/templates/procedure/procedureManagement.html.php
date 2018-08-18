<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 样式控制 header start -->
    {php include "../templates/header.html.php"}
    <!-- 样式控制 header end -->

    <!-- enhanced select 控制下拉列表多选 -->
    <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />

    <!-- datepicker -->
    <link rel="stylesheet" href="../templates/lib/datepicker/datepicker.css" />
    <!-- nice form elements -->
    <link rel="stylesheet" href="../templates/lib/uniform/Aristo/uniform.aristo.css" />

</head>
<body class="sidebar_left ptrn_a">
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
                            案例管理
                        </li>
                        <li>Case Management</li>
                    </ul>
                </div>
            </nav>


            <div class="row-fluid">
                <div class="span12">
                    <div class="heading clearfix">
                        <h3 class="pull-left">案例管理</h3>
                    </div>

                    <table class="table table-striped table-bordered  mediaTable" id="dt_d">
                        <thead>
                            <tr>
                                <th class="optional">{L("ID")}</th>
                                <th class="optional">{L("关联流程id")}</th>
                                <th class="optional">{L("案例名称")}</th>
                                <th class="optional">{L("表单流转")}</th>
                                <th class="optional">{L("当前节点")}</th>
                                <th class="optional">{L("指派")}</th>
                                <th class="optional">{L("状态")}</th>
                                <th class="optional">{L("业务创建")}</th>
                                <th class="optional">{L("创建日期")}</th>
                                <th class="optional">{L("操作")}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {loop $dataAry $key=>$val}
                            <tr>
                                <td>{$val['id']}</td>
                                <td>{$val['process_id']}</td>
                                <td>{$val['case_name']}</td>
                                <td>{$val['form_circulation_sequence']}</td>
                                <td>{$val['current_location']}</td>
                                <td>{$val['current_executor']}</td>
                                <td>{$procedureStatusConfig[$val['status']]}</td>
                                <td>{$realnameAry[$val['builder']]}</td>
                                <td>{date('Y-m-d',$val['create_time'])}</td>
                                <td>
                                    <a href="#" onclick="javascript:window.location = 'flowAdd.php?id={$val['id']}'">查看进度</a> |
                                    <a href="#" onclick="javascript:window.location = 'flowAdd.php?id={$val['id']}'">催办</a> |

                                    {if $val['status'] == 1}
                                        <a href="#" onclick="recordStop({$val['id']},'{$val['case_name']}',2);">挂起</a> |
                                    {elseif $val['status'] == 2}
                                        <a href="#" onclick="recordStop({$val['id']},'{$val['case_name']}',1);">启用</a> |
                                    {/if}

                                    <a href="#" onclick="recordDel({$val['id']},'{$val['case_name']}');">删除</a>
                                </td>
                            </tr>
                            {/loop}
                        </tbody>
                    </table>
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

    <!-- autosize textareas -->
    <script src="../templates/js/forms/jquery.autosize.min.js"></script>
    <!-- 下拉框选项 -->
    <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>
    <!-- user profile functions -->
    <script src="../templates/js/gebo_user_profile.js"></script>

    <script src="../templates/js/pms_forms.js"></script>

    <!-- enhanced select (chosen) -->
    <script src="../templates/lib/chosen/chosen.jquery.min.js"></script>

    <!-- 控制检测表单数据 -->
    <script src="../js/common.js"></script>

    <script type="text/javascript">
        var count = 1;
        function additem(id)
        {
            var row, cell, str;
            row = document.getElementById(id).insertRow();
            if (row != null)
            {
                cell = row.insertCell();
                cell.innerHTML = "<br /><input id=\"param" + count + "\" type=\"text\" class=\"dfinput\" name= \"param" + count + "\" value = \"\"> <input type = \"button\" class=\"btn-danger\" value= \"删除\" onclick = \"deleteitem(this);\" >";
                count++;
            }
        }
        function deleteitem(obj)
        {
            var curRow = obj.parentNode.parentNode;
            formInfoId.deleteRow(curRow.rowIndex);
        }
        function getsub()
        {
            var re = "";
            for(var i=0;i<count;i++)
            {
                //alert("#param" + i + " value is :" + $("#param" + i).val());
                if ($("#param" + i).val() != '')
                {
                    re += $("#param" + i).val() + ',';
                }
            }
            $("#paramName").val(re.substring(0, re.length - 1));
            document.FormPage.submit();
        }

        function chksubmit()
        {
            var name = $('#name').val();
            var formElementSign = $('#formElementSign').val();

            if(name == '') {
                $('#nameMsg').html('{L("请填写元素名称！")}');
                $('#name').focus();
                return false;
            }
            if(formElementSign == '') {
                $('#formElementSignMsg').html('{L("请填写元素标识！")}');
                $('#formElementSign').focus();
                return false;
            }
            $('#submit1').attr('disabled','disabled');
            getsub();
        }

        //删除记录
        function recordDel(id,name){
            if(confirm('{L("删除前建议暂停该流程案例，是否确认删除流程案例：")}'+name)) {
                //return true;
                window.location = 'procedureControl.php?act=del&id='+id;
            }
            else {
                return false;
            }
        }

        //暂停记录
        function recordStop(id,name,status){
            //暂停
            if(status == ''){
                if(confirm('{L("暂停后该流程案例后所有流转操作都将停止直至恢复，是否确认暂停流程案例：")}'+name)) {
                    //return true;
                    window.location = 'procedureControl.php?act=stop&id='+id;
                }
                else {
                    return false;
                }
            } else{
                window.location = 'procedureControl.php?act=stop&id='+id+'&status='+status;
            }

        }
    </script>

</div>
</body>
</html>
