<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>




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
  <div class="form_title">网关属性 (Gateway Properties)</div>
<!--  <button class="btn btn-success" style="margin: 10px;" onclick="additem('formInfoId');" >+ Add Routing Rule</button>-->
  <input type="button" style="margin: 10px;" onclick="additem('formInfoId')" value="+ Add Routing Rule" />

  <div class="alert alert-info">
    <a class="close" data-dismiss="alert">×</a>
    <strong>Tips!</strong> 双击选中的字段加入到条件中；支持逻辑符号==、!=、> 、< 、>=、 <= 以及连接符 &&、||
  </div>

  <div class="form_content">
    <table class="table table-striped table-bordered mediaTable" id="TableId">
      <thead>
        <tr>
          <th class="optional">下个节点（Next Task）</th>
          <th class="optional">条件（Condition）</th>
        </tr>
      </thead>
      <tbody id="formInfoId">
        <tr>
          <td>
            {get_section('nextTask0',$flowDataConfigAry ,'',$ary_first=array(''),'nextTask0','','',$etc='data-placeholder="请选择..."')}
          </td>
          <td>
            <input type="text" name="condition0" id="condition0" />
<!--            <input type="button" class="btn" style="margin-bottom: 9px;" onclick="alert('@todo');" value="字段选择" />-->
            <input type="button" class="btn" style="margin-bottom: 9px;" onclick="grandson=window.open('formElementPicker.php?name=condition0','grandson','width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no');" value="字段选择" />
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
      if($("#nextTask"+i).length>0){
        var nextTask = $('#nextTask'+i).attr("value");
        var condition = $('#condition'+i).attr("value");
      }else{
        continue;
      }

      if(nextTask == '0' || condition.length == 0 ){
        continue;
      }else{
        gatewayProperties += nextTask+':'+condition+';';
      }
//      alert(nextTask+':'+condition);
    }
//    alert(gatewayProperties);

//    var textfield = document.getElementById('textfield').value;
    window.opener.document.getElementById('ele_gateway').value = gatewayProperties;
    window.close();
  }

  function additem(id){
    var row, cell, str;
    row = document.getElementById(id).insertRow();
    if (row != null){
      cell0 = row.insertCell(0);
      cell1 = row.insertCell(1);

//      cell0.innerHTML = '{get_return_section('nextTask',$flowDataConfigAry ,'',$ary_first=array(''),'nextTask','','',$etc='data-placeholder="请选择..."')}';
      var section = '{get_return_section('nextTask',$flowDataConfigAry ,'',$ary_first=array(''),'nextTask','','',$etc='data-placeholder="请选择..."')}';
      section = section.replace(/nextTask/g, "nextTask"+count);
      cell0.innerHTML = section;
      cell1.innerHTML = '<input type="text" name="condition'+count+'" id="condition'+count+'" />&nbsp;<input type = \"button\" class="btn" style="margin-bottom: 9px;" onclick="grandson=window.open(\'formElementPicker.php?name=condition'+count+'\',\'grandson\',\'width=680,height=528,top=150,left=280, toolbar=no, menubar=no, scrollbars=auto, resizable=no, location=no, status=no\');" value="字段选择" />&nbsp;<input type = \"button\" class=\"btn-danger\" value= \"删除\" onclick = \"del(this);\" >';
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