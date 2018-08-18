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
  <div class="form_title">参数选项 (Process Variables)</div>
  <div class="form_content">
      <table class="table table-striped table-bordered mediaTable" id="dt_d">
        <thead>
        <tr>
          <th class="optional"><?php echo L("Dynaforms 动态表名");?></th>
          <th class="optional"><?php echo L("Variable 字段名");?></th>
          <th class="optional"><?php echo L("param");?></th>
          <th class="optional"><?php echo L("Sign");?></th>
          <th class="optional"><?php echo L("Type 类型");?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($dataAry)) foreach($dataAry AS $key=>$val) { ?>
            <?php if(is_array($val)) foreach($val AS $kk=>$vv) { ?>
<!--            <tr ondblclick="alert('Double Click get it!');">-->
<!--            <tr ondblclick="alert($(this).children().eq(2).text());">-->
            <tr ondblclick="window.opener.document.getElementById('<?php echo $tagName;?>').value+=$(this).children().eq(2).text();window.close();">
              <td><?php echo $key;?></td>
              <td><?php echo $vv['name'];?></td>
              <td><?php echo $vv['param'];?></td>
              <td><?php echo $vv['sign'];?></td>
              <td><?php echo $vv['type'];?></td>
            </tr>
            
<?php } ?>

        
<?php } ?>

        </tbody>
      </table>
  </div>
</form>
</body>

<!-- 尾部js加载 footer start -->
<?php include "../templates/footer.html.php"?>
<!-- 尾部js加载 footer end -->

<!-- autosize textareas -->
<script src="../templates/js/forms/jquery.autosize.min.js"></script>
<!-- 下拉框选项 -->
<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>

<script src="../templates/js/pms_forms.js"></script>

<!-- enhanced select (chosen) -->
<script src="../templates/lib/chosen/chosen.jquery.min.js"></script>

<script type="text/javascript">
  function callback(){
    var textfield = document.getElementById('textfield').value;
    //alert(textfield);
    window.opener.document.getElementById('ele_gateway').value = textfield;
  }
</script>

</html>