$(document).ready(function(){gebo_notifications.sticky();gebo_notifications.smoke_js()});gebo_notifications={sticky:function(){$("#sticky_a").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;.",{autoclose:5e3,position:"top-right",type:"st-error"})});$("#sticky_b").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"top-right",type:"st-success"})});$("#sticky_c").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"top-right",type:"st-info"})});$("#sticky_d").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"top-right"})});$("#sticky_d_st").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:false,position:"top-right"})});$("#sticky_e").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"top-right"})});$("#sticky_f").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"top-center"})});$("#sticky_g").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"top-left"})});$("#sticky_h").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"bottom-right"})});$("#sticky_i").click(function(){$.sticky("Lorem ipsum dolor sit&hellip;",{autoclose:5e3,position:"bottom-left"})})},smoke_js:function(){$("#smoke_signal").click(function(a){smoke.signal("This goes away after a few seconds...5 seconds, in fact.");a.preventDefault()});$("#smoke_alert").click(function(a){smoke.alert("This is a normal alert screen...nothing too fancy.");a.preventDefault()});$("#smoke_confirm").click(function(b){a();b.preventDefault()});$("#smoke_prompt").click(function(a){b();a.preventDefault()});function a(){smoke.confirm("This is still cool, yeah?",function(a){if(a)smoke.alert('"yeah it is" pressed',{ok:"close"});else smoke.alert('"no way" pressed',{ok:"close"})},{ok:"yeah it is",cancel:"no way"})}function b(){smoke.prompt("What's your name?",function(a){if(a)smoke.alert("Your name is "+a);else smoke.alert("no")},{value:"your name"})}}}