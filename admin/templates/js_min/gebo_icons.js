$(document).ready(function(){$(".icon_list_a li").css("cursor","pointer").on("click",function(){var a=$(this).attr("title");$(".icon_copy_a span").html('[ <i class="'+a+'"></i> <code>&lt;i class="'+a+'"&gt;&lt;/i&gt;</code> ]')});$(".icon_list_b li").css("cursor","pointer").on("click",function(){var b=$(this).attr("title"),a=$(this).find("i").attr("class");$(".icon_copy_b span").html('[ <i class="'+a+'"></i> '+b+' <code>&lt;i class="'+a+'"&gt;&lt;/i&gt; '+b+"</code> ]")});$(".icon_list_c li").css("cursor","pointer").on("click",function(){var a=$(this).find("img").attr("src");$(".icon_copy_c span").html('[ <img src="'+a+'" alt="" /> <code>&lt;img src="'+a+'" alt="" /&gt;</code>, <code>&lt;div style="background: url('+a+');"&gt;&lt;/div&gt;</code> ]')});$(".icon_list_d li").css("cursor","pointer").on("click",function(){var a=$(this).attr("title");$(".icon_copy_d span").html('[ <i class="'+a+'"></i> <code>&lt;i class="'+a+'"&gt;&lt;/i&gt;</code> ]')})})