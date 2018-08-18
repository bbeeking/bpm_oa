<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<script src="../ueditor.parse.js" type="text/javascript"></script>
<script>
  uParse('.content',{
      'highlightJsUrl':'../third-party/SyntaxHighlighter/shCore.js',
      'highlightCssUrl':'../third-party/SyntaxHighlighter/shCoreDefault.css'
  })
</script>
<?php
 error_reporting(E_ERROR|E_WARNING); $content = htmlspecialchars(stripslashes($_POST['myEditor'])); echo "第1个编辑器的值"; echo "<div class='content'>".htmlspecialchars_decode($content)."</div>"; 