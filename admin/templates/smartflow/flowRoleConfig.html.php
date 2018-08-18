<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

  <!-- enhanced select 控制下拉列表多选 -->
  <link rel="stylesheet" href="../templates/lib/chosen/chosen.css" />

  <link rel="stylesheet" type="text/css" href="./codebase/fonts/iconflow.css"/>
  <link rel="stylesheet" type="text/css" href="./codebase/fonts/iconflow.css"/>
  <link rel="stylesheet" type="text/css" href="./codebase/GooFlow.css"/>
  <link rel="stylesheet" type="text/css" href="default.css"/>



  <!-- 样式控制 header start -->
  {php include "../templates/header.html.php"}
  <!-- 样式控制 header end -->

  <style>
    .myForm{display:block;margin:0px;padding:0px;line-height:1.5;border:#ccc 1px solid;font: 14px Arial, Helvetica, sans-serif;margin:5px 5px 0px 0px;border-radius:4px;}
    .myForm .form_title{background:#428bca;padding:8px;color:#fff;border-radius:3px 3px 0px 0px;}
    .myForm .form_content{padding:4px;background:#fff;}
    .myForm .form_content table{border:0px}
    .myForm .form_content table td{border:0px}
    .myForm .form_content table .th{text-align:right;font-weight:bold}
    .myForm .form_btn_div{text-align:center;border-top:#ccc 1px solid;background:#f5f5f5;padding:4px;border-radius:0px 0px 3px 3px;}
    #propertyForm{float:right;width:auto}
  </style>




</head>
<!--body onload="window.opener.close()"-->
<body>
<form id="form1" name="form1" method="post" action="" class="myForm">
  <div class="form_title">节点角色 (Node Role)</div>
<!--  <input type="button" style="margin: 10px;" onclick="additem('formInfoId')" value="+ Add Node Role" />-->

  <div class="alert alert-info">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Tips!</strong>角色等级： 上级部门 - 下一级部门 - 用户 ； 各级部门审批人为部门负责人，当授权到用户时，除用户外上级部门可以在特殊情况介入（节点用户离职等），下级角色不能越级操作。
  </div>

  <div class="form_content">
    <table class="table table-striped table-bordered mediaTable" id="TableId">
      <thead>
        <tr>
          <th class="optional">角色：用户|部门（Role：User OR Department）</th>
        </tr>
      </thead>
      <tbody id="formInfoId">
        <tr>
          <td style="background-color:#fff;">

            <select name="node_role" id="node_role" multiple data-placeholder="选择角色..." style="width: 580px;">
              {loop $nodeRoleConfigAry $key=>$val}
              <option value="{$key}">{$val}</option>
              {/loop}
            </select>

            <input type="hidden" name="options_value" id="options_value" value="{$options_value}" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
<!--  <input type="text" name="textfield" id="textfield" />-->
</form>
<!--input name="" type="button" onclick="window.opener.form1.textfield.value='aaa'" value="修改父窗口的值" /-->
<button class="btn btn-success" style="float: right;margin:10px" onclick="callback();"  >保存</button>
</body>


<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){
      $("#node_role").chosen();

      //注册修改事件
      $('#node_role').change(function() {
        set_options_values();
      });
  })

  /**
   * 设置计数器用于子窗口对父值的修改，以及回调时的循环获取
   */
  var count = 1;

  /**
   * 获取当前填写的内容
   */
  function callback(){
//    var textfield = document.getElementById('textfield').value;
//    alert($('#options_value').val());return;
    window.opener.document.getElementById('ele_role').value = $('#options_value').val();
    window.close();
  }

  //设置跟踪用户选项值
  function set_options_values(){
    var options_str = '';
    $("#node_role option:selected").each(function () {
      var $option = $(this);
      var html = $option.html();
      var value = $option.val();
      options_str = options_str+','+value;
    });
    options_str = options_str.replace(/(^\,*)/g,"");
    $('#options_value').val(options_str);
  }

</script>

</html>