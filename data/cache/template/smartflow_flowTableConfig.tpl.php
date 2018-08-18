<?php defined('IN_DAEM') or exit('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>




  <link rel="stylesheet" type="text/css" href="./codebase/fonts/iconflow.css"/>
  <link rel="stylesheet" type="text/css" href="./codebase/fonts/iconflow.css"/>
  <link rel="stylesheet" type="text/css" href="./codebase/GooFlow.css"/>
  <link rel="stylesheet" type="text/css" href="default.css"/>

  <!-- 样式控制 header start -->
  <?php include "../templates/header.html.php"?>
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
  <div class="form_title">节点表单属性 (Node Table Properties)</div>
<!--  <button class="btn btn-success" style="margin: 10px;" onclick="additem('formInfoId');" >+ Add Routing Rule</button>-->
  <input type="button" style="margin: 10px;" onclick="additem('formInfoId')" value="+ Add Table" />

  <div class="alert alert-info">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Tips!</strong><br />
    1.选中关联表单，多选则根据选中的先后顺序合并表单，如果对应节点为已填表单，后节点加载同样的表单则为默认只读属性。<br />
    2.属性默认（可写）例外为只读，属性只读例外为可写,例外字段用&&链接
  </div>

  <div class="form_content">
    <table class="table table-striped table-bordered mediaTable" id="TableId">
      <thead>
        <tr>
          <th class="optional">关联表单（Next Table）</th>
          <th class="optional">读写</th>
          <th class="optional">例外（Condition）</th>
        </tr>
      </thead>
      <tbody id="formInfoId">
        <tr>
          <td>
            <?php echo get_section('template0',$templateDefineAry ,'',$ary_first=array(''),'template0','','width:180px;',$etc='data-placeholder="请选择..."');?>
          </td>
          <td>
            <?php echo get_section('readWrite0',$readWriteConfigAry ,'',$ary_first=array(),'readWrite0','','width:60px;',$etc='data-placeholder="请选择..."');?>
          </td>
          <td>
            <input type="text" name="condition0" id="condition0" />
            <input type="button" class="btn" style="margin-bottom: 9px;" onclick="grandson=window.open('formElementPicker.php?name=condition0&tableId='+$('#template0').attr('value'),'grandson','width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no');" value="字段选择" />
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

<script type="text/javascript">

  /**
   * 设置计数器用于子窗口对父值的修改，以及回调时的循环获取
   */
  var count = 1;

  /**
   * 获取当前填写的内容
   */
  function callback(){
    var gatewayProperties='';

    for(var i=0;i<count;i++){

      //删除dom节点以后需要判断对象是否存在再获取
      if($("#template"+i).length>0){
        var template = $('#template'+i).attr("value");
        var readWrite = $('#readWrite'+i).attr("value");
        var condition = $('#condition'+i).attr("value");
      }else{
        continue;
      }

      //允许无例外，condition允许为空
      if(template == '0' || readWrite == '0' ){
        continue;
      }else{
        gatewayProperties += template+':'+readWrite+':'+condition+',';
      }
    }

    //过滤最后一位的,号
    gatewayProperties = gatewayProperties.substring(0,gatewayProperties.length-1);
    window.opener.document.getElementById('ele_table').value = gatewayProperties;
    window.close();
  }

  function additem(id){
    var row, cell, str;
    row = document.getElementById(id).insertRow();
    if (row != null){
      cell0 = row.insertCell(0);
      cell1 = row.insertCell(1);
      cell2 = row.insertCell(2);

      var section = '<?php echo get_return_section('template',$templateDefineAry ,'',$ary_first=array(''),'template','','width:180px;',$etc='data-placeholder="请选择..."');?>';
      section = section.replace(/template/g, "template"+count);
      cell0.innerHTML = section;

      var section = '<?php echo get_return_section('readWrite',$readWriteConfigAry ,'',$ary_first=array(),'readWrite','','width:60px;',$etc='data-placeholder="请选择..."');?>';
      section = section.replace(/readWrite/g, "readWrite"+count);
      cell1.innerHTML = section;

      cell2.innerHTML = '<input type="text" name="condition'+count+'" id="condition'+count+'" />&nbsp;<input type = \"button\" class="btn" style="margin-bottom: 9px;" onclick="grandson=window.open(\'formElementPicker.php?name=condition'+count+'&tableId='+$('#template'+count).attr('value')+'\',\'grandson\',\'width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no\');" value="字段选择" />&nbsp;<input type = \"button\" class=\"btn-danger\" value= \"删除\" onclick = \"del(this);\" >';
      count++;
    }
//    alert(cell0.innerHTML);
  }

  function del(o){
    var   t=document.getElementById('TableId');
    t.deleteRow(o.parentNode.parentNode.rowIndex)
  }

  //动态删除行
  function deleteRow(){
    var rowIndex = event.srcElement.parentElement.parentElement.rowIndex;
    var styles = document.getElementById("tableID");
    styles.deleteRow(rowIndex);
  }
</script>
</html>